<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Category extends Model
{
    use HasFactory;
    use SearchableTrait;
    protected $searchable=[
        'columns'=>[
            'categories.name'=>10
        ]
    ];
    public function members() {
        return $this->hasMany(Member::class);
    }
    protected $fillable=[
        'name','created_by'
    ];
}
