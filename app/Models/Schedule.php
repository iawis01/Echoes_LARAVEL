<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //Deshabilitar el created_at y el updated_at
    public $timestamps = false;

    /*
    //Habilitar el created_at y el updated_at y elegir formato
    protected $timestamps = true;

     */

    //protected $dateFormat = 'h:m:s';
    use HasFactory;

    protected $table = 'schedules';

    protected $primaryKey = 'id';

    protected $fillable = ['class_id', 'time_start', 'time_end', 'day'];



    
    public function clases(){
     
      return $this->belongsTo('App\Models\Clase');
  }

}