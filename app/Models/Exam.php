<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    //Deshabilitar el created_at y el updated_at
    public $timestamps = true;

    /*
    //Habilitar el created_at y el updated_at y elegir formato
    protected $timestamps = true;

     */


    protected $table = 'exams';

    protected $primaryKey = 'id';

    protected $fillable = ['class_id', 'user_id', 'name', 'mark'];
}
