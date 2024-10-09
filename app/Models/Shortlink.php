<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortlink extends Model
{
    use HasFactory;

    protected $table = 'short_links';

    protected $fillable = [
        'code', 'link'
    ];

    public function incrementClicks()
    {
        $this->increment('clicks');
    }
}
