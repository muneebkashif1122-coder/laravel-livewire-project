<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;

class AddCategory extends Component
{
    public $name = '';

    public function saveCategory()
    {
        // Enforces constraints before running database queries
        $this->validate([
            'name' => 'required|min:3|unique:categories,name',
        ]);

        try {
            Category::create([
                'name' => $this->name,
            ]);

            // Clear input box
            $this->reset(['name']);
            
            session()->flash('success', 'New category added successfully!');

        } catch (\Exception $e) {
            session()->flash('error', 'Failed to save category. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.categories.add-category')
            ->layout('components.layouts.admin');
    }
}
