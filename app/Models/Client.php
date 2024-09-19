<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email'
    ];

    protected $table = 'clients';

    public function products(){
        return $this->belongsToMany(Product::class, 'records')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}