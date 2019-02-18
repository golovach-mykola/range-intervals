<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Interval extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;

    protected $fillable = ['date_start', 'date_end', 'price'];
}