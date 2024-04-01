<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected function price(): Attribute
    {
        return Attribute::make(
            // get: fn (int $price) => '₡' .  $price
            get: fn (int $price) => '₡' .  number_format($price, 0, '', ',')
        );
    }


    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
