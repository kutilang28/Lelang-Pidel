<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    protected $table = "items";
    protected $primaryKey = "id";
    protected $casts = [
        'end_time' => 'datetime',
    ];
    protected $fillable = [
        'id','name','description','starting_bid', 'foto','end_time'
    ];

    public function bid()
{
    return $this->hasMany(Bid::class);
}
    
}
