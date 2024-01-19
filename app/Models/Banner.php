<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Models\BannerDataInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model implements BannerDataInterface
{
    use HasFactory;

    protected $fillable = [
        'name',
        'text',
        'status',
        'url',
    ];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'bannerable');
    }

    public function cards()
    {
        return $this->morphedByMany(Card::class, 'bannerable');
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getText(): string
    {
        return $this->text;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getUrl(): string
    {
        return $this->url;
    }
}
