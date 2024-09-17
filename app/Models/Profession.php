<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Profession extends Model
{
    use HasFactory;

    use SearchableTrait;
    protected $searchable =[
        'columns'=>[
            'professions.name'=>10
        ]
    ];
    protected $fillable=['name'];
    public function members(){
        return $this->belongsToMany(Member::class);
    }

}
