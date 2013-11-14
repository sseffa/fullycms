sf CMS
=============

## Features

* Bootstrap
* Authentication Sentry 2
* Ckeditor
* Bootstrap Code Prettify
* File Manager
* Dropzone.js
* 404 for not found pages	
* Custom Error Pages  
* Backend	
  * Manage article
  * Manage page
  * Manage photo gallery
  * CKE editor for post creation and editing (file manager)
  * Form post manage
* Frontend
  * Article 
  * Page
  * Photo Gallery
  * Contact Form
  * Breadcrumbs

## Installation

Please check the system requirements before installing sf CMS.  

1. You may install by cloning from github, or via composer.  
  * Github: `git clone git@github.com:sseffa/sf_cms.git`
  * Composer: `composer create-project sseffa/sf_cms --prefer-dist`
2. From a command line open in the folder, run `composer install`.  
3. Enter your database details into `app/config/database.php`.  
4. Run `php artisan app:install` to setup and seed your database.
5. Default admin, email: admin@admin.com, password: admin
