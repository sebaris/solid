<?php

namespace App\Models;

use App\Repository\AppRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends AppRepository {

    use HasFactory;
    protected $fillable = [
        'code',
        'name'
    ];
}
