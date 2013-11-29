sf CMS
=============

## Features

* Bootstrap 3
* Authentication Sentry 2
* Ckeditor
* Bootstrap Code Prettify
* File Manager
* Dropzone.js
* 404 for not found pages	
* Custom Error Pages  
* Backend	
  * Manage article (category, tag)
  * Manage tag
  * Manage page
  * Manage news
  * Manage photo gallery
  * Ckeditor for post creation and editing (filemanager)
  * Form post manage
  * Site settings
* Frontend
  * Article (momentjs)
  * Page
  * News
  * Photo Gallery (Lazy load image, responsive fancybox)
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
