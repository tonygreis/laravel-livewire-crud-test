<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    protected $fillable = ['name', 'slug', 'description', 'active'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')->isParent();
    }

    public function scopeParent($query)
    {
        return $query->where('parent_id', 0);
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class);
    }
}
