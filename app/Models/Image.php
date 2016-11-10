<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';
    public $timestamps = true;
    protected $primarykey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','uploads'];
    
    function fetchAll(){
        $images = Image::all();
        return $images;
    }
}
