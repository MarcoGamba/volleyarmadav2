<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'registrations',
        'edition_number',
    ];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
        ];
    }
}
