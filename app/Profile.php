<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'image', 'surname', 'email',
        'number', 'passportCopy', 'inn', 'inn2', 'user_id'
    ];

    public function user()
    {
        return $this-belongsTo('App\User');
    }
}
