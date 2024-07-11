<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContributionType extends Model
{
    protected $fillable=[
        'name','start_at','end_at','taux','echeance'
    ];
    protected $casts = [
        'start_at'  => 'datetime',
        'end_at' => 'datetime'
    ];

    //creation de la relation cotisatio vers membre
    public function cotisations() {
        return $this->hasMany(Cotisation::class);
    }

}
