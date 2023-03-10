<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleStaff extends Model
{
    protected $connection;

    public function __construct()
    {
        $this->connection = \Session::get('my_db_connection');
    }
}
