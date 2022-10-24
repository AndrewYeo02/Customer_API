<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    //customer data type
    protected $fillable = [
        'name',
        'type',
        'email',
        'address',
        'city',
        'state',
        'postal_code',
    ];
    //one to many function since a customer can have many invoice
    public function invoices() {
        return $this->hasMany(Invoice::class);
    }
}
