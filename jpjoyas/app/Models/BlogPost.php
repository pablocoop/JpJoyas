<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tonysm\RichTextLaravel\Casts\AsRichTextContent;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;


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

    // ✅ Este método se ejecutará al eliminar un post
    protected static function booted()
    {
        static::deleting(function ($post) {
            preg_match_all('/<img[^>]+src="([^">]+)"/i', $post->body->toHtml(), $matches);

            foreach ($matches[1] as $url) {
                if (str_contains($url, 'storage/trix-images/')) {
                    $filename = basename($url);
                    $path = public_path('storage/trix-images/' . $filename);

                    if (File::exists($path)) {
                        Log::info('Archivo a borrar: ' . $path);
                        File::delete($path);
                    }
                }
            }
        });
    }
}
