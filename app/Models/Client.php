<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';
    public $timestamps = true;
    protected $primarykey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','gender','phone','email','address','nationality','dob','education_background','contact_mode'];
    
    function fetchAll(){
        $clients = Client::all();
        return $clients;
    }
}
