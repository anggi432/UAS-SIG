<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThematicData extends Model
{
    protected $fillable = [
        'province_id', 'area', 'population', 'year', 'per_capita_income',
        'schools', 'hospitals', 'health_centers'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}