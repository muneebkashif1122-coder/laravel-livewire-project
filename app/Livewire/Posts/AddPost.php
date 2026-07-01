<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Post;     // 🔑 THE FIX: Import your Post model here!
use App\Models\Category; // Ensure Category model is imported
use App\Models\Author;   // Ensure Author model is imported

class AddPost extends Component
{
    // ... your remaining component code stays exactly the same

    use WithFileUploads; 

    // Form inputs
    public $title = '';
    public $slug = ''; // Added to track our custom clean URL string
    public $description = '';
    public $category_id = '';
    public $image;
    public $author_id = '';

    /**
     * Livewire Lifecycle Hook
     * Fires automatically in real-time when the $title property changes.
     */
    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    /**
     * Process and Save the New Post into the Database
     */
    public function save()
    {
        // 1. Validate inputs (Matching your specific table schema types)
        $this->validate([
            'title' => 'required|min:3',
            'slug' => 'required|unique:posts,slug', // Ensures database uniqueness
            'description' => 'required',
            'category_id' => 'required|exists:categories,id', // Validates against existing categories
            'image' => 'required|image|max:2048', // Allowed up to 2MB images
            'author_id' => 'required|exists:authors,id', // Validates against existing authors
        ]);

        try {
            // 2. Process image file storage under storage/app/public/posts_uploads
            $imagePath = $this->image->store('posts_uploads', 'public');

            // 3. Attempt writing into your relational database table
            Post::create([
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
                'category_id' => $this->category_id,
                'image' => $imagePath,
                'author_id' => $this->author_id,
            ]);

            // 4. Clear fields back to defaults after successful execution
            $this->reset(['title', 'slug', 'description', 'category_id', 'image', 'author_id']);
            
            // 5. Trigger success flash banner
            session()->flash('success', 'Post published successfully!');

            // Optional: Redirect back to your main list view
            // return redirect()->route('authors');

        } catch (\Exception $e) {
            // Fallback tracking banner
            session()->flash('error', 'Failed to publish post: ' . $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.posts.add-post', [
            'categories' => Category::all(), // Fetches all categories for the select loop
            'authors' => Author::all(),       // Fetches all authors for the select loop
        ])->layout('components.layouts.admin');
    }
}
