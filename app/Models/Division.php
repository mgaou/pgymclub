<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Division extends Model
{
    use HasFactory;

    use SearchableTrait;/** compléter le model de recherche */
    protected $searchable = [
        'columns' => [
            'divisions.name'=>'10'
        ]
        ];

    public function clubs(){
        return $this->belongsToMany(Club::class);
    }
    public function members(){
        return $this->belongsToMany(Member::class, 'club_division_member');
    }
    protected $fillable=[
        'name','created_by'
    ];
}
