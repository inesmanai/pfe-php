<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $table = 'reclamations';

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
