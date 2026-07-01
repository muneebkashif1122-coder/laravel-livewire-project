<?php

namespace App\Livewire\Posts; // 🚀 FIXED: Removed the extra "\EditPost" from the end

use Livewire\Component;
use Livewire\WithFileUploads; 
use App\Models\Post;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Support\Facades\Storage; 

class EditPost extends Component
{
    // Keeping all of your properties, mount(), updatePost(), and render() exactly the same...
    use WithFileUploads;

    public $postId;
    public $title;
    public $description;
    public $category_id;
    public $author_id;
    public $old_image; 
    public $new_image; 

    public function mount($id)
    {
        $post = Post::findOrFail($id);

        $this->postId = $post->id;
        $this->title = $post->title;
        $this->description = $post->description;
        $this->category_id = $post->category_id;
        $this->author_id = $post->author_id;
        $this->old_image = $post->image; 
    }

    public function updatePost()
    {
        $this->validate([
            'title'       => 'required|min:3|max:150',
            'description' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'author_id'   => 'required|exists:authors,id',
            'new_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', 
        ]);


        
        $post = Post::findOrFail($this->postId);
        $imagePath = $this->old_image;
        
        if ($this->new_image) {
            // 💡 Clean, disk-agnostic way to delete the old image if it exists
            if ($this->old_image) {
                $cleanOldPath = str_replace(['storage/', 'public/', 'storage\\', 'public\\'], '', $this->old_image);
                if (Storage::disk('public')->exists($cleanOldPath)) {
                    Storage::disk('public')->delete($cleanOldPath);
                }
            }

            // Stores file inside storage/app/public/posts_uploads/
            // Returns path like: "posts_uploads/filename.jpg"
            $imagePath = $this->new_image->store('posts_uploads', 'public');
        }

        $post->update([
            'title'       => $this->title,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'author_id'   => $this->author_id,
            'image'       => $imagePath,
        ]);

        session()->flash('message', 'Post updated successfully!');

        // 💡 REMOVED: Do not set $this->new_image = null or $this->old_image here. 
        // Let the redirection handle the state change clean up.
        return $this->redirect(route('posts'), navigate: true);
    }

    public function render()
    {
        // 💡 Ensure this path matches where your blade file actually lives
        return view('livewire.posts.edit-post', [
            'categories' => Category::all(),
            'authors'    => Author::all()
        ])->layout('components.layouts.admin');
    }
}

