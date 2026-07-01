<?php

namespace App\Livewire\Authors;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Author;

class AddAuthor extends Component
{
    use WithFileUploads;

    public $author = '';
    public $bio = '';
    public $image;

    public function render()
    {
        return view('livewire.authors.add-author')
            ->layout('components.layouts.admin');
    }

public function saveAuthor()
{
    // Validate inputs first
    $this->validate([
        'author' => 'required|min:3',
        'image' => 'required|image|max:1024',
    ]);

    try {
        $imagePath = $this->image->store('authors_uploads', 'public');

        Author::create([
            'author' => $this->author,
            'bio'    => $this->bio,
            'image'  => $imagePath,
        ]);

        $this->reset(['author', 'bio', 'image']);
        session()->flash('success', 'Author profile saved successfully!');

    } catch (\Exception $e) {
        session()->flash('error', 'Failed to save author profile. Please try again.');
    }
}

}

