<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name', 'first_name', 'middle_name','fio', 'birth_date', 'birth_place','citizenship_country', 'gender', 'file_name','link', 'person_id', 'inn'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
