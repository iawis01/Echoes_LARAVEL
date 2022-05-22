<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Notifications extends Model
{
    use HasFactory;

    //Deshabilitar el created_at y el updated_at
    public $timestamps = false;


    protected $table = 'notifications';

    protected $primaryKey = 'id_notification';

    protected $fillable = ['student_id', 'work', 'exam', 'continuos_assesment', 'final_note'];
}

