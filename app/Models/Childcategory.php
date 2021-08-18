<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','subcategory_id'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
