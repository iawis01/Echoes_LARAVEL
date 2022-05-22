<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;
use App\Models\Percentage;

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

    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'course_id', 'schedule_id', 'name', 'color'];

    //¿hasOne?
    public function schedule(){
        return $this->hasMany('App\Models\Schedule');
    }

    public function profesor(){
        return $this->belongsTo(User::class, 'id');
    }

    public function curso(){
        return $this->belongsTo('App\Models\Course');
    }

    public function alumnosWorks(){
        return $this->belongsToMany(User::class, 
                                        'works',
                                        'class_id',
                                        'user_id'
                                            
        );
    }

    public function alumnosExams(){
        return $this->belongsToMany(User::class, 
                                        'exams',
                                        'class_id',
                                        'user_id'
                                            
        );                          
    }

    public function percentage(){
        return $this->hasOne(Percentage::class, 'class_id');                          
    }



}