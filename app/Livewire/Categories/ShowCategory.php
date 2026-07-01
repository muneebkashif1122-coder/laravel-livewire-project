<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category; // 1. Ensure the Category Model is imported

class ShowCategory extends Component
{
public function deleteCategory($id)
{
    // Clean and direct model query using your imported namespace
    $category = Category::find($id);

    if ($category) {
        $category->delete();
        session()->flash('message', 'Category deleted successfully.');
    }
}


    public function render()
    {
        // 2. THE FIX: Explicitly fetch all categories and pass them to the Blade template
        return view('livewire.categories.show-category', [
            'categories' => Category::all() 
        ])->layout('components.layouts.admin');
    }
}

