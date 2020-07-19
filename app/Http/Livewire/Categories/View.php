<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class View extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'name';
    public $sortAsc = true;
    public $search = '';
    public $category;
    public $children;
    public $fields;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }
    public function delete($id)
    {

        $cat = Category::findOrFail($id);
        $parent = Category::findOrFail($cat->parent_id);
        $cat->delete();
        $this->children = $parent->children;
    }

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->children = $category->children;
        $this->fields = $category->fields;
    }
    public function render()
    {
        return view('livewire.categories.view');
    }
}
