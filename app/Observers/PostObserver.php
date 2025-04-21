<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    //updating
    public function updating(Post $post)
    {
        // Verifica si el estado de publicación cambió de "no publicado" a "publicado"
        if (!$post->getOriginal('is_published') && $post->is_published) {
            $post->published_at = now();
        }
    }

    //update

}
