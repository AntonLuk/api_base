<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $fillable = [
        'id', 'type_id', 'area_id','region_id', 'name', 'post_index','post_index', 'code', 'fns_inspection','fns_code', 'okato', 'type', 'region', 'inn', 'region_type', 'area', 'area_type', 'text', 'user_id'
    ];
}
