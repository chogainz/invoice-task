<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'street',
        'city',
        'postcode',
        'country'];

    public function invoice()
    {

        return $this->belongsTo(User::class);

    }
}
