<?php

/**
 * Controller that handles home page functions of the Guitar Shop application.
 *
 * @author jam
 * @version 180429
 */
class HomeController extends DefaultController {

    protected $model = null;

    public function __construct() {
        parent::__construct();
    }

    public function aboutUs() {
        Page::$title = 'About Us';
        require(APP_NON_WEB_BASE_DIR . 'views/aboutUs.php');
    }
    public function aboutMe() {
    if(!isset($_SESSION)) {
        session_start();
    }
    $current_user = LoginVM::getUser();
    before_every_protected_page();
    Page::$title = 'Account Profile';
    require(APP_NON_WEB_BASE_DIR . 'views/aboutMe.php');
    }
    public function featured(){
        if(!isset($_SESSION)) {
            session_start();
        }
        before_every_protected_page();
        //get 9 posts now
        $vm = PostVM::getLastNine();
        $top_posts = $vm->ObjectArray;
        Page::$title = 'Featured Posts';
        require(APP_NON_WEB_BASE_DIR . 'views/userHome.php');
    }
    
    public function getProfile() {
        before_every_protected_page();
        $vm = AdminProfileVM::getInstance();
        $this->displayUpdateForm($vm);
    }

}
