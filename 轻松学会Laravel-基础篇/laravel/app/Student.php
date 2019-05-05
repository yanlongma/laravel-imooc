<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // 指定表名
    protected $table = 'student';

    // 指定id
    protected $primaryKey = 'id';

    // 指定允许批量赋值的字段
    protected $fillable = ['name', 'age'];

    // 指定不允许批量赋值的字段
    protected $guarded = [];


    // 自动维护时间戳
    public $timestamps = true;


    protected function getDateFormat()
    {
        return time();
    }

    protected function asDateTime($val)
    {
        return $val;
    }

}