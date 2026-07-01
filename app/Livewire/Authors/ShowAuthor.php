<?php

namespace App\Livewire\Authors;

use Livewire\Component;
use App\Models\Author; // Correct singular model import
use Illuminate\Support\Facades\File;

class ShowAuthor extends Component
{
public function deleteAuthor($id)
{
    $author = Author::find($id);

    if ($author) {
        if ($author->image) {
            // 1. Strip any accidental leading slashes from the database value
            $cleanDatabasePath = ltrim($author->image, '/\\');
            
            // 2. Combine public_path with 'storage' and your database value
            // This perfectly targets: public/storage/authors_uploads/filename.webp
            $imagePath = public_path('storage' . DIRECTORY_SEPARATOR . $cleanDatabasePath);

            // 3. Delete the file from your disk
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // 4. Delete the author record from the database
        $author->delete();
        
        session()->flash('message', 'Author and their image deleted successfully.');
    }
}




    public function render()
    {
        return view('livewire.authors.show-author', [
            'authors' => Author::all() 
        ])->layout('components.layouts.admin');
    }
}

