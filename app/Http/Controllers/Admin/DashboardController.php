<?php namespace Fully\Http\Controllers\Admin;

use Fully\Http\Controllers\Controller;
use Fully\Models\User;
use Fully\Models\Logger;

/**
 * Class DashboardController
 * @package Fully\Controllers\Admin
 * @author Sefa Karagöz
 */
class DashboardController extends Controller {

    function index() {

        $logger = new Logger();
        /*$chartData = $logger->getLogPercent();*/

        $chartData = array();

        return view('backend/layout/dashboard', compact('chartData'))->with('active', 'home');
    }
}
