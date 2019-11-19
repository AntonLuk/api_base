<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = [
        'name', 'code', 'redaction','grn', 'fns_date', 'ip_id'
    ];
}
