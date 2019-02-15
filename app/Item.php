<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name_description', 'quantity', 'unit', "invoice_id"];

    public function item()
    {

        return $this->belongsTo(Invoice::class);

    }
}
