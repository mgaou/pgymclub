<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Member extends Model
{
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
            'members.firstname' => 10,
            'members.lastname' => 10,
            'members.adress' => 5
        ]
    ];

    protected $fillable=[
        'firtname','lastname','adress','phone','gender','born_at',
        'palceofbirth','active','banned_at','created_by','update_by',
        'picture_path','birth_path','category_id'

    ];
    protected $casts = [
        'banned_at'  => 'datetime'
    ];
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function cotisations(){
        return $this->hasMany(Cotisation::class);
    }
    //relation member_profession
    public function professions(){
        return $this->belongsToMany(Profession::class);
    }
    public function clubs(){
        return $this->belongsToMany(Club::class);
    }
    public function divisions(){
        return $this->belongsToMany(Division::class, 'club_division_member');
    }

    public function getLastDivisionAttribute() {
        return $this->divisions()->latest()->first();
    }
    public function getFullNameAttribute(){
        return "{$this->firstname} {$this->lastname}";
    }
    public function presences(){
        return $this->hasMany(Presence::class);
    }
}
