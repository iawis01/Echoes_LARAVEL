<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    //Deshabilitar el created_at y el updated_at
    public $timestamps = false;

    /*
    //Habilitar el created_at y el updated_at y elegir formato
    protected $timestamps = true;

     */

    //protected $dateFormat = 'h:m:s';
    use HasFactory;

    protected $table = 'classes';

    protected $primaryKey = 'id_class';

    protected $fillable = ['user_id', 'course_id', 'schedule_id', 'name', 'color'];

    public function schedule(){
        return $this->hasMany('App\Models\Schedule');
    }

    public function profesor(){
        return $this->hasOne('App\Models\User');
    }

    public function curso(){
        return $this->hasOne('App\Models\Course');
    }

}