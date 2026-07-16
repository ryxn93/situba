<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionStatistic extends Model
{
    protected $fillable = [
        'region_id',
        'year',
        'population_density',
        'poverty_rate'
    ];
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
