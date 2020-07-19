<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class AddSub extends Component
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
        $cat = new Category;
        $cat->parent_id = $this->category->id;
        $cat->name = $this->name;
        $cat->slug = $this->slug;
        $cat->description = $this->description;
        $cat->active = $this->active;
        $cat->save();

        return redirect()->to(route('categories.view', $this->category->id));

    }

    public function mount(Category $category)
    {
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.categories.add-sub');
    }
}
