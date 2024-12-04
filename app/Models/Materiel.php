<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;
    protected $table = 'materiels';
    protected $fillable = [
        'nom_Mat',
        'serial_number',
        'description',
        'garentie',
        'statue',
        'departement_id',
        'date_integration'
    ];
    public function logiciel(){
        return $this->belongsTo(Logiciel::class, 'logiciel_id');
    }
}
