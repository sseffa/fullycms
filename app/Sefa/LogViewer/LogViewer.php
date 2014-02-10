<?php namespace Sefa\LogViewer;

use File;

class LogViewer {

    protected $path;

    protected $levels = array(
        'debug'     => 'DEBUG',
        'info'      => 'INFO',
        'notice'    => 'NOTICE',
        'warning'   => 'WARNING',
        'error'     => 'ERROR',
        'critical'  => 'CRITICAL',
        'alert'     => 'ALERT',
        'emergency' => 'EMERGENCY',
    );

    public function __construct() {

        $this->path = storage_path() . "/logs/laravel.log";
    }

    public function getLogs($level = 'all') {

        $logs = array();

        $pattern = "/\[\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\].*/";
        $file = File::get($this->path);

        preg_match_all($pattern, $file, $matches);
        $stack = preg_split($pattern, $file);

        if ($stack[0] < 1) {
            $trash = array_shift($stack);
            unset($trash);
        }

        $logData=array_reverse($matches[0]);
        $stack = array_reverse($stack);

        foreach ($logData as $k => $v) {

            preg_match('@production.(.*):@Ui', $v, $m);
            $type = $m[1];

            if($level == "all") {

                $logs[] = array('log' => trim($v), 'stack' => trim($stack[$k]), 'type' => array_search($type, $this->levels));

            } else {

                if($level == array_search($type, $this->levels))
                    $logs[] = array('log' => trim($v), 'stack' => trim($stack[$k]), 'type' => $level);
            }
        }

        return $logs;
    }

    function deleteLogFile($path) {

        return File::delete($path);
    }
}
