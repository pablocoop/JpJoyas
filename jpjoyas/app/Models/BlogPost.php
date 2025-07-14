<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tonysm\RichTextLaravel\Casts\AsRichTextContent;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class BlogPost extends Model
{
    use HasFactory, HasRichText;

    protected $fillable = [
        'title',
        'body',
        'image_path',
        'video_path',
        'user_id',
    ];

    protected $casts = [
        'body' => AsRichTextContent::class,
    ];
    protected array $richTextAttributes = ['body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
