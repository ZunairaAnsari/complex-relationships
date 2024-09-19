<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $table = 'records'; // Specify the table name

    protected $fillable = [
        'client_id',
        'product_id',
        'quantity',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

      public function records()
    {
        return $this->hasMany(Record::class);
    }
}
