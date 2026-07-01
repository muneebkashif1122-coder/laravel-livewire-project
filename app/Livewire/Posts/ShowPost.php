<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post; // Correct singular model import
use Illuminate\Support\Facades\File;

class ShowPost extends Component
{
    public function deletePost($id)
{
    $post = Post::find($id);

    if ($post) {
        if ($post->image) {
            // 1. Strip any accidental leading slashes from the database value
            $cleanDatabasePath = ltrim($post->image, '/\\');
            
            // 2. Combine public_path with 'storage' and your database value
            // This perfectly targets: public/storage/authors_uploads/filename.webp
            $imagePath = public_path('storage' . DIRECTORY_SEPARATOR . $cleanDatabasePath);

            // 3. Delete the file from your disk
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // 4. Delete the author record from the database
        $post->delete();
        
        session()->flash('message', 'Post and their image deleted successfully.');
    }
}
    public function render()
{
    return view('livewire.posts.show-post', [
        // This pulls categories and authors together instantly in a single query
        'posts' => \App\Models\Post::with(['category', 'author'])->latest()->get()
    ])->layout('components.layouts.admin');
}

}
