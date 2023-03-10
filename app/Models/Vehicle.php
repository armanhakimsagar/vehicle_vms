<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $connection;

    public function __construct()
    {
        $this->connection = \Session::get('my_db_connection');
        //echo $this->connection;
    }
    
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver', 'assign_driver');
    }
}
