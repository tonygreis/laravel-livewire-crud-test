<?php

namespace App\Http\Livewire\Fields;

use App\Models\Field;
use App\Models\Option;
use Livewire\Component;
use Livewire\WithPagination;

class View extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'name';
    public $sortAsc = true;
    public $search = '';
    public $field;
    public $options;

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
        $op = Option::findOrFail($id);
        $op->delete();
        $f = Field::findOrFail($op->field_id);
        $this->options = $f->options;
    }
    public function mount(Field $field)
    {
        $this->field = $field;
        $this->options = $field->options;
    }
    public function render()
    {
        return view('livewire.fields.view');
    }
}
