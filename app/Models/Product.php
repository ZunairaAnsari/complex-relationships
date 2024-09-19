<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'description'];
    protected $table = 'products';

    public function clients(){
        return $this->belongsToMany(Client::class, 'records')
        ->withPivot('quantity')
        ->withTimestamps();
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
