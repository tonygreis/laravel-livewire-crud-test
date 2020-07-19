<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public $name = '';
    public $slug = '';
    public $description = '';
    public $active = false;
    public $category;

    public function store()
    {
        $this->validate([
            'name' => ['required'],
            'slug' => ['required', 'unique:categories'],
            'description' => ['required', 'max:255'],
        ]);
        $category = new Category;
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->description = $this->description;
        $category->active = $this->active;
        $category->save();

    }

    public function render()
    {
        return view('livewire.categories.create');
    }
}
