<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','image'];

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function ads()
    {
        return $this->hasMany(Advertisement::class);
    }

    //Scope
    public function scopeCategoryGame($query)
    {
        return $query->where('name','game')->first();
    }

    public function scopeCategoryMovie($query)
    {
        return $query->where('name','movie')->first();
    }
}
