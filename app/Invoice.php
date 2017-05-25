<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [

        'invoice_name', 'sub_total', 'discount', 'grand_total'

    ];

    public function products()
    {
        return $this->hasMany(InvoiceProduct::class);
    }
}
