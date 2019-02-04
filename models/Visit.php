<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;

    protected $fillable = [

        'ip_address', 'user_agent', 'view_date','page_url','views_count'

    ];
}