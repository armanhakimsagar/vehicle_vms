<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblTrip extends Model
{
    protected $connection;

    public function __construct()
    {
        $this->connection = \Session::get('my_db_connection');
    }

    public function vehicle(){

        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id');
    }
}
