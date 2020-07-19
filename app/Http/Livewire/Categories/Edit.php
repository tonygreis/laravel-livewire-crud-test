<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public $category;
    public $name = '';
    public $slug = '';
    public $description = '';
    public $active = false;

    public function update()
    {
        $this->validate([
            'name' => ['required'],
            'slug' => ['required'],
            'description' => ['required', 'max:255'],
        ]);
        $category = Category::findOrFail($this->category->id);
        $category->update([
           'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'active' => $this->active,
        ]);
        return redirect()->to('/categories');
    }
    public function mount(Category $category)
    {
        $this->category = $category;
        if ($category) {
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->description = $category->description;
            $this->active = $category->active;
        }

    }
    public function render()
    {
        return view('livewire.categories.edit');
    }
}
