<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public $timestamps = false;

    public const FIELD_TYPE = [
        'Select' => 'select',
        'Text'   => 'text',
        'Checkbox' => 'checkbox',
        'Radio'  => 'radio'
    ];
    protected $fillable = ['name', 'slug', 'active', 'type', 'max', 'default', 'required', 'help'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
