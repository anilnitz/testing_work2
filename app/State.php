<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name', 'country_id'
    ];

    protected $table = 'states';

    public function stateList()
    {
        return $this->belongsTo('\App\State','country_id');
    }
}
