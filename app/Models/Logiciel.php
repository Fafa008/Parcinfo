<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logiciel extends Model
{
    use HasFactory;
    protected $table = 'logiciels';
    protected $fillable = [
        'nom_logiciel',
        'version',
        'description',
        'date_achat'
    ];

    public function materiel(){
        return $this->hasMany(Materiel::class, 'logiciel_id');
    }
    public function maintenance(){
        return $this->hasOne(Maintenance::class, 'logiciel_id');
    }
    
}
