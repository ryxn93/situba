<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faskes extends Model
{
    protected $fillable = [
        'region_id',
        'year',
        'result_faskes'
    ];
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
