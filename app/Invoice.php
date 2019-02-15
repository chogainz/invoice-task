<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'title',
        'description',
        'invoice_number',
        'date',
        'invoice_date',
        'purchase_order_number',
        'invoice_note',
        'user_id',
        'client_id',
        'invoice_paid',
        'total'];

    public function invoice()
    {
        return $this;
    }
}
