<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    protected $fillable = [
        'link', 'id', 'person_id','status', 'inn', 'ogrnip','full_name', 'gender', 'short_name','register_date', 'liquidation_date', 'main_activity', 'user_id'
    ];
}
