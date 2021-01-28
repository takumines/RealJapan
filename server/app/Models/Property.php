<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'type',
        'municipality_code',
        'prefecture',
        'municipality',
        'district_name',
        'area',
        'trade_price',
        'period',
        'unit_price',
    ];
}
