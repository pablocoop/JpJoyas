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

    //  Aquí va el método booted() para configurar eventos como deleting
    protected static function booted(): void
    {
        static::deleting(function ($post) {
            // Obtener el contenido HTML real
            $html = $post->body->toHtml(); // No uses raw; esto ya es HTML limpio
    
            // Buscar URLs dentro de los atributos url="" o href="" en rich-text-attachment
            preg_match_all('/(?:url|href)="([^">]+\/trix-images\/[^">]+)"/i', $html, $matches);
    
            foreach ($matches[1] as $url) {
                $filename = basename($url);
                $path = storage_path('app/public/trix-images/' . $filename);
    
                if (File::exists($path)) {
                    Log::info('Archivo a borrar: ' . $path);
                    File::delete($path);
                } else {
                    Log::warning('Archivo no encontrado para borrar: ' . $path);
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
