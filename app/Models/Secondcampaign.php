<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secondcampaign extends Model
{
    use HasFactory;
    protected $fillable = [
        'price_campaign_name',
        'discount_rate',
        'bottom_border',
        'slug',
    ];
}
