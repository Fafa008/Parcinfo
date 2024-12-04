<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $table = 'maintenances';
    protected $fillable = [
        'materiel_id',
        'description',
        'start_date',
        'end_date'
    ];
    public function materiel(){
        return $this->belongsTo(Materiel::class, 'materiel_id');
    }
  /*  public function logiciel(){
        return $this->belongsTo(Logiciel::class, 'logiciel_id');
    }*/

}
