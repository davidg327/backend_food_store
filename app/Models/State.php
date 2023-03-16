<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public $timestamps = false;

    const EXISTING = 'Existente';
    const DISABLED = 'Inhabilitado';
    const SOLD_OUT = 'Agotado';

    public function products(){
        return $this->hasMany(Product::class);
    }

}
