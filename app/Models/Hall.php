<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = ['cinema_id', 'name', 'seat_capacity'];

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
}
