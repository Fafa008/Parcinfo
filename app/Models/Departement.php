<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    protected $table = 'departements';
    protected $fillable = [
        'nom_dep',
        'department_id'
    ];

    public function materiel(){
        return $this->hasMany(Materiel::class, 'departement_id');
    }


}
