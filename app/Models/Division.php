<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    public function clubs(){
        return $this->belongsToMany(Club::class);
    }
    public function members(){
        return $this->belongsToMany(Member::class);
    }
    protected $fillable=[
        'name','created_by'
    ];
}
