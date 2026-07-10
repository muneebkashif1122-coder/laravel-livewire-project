<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public $query = '';

    public function render()
    {
        $results = [];

        if (strlen($this->query) >= 2) {
            $results = Post::where('title', 'like', '%' . $this->query . '%')
                ->latest('id')
                ->take(5)
                ->get();
        }

        return view('livewire.search', ['results' => $results]);
    }
}
