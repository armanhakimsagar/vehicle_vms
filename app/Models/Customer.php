<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $connection;

    public function __construct()
    {
        $this->connection = \Session::get('my_db_connection');
        //echo $this->connection;
    }
    
    protected $fillable = [
        'customer_name', 'phone'
    ];

    public function storeRules()
    {
        return [
            'customer_name' => 'required',
            'phone' =>'required',
        ];
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
