<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $connection;

    public function __construct()
    {
        $this->connection = \Session::get('my_db_connection');
    }

    public function divisions(){

        return $this->belongsTo('App\Models\Division', 'division');
    }

    public function districts(){

        return $this->belongsTo('App\Models\District', 'district');
    }

    public function thanas(){

        return $this->belongsTo('App\Models\Upazila', 'thana');
    }
    public function employee(){

        return $this->belongsTo('App\User', 'employee_id');
    }
}
