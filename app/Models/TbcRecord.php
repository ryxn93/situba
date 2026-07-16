<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbcRecord extends Model
{
    protected $fillable = [
        'region_id',
        'year',
        'result_caseTBC',
        'result_deathTBC',
        'result_successRate'
    ];
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
