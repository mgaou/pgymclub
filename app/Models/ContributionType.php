<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContributionType extends Model
{
    use HasFactory;
//creation de la relation cotisatio vers membre
    public function members(){
        return $this->belongsToMany(Member::class);
    }
    protected $fillable=[
        'name','start_at','end_at','taux','echeance'
    ];
}
