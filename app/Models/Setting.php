<?php namespace Fully\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @author Sefa Karagöz
 */
class Setting extends Model {

    public $table = 'settings';
    public $fillable = ['settings', 'lang'];
}
