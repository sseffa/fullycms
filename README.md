sf CMS
=============

## Features

* Twitter Bootstrap 3.0.0
* Custom Error Pages	
	* 404 for not found pages	
* Authentication Sentry 2
* Back-end	
	* Manage article
	* CKE editor for post creation and editing (Filemanager).
* Front-end
	* Simple Blog 
	* Page

## Installation

Please check the system requirements before installing Bootstrap CMS.  

1. You may install by cloning from github, or via composer.  
  * Github: `git clone https://github.com/sseffa/sf_cms.git`
  * Composer: `composer create-project sseffa --prefer-dist`
2. From a command line open in the folder, run `composer install`.  
3. Enter your database details into `app/config/databse.php`.  
4. Run `php artisan app:install` to setup and seed your database.
5. Default admin email : admin@admin, password: admin