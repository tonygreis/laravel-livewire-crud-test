<?php

namespace App\Http\Livewire\Fields;

use App\Models\Field;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'name';
    public $sortAsc = true;
    public $search = '';
    public $field;

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
        $f = Field::findOrFail($id);
        $f->delete();

        return view('livewire.fields.index', [
            'fields' => Field::where('name', 'like', '%'.$this->search.'%')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ]);
    }

    public function render()
    {

        return view('livewire.fields.index', [
            'fields' => Field::where('name', 'like', '%'.$this->search.'%')
                 ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ]);
    }
}
