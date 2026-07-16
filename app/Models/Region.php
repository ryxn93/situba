<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'name',
        'latitude',
        'longitude'
    ];
    public function tbcRecords()
    {
        return $this->hasMany(TbcRecord::class);
    }
    public function faskes()
    {
        return $this->hasMany(Faskes::class);
    }
    public function regionStatistics()
    {
        return $this->hasMany(RegionStatistic::class);
    }
}
