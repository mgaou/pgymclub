<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Club extends Model
{
    use HasFactory;

    use SearchableTrait;/** compléter le model de recherche */

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        /**
         *la liste des champs avec leur ordre de dominance sur lesquels la recherche sera effectuée  
         */
        'columns' => [
            'clubs.name' => 10,
            'clubs.leader' => 5
        ]
    ];


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
