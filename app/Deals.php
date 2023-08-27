<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{

    protected $fillable = [
        
        'id',
        'internalName',
        'title',
        'metacriticLink',
        'dealID',
        'storeID',
        'gameID',
        'salePrice',
        'normalPrice',
        'isOnSale',
        'savings',
        'metacriticScore',
        'steamRatingText',
        'steamRatingPercent',
        'steamRatingCount',
        'steamAppID',
        'releaseDate',
        'lastChange',
        'dealRating',
        'thumb',
    ];
   
}
