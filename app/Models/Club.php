<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    public function disvions(){
        return $this->belongsToMany(Division::class);
    }
    public function members(){
        return $this->belongsToMany(Member::class, 'club_division_member');
    }
    protected $fillable=['
    name','leader'
    ];
}
