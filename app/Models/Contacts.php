<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'company',
        'phone',
        'email',
        'is_deleted'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
