<?PHP

// Frontend
View::composer('frontend/_layout/menu', 'Sefa\Composers\MenuComposer');
View::composer('frontend/_layout/layout', 'Sefa\Composers\SettingComposer');

// Backend
View::composer('backend/_layout/menu', 'Sefa\Composers\Admin\MenuComposer');