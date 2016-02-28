Fully CMS
=============

### Laravel 5.1 Content Managment System

## not stable!

<img src="https://raw.githubusercontent.com/sseffa/fullycms/master/screenshots/1.png" width="900" />

## Features

* Laravel 5.1
* Bootstrap
* Authentication Sentinel
* Ckeditor
* Bootstrap Code Prettify
* File Manager
* Dropzone.js
* Backend
  * Manage menu (nested)
  * Manage article (category, tag)
  * Manage tag
  * Manage article category
  * Manage page
  * Manage news
  * Manage photo gallery
  * CKEditor for post creation and editing (filemanager)
  * Form post manage
  * Site settings
  * Log view page
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
  * Github: `git clone git@github.com:sseffa/fullycms.git`
  * Composer: `composer create-project sseffa/fullycms --prefer-dist`
2. From a command line open in the folder, run `composer install`.
3. Enter your database details into `config/database.php`.
4. Run `php artisan app:install` to setup and seed your database and admin information
5. Settings `config/fully.php`. (optional)
  * Cache enable / disable
  * image folder
  * post per page
  * ...

## Credits
 * <http://almsaeedstudio.com/preview/>
 * <http://www.dropzonejs.com/>
 * <http://ckeditor.com/>
 * <http://www.eyecon.ro/bootstrap-datepicker/>
 * <http://fancyapps.com/fancybox/>
 * <https://github.com/simogeo/Filemanager>
 * <https://github.com/dbushell/Nestable>
 * <http://momentjs.com/>
 * <https://github.com/tuupola/jquery_lazyload>
 * <https://github.com/mikemand/logviewer/>
...

## Screenshots

<img src="https://raw.githubusercontent.com/sseffa/fullycms/master/screenshots/2.png" width="900" />
<img src="https://raw.githubusercontent.com/sseffa/fullycms/master/screenshots/3.png" width="900" />
<img src="https://raw.githubusercontent.com/sseffa/fullycms/master/screenshots/4.png" width="900" />

### Licence

[MIT license](http://opensource.org/licenses/MIT)
