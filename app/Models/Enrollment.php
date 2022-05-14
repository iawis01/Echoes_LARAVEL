<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    //Deshabilitar el created_at y el updated_at
    public $timestamps = false;

    /*
    //Habilitar el created_at y el updated_at y elegir formato
    protected $timestamps = true;

     */

    //protected $dateFormat = 'h:m:s';
    use HasFactory;

    protected $table = 'course_user';

    protected $primaryKey = 'id';

    protected $fillable = ['course_id', 'user_id'];



}