<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use App\Models\Field;
use Livewire\Component;

class AddField extends Component
{
    public $category;
    public $fields;
    public $field = '';

    public function store()
    {
        $this->category->fields()->attach($this->field);
        return view('livewire.categories.view');
    }

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->fields = Field::all();
    }
    public function render()
    {
        return view('livewire.categories.add-field');
    }
}
