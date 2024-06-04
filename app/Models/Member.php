<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $appends = ['last_division','last_club', 'fullname'];
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function contribution_types(){
        return $this->belongsToMany(ContributionType::class)->withPivot('mounth','value','value_rest','paid_at','observe','cancel','cancel_by','cancel_at','created_at','updated_at');
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
    public function getLastClubAttribute(){
        return $this->clubs()->latest()->first();
    }
    public function getFullNameAttribute(){
        return "{$this->firstname} {$this->lastname}";
    }
    protected $fillable=[
        'firtname','lastname','adress','phone','gender','born_at',
        'palceofbirth','active','banned_at','created_by','update_by',
        'picture_path','birth_path','category_id'

    ];
}
