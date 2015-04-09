<?php namespace Fully\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * Class Log
 * @author Sefa Karagöz
 */
class Logger extends Model {

    public $table = 'logs';

    public function getLogStatistics() {

        $result = DB::table('logs')->select(DB::raw("SUM(CASE WHEN level='info' THEN 1 ELSE 0 END) as info, SUM(CASE WHEN level='error' THEN 1 ELSE 0 END) as error"))->get();

        return $result;
    }

    public function calculatePercent($infoCount, $errorCount) {

        $result = array();

        $result['info'] = round(($infoCount * (100 / ($infoCount + $errorCount))), 2);
        $result['error'] = round(($errorCount * (100 / ($infoCount + $errorCount))), 2);

        return $result;
    }

    public function getLogPercent() {

        $data = $this->getLogStatistics();

        return $this->calculatePercent($data[0]->info, $data[0]->error);
    }
}
