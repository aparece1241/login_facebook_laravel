<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        "email",
        "token"
    ];

    protected $table = "temporary_email";
}
