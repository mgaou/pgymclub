<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    protected $fillable = ['member_id',
    'p_date',
    'pobserve'];
    protected $casts = [
        'pdate'  => 'datetime'
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }
}
