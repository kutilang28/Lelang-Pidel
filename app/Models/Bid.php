<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    protected $table = "bids";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id', 'items_id', 'amount'
    ];

public function user()
{
    return $this->belongsTo(User::class);
}

public function item()
{
    return $this->belongsTo(Item::class);
}
}
