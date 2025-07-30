<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    //nama tabel;
    protected $table = 'clases';

    //fillabel;
    protected $guarded = [];
    
    //relasi ke model user
    public function user (){
        return $this->hasMany(User::class, 'clas_id');
    }

}