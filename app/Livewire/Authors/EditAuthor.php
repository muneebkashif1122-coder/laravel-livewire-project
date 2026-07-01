<?php

namespace App\Livewire\Authors;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;

class EditAuthor extends Component
{
    use WithFileUploads;

    public $authorId;
    public $author; // 🚀 FIXED: Matches your model column 'author'
    public $bio;    // 🚀 FIXED: Matches your model column 'bio'
    public $old_image; 
    public $new_image; 

    public function mount($id)
    {
        $authorData = Author::findOrFail($id);
        
        $this->authorId = $authorData->id;
        $this->author = $authorData->author; // 🚀 Map 'author' column
        $this->bio = $authorData->bio;       // 🚀 Map 'bio' column
        $this->old_image = $authorData->image; 
    }

    public function updateAuthor()
    {
        // Validation check matching your database keys
        $this->validate([
            'author'    => 'required|min:3|max:50',
            'bio'       => 'nullable|max:500',
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', 
        ]);

        $authorData = Author::findOrFail($this->authorId);
        $avatarPath = $this->old_image;

        if ($this->new_image) {
            if ($this->old_image) {
                $cleanOldPath = str_replace(['storage/', 'public/', 'storage\\', 'public\\'], '', $this->old_image);
                if (Storage::disk('public')->exists($cleanOldPath)) {
                    Storage::disk('public')->delete($cleanOldPath);
                }
            }
            $avatarPath = $this->new_image->store('authors_uploads', 'public');
        }

        // 🚀 FIXED: Now aligns perfectly with your model's $fillable array
        $authorData->update([
            'author' => $this->author,
            'bio'    => $this->bio,
            'image'  => $avatarPath,
        ]);

        session()->flash('message', 'Author details updated successfully!');

        return $this->redirect(route('authors'), navigate: true);
    }

    public function render()
    {
        return view('livewire.authors.edit-author')
            ->layout('components.layouts.admin');
    }
}


