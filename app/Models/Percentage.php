<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Percentage extends Model
{
    use HasFactory;

        //Deshabilitar el created_at y el updated_at
        public $timestamps = false;

        /*
        //Habilitar el created_at y el updated_at y elegir formato
        protected $timestamps = true;
    
         */
    
    
        protected $table = 'percentages';
    
        protected $primaryKey = 'id';
    
        protected $fillable = ['course_id', 'class_id', 'continuous_assessment', 'exams'];
}
