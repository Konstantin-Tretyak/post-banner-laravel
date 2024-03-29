<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'text',
        'status',
    ];

    public function banners()
    {
        return $this->morphToMany(Banner::class, 'bannerable');
    }
}
