<?php

namespace App\Http\Livewire\Fields\Options;

use App\Models\Field;
use App\Models\Option;
use Livewire\Component;

class Create extends Component
{
    public $value;
    public $field;

    public function mount(Field $field)
    {
        $this->field = $field;
    }
    public function store()
    {
        $this->validate([
            'value' => ['required'],
        ]);
        $op = new Option;
        $op->field_id = $this->field->id;
        $op->value = $this->value;
        $op->save();

        return redirect()->to(route('fields.show', $this->field->id));

    }
    public function render()
    {
        return view('livewire.fields.options.create');
    }
}
