<?php

namespace App\Http\Livewire\Test;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Create extends Component
{
    public $title = '';
    public $description = '';
    public $category_id = '';
    public $parent = '';
    public $categories;
    public $children = [];
    public $fields = [];


    public function store()
    {
        $this->validate([
            'title' => ['required'],
            'category_id' => ['required', 'unique:categories'],
            'description' => ['required', 'max:255'],
        ]);
        $post = new Post;
        $post->title = $this->title;
        $post->category_id = $this->category_id;
        $post->description = $this->description;
        $post->save();

    }

    public function mount()
    {
        $this->categories = Category::all();
    }
    public function render()
    {
        if (!empty($this->parent)){
            $c = Category::findOrFail($this->parent);
            $this->children = $c->children;
            $this->fields = $c->fields;
        }
        return view('livewire.test.create');
    }
}
