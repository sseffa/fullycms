<?php

Event::listen('user.login', "Sefa\\Handlers\\AuthEventHandler@login");
Event::listen('user.logout', "Sefa\\Handlers\\AuthEventHandler@logout");

Event::listen('eloquent.created: *', function ($model) {

    Cache::flush();
    $className = get_class($model);
    Log::info("{$className} created. ID: " . $model->id);
});
/*
Event::listen('eloquent.saved: *', function( $model ) {

    $className = get_class($model);
    Log::info("{$className} saved. ID: " . $model->id . ' User ID: ' . Sentry::getUser()->id);
});
*/
Event::listen('eloquent.updated: *', function ($model) {

    Cache::flush();
    $className = get_class($model);
    Log::info("{$className} updated. ID: " . $model->id);
});

Event::listen('eloquent.deleted: *', function ($model) {

    Cache::flush();
    $className = get_class($model);
    Log::info("{$className} deleted. ID: " . $model->id);
});

Event::listen('eloquent.*', function ($model) {

    Cache::flush();
});

