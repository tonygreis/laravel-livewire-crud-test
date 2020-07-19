<?php

namespace App\Http\Livewire\Fields;

use App\Models\Field;
use Livewire\Component;

class Create extends Component
{
    public $name = '';
    public $type = '';
    public $max = '';
    public $default = '';
    public $help = '';
    public $required = false;
    public $active = false;

    public function store()
    {
        $this->validate([
            'name' => ['required'],
            'type' => ['required'],
            'max' => ['required'],
            'default' => ['max:255'],
            'required' => ['required'],
            'active' => ['required'],
        ]);
        $field = new Field;
        $field->name = $this->name;
        $field->type = $this->type;
        $field->max = $this->max;
        $field->default = $this->default;
        $field->help = $this->help;
        $field->required = $this->required;
        $field->active = $this->active;
        $field->save();

        return redirect()->to(route('fields.index'));

    }
    public function render()
    {
        return view('livewire.fields.create');
    }
}
