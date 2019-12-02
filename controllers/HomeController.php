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
        require(APP_NON_WEB_BASE_DIR . 'views/aboutUs.php');
    }
    public function featured(){
        if(!isset($_SESSION)) {
            session_start();
        }
        before_every_protected_page();
        //get 9 posts now
        $vm = PostVM::getLastNine();
        $top_posts = $vm->ObjectArray;
        
        require(APP_NON_WEB_BASE_DIR . 'views/userHome.php');
    }
    
    public function getProfile() {
        before_every_protected_page();
        $vm = AdminProfileVM::getInstance();
        $this->displayUpdateForm($vm);
    }

}
