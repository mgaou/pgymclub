<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    protected $fillable = [
        'member_id','contribution_type_id', 'mounth','value',
        'value_rest','paid_at','observe','cancel','cancel_by','cancel_at'
    ];

    protected $casts = [
        'paid_at'  => 'datetime'
    ];

    public function member() {
        return $this->belongsTo(Member::class);
    }
    public function contribution_type() {
        return $this->belongsTo(ContributionType::class);
    }
}
