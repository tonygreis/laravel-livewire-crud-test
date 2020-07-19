<?php

namespace App\Http\Livewire\Fields\Options;

use App\Models\Field;
use App\Models\Option;
use Livewire\Component;

class Edit extends Component
{
    public $option;
    public $field;
    public $value;

    public function update()
    {
        $op = Option::findOrFail($this->option->id);
        $op->update([
            'value' => $this->value
        ]);
        return redirect()->to(route('fields.show', $this->field->id));
    }
    public function mount(Field $field, Option $option)
    {
        $this->field = $field;
        $this->option = $option;
        $this->value = $option->value;
    }
    public function render()
    {
        return view('livewire.fields.options.edit');
    }
}
