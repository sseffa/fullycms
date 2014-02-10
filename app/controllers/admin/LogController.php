<?php namespace App\Controllers\Admin;

use BaseController;
use View;
use LogViewer;
use Paginator;
use Input;

class LogController extends BaseController {

    public function index() {

        $level = Input::get('levels', 'all');
        $levels = array(
            'all'       => 'ALL',
            'debug'     => 'DEBUG',
            'info'      => 'INFO',
            'notice'    => 'NOTICE',
            'warning'   => 'WARNING',
            'error'     => 'ERROR',
            'critical'  => 'CRITICAL',
            'alert'     => 'ALERT',
            'emergency' => 'EMERGENCY',
        );

        $logs = LogViewer::getLogs($level);
        $paginator = Paginator::make($logs, count($logs), 25);
        return View::make('backend.log.index', compact('paginator', 'levels', 'level'))->with('active', 'logs');
    }
}
