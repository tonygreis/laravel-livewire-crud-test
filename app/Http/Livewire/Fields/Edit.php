<?php

namespace App\Http\Livewire\Fields;

use App\Models\Field;
use Livewire\Component;

class Edit extends Component
{
    public $field;
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
        $field = Field::findOrFail($this->field->id);
        $field->update([
           'name' => $this->name,
           'type' => $this->type,
           'max' => $this->max,
           'default' => $this->default,
            'help' => $this->help,
           'required' => $this->required,
           'active' => $this->active
        ]);

        return redirect()->to(route('fields.index'));

    }

    public function mount(Field $field)
    {
        $this->field = $field;
        $this->name = $field->name;
        $this->type = $field->type;
        $this->max = $field->max;
        $this->default = $field->default;
        $this->help = $field->help;
        $this->required = $field->required;
        $this->active = $field->active;

    }
    public function render()
    {
        return view('livewire.fields.edit');
    }
}
