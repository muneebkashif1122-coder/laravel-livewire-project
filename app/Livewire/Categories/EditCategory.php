<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;


class EditCategory extends Component
{
    // ADD THESE TWO LINES HERE AT THE TOP:
    public $categoryId;
    public $name; 

    public function mount($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
    }

    public function updateCategory()
    {
        // This will now run perfectly without throwing an exception!
        $this->validate([
            'name' => 'required|min:3|max:50',
        ]);

        $category = Category::findOrFail($this->categoryId);
        $category->update([
            'name' => $this->name
        ]);

        session()->flash('message', 'Category updated successfully.');

        return $this->redirect(route('categories'), navigate: true);
    }

    public function render()
    {
        return view('livewire.categories.edit-category')
            ->layout('components.layouts.admin');
    }
}

