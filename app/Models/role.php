<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'super_user',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
