<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pf extends Model
{
    protected $fillable = [
        'reg_number', 'reg_authority', 'register_date','unregister_date', 'fns_date', 'birth_place','ip_id'
    ];
}
