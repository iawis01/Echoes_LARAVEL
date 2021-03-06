<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //Deshabilitar el created_at y el updated_at
    public $timestamps = false;

    /*
    //Habilitar el created_at y el updated_at y elegir formato
    protected $timestamps = true;

     */

    //protected $dateFormat = 'h:m:s';
    use HasFactory;

    protected $table = 'courses';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'description', 'date_start', 'date_end', 'active'];

    /*public function users(){
    return $this->belongToMany(User::class);
    }*/

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

   
    public function clases()
    {
        return $this->hasMany('App\Models\Clase');
    }

    public function percentage()
     {
         return $this->hasMany('App\Models\Percentage');
     }

}
