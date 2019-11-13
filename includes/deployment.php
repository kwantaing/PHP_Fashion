<?php

/**
 * Contains deployment constants for the FinalProject application.
 * 
 * @author jam
 * @version 181118
 */

// Access files base directory
define ('ACCESS_BASE_DIR', APP_NON_WEB_BASE_DIR . 'access/');

// Database access credentials location
define ('DB_ACCESS_CREDENTIALS_FILE', ACCESS_BASE_DIR . 'dbAccess.csv');

// Website domain complete with protocol and terminated with a slash
define ('SITE_DOMAIN', 'http://localhost/ProjectFrameworkWEB/');

// Page to display when session is invalid
define ('INVALID_SESSION_PAGE', 'views/loginReg.php');

// Browser tab text for invalid session page
define ('INVALID_SESSION_PAGE_TITLE', 'My Fashion Site - Login and Reg');

