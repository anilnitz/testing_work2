<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
     protected $fillable = [
        'name', 'email','sate_id','pan_no','gst_no'
    ];

    protected $table = 'forms';
}
