<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    protected $table = "items";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','name','description','starting_bid', 'foto'
    ];

    public function bids()
{
    return $this->hasMany(Bid::class);
}
    
}
