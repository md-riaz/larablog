<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    /* Define role and user relation */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
