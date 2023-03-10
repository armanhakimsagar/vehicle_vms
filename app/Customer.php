<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable

{

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    use Notifiable;

    protected $connection;

    public function __construct()
    {
        $this->connection = \Session::get('my_db_connection');
        //echo $this->connection;
    }

    protected $guard = ['dealer', 'enduser'];

    protected $fillable = [
        'name', 'email', 'password'
    ];


    /**

     * The attributes excluded from the model's JSON form.

     *

     * @var array

     */
    public function storeRules()
    {
        return [
            'customer_name' => 'required',
            'phone' => 'required',
        ];
    }

    public function divisions()
    {

        return $this->belongsTo('App\Models\Division', 'division');
    }

    public function districts()
    {

        return $this->belongsTo('App\Models\District', 'district');
    }

    public function thanas()
    {

        return $this->belongsTo('App\Models\Upazila', 'thana');
    }
    public function employee()
    {

        return $this->belongsTo('App\User', 'employee_id');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
