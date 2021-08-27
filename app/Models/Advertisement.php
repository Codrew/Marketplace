<?php

namespace App\Models;

use Cohensive\Embed\Facades\Embed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advertisement extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Cohensive Embed package
    public function displayVideo()
    {
        $embed = Embed::make($this->link)->parseUrl();
        
        if(!$embed)
        {
            return;
        }

        $embed->setAttribute(['width' => 500]);
        
        return $embed->getHtml();
    }

    //Scope
    public function scopeAds($query,$categoryId)
    {
        return $query->where('category_id',$categoryId)->orderBy('id')->take(4)->get();
    }

    //Scope 2
    public function scopeAds2($query,$categoryId)
    {
        $ads = $this->scopeAds($query,$categoryId);

        return $query->where('category_id',$categoryId)->whereNotIn('id',$ads->pluck('id')
        ->toArray())->take(4)->get();
    }

    //Scope
    public function scopeAdsMovie($query,$categoryId)
    {
        return $query->where('category_id',$categoryId)->orderBy('id')->take(4)->get();
    }

    //Scope 2
    public function scopeAds2Movie($query,$categoryId)
    {
        $ads = $this->scopeAds($query,$categoryId);

        return $query->where('category_id',$categoryId)->whereNotIn('id',$ads->pluck('id')
        ->toArray())->take(4)->get();
    }

    public function childcategory()
    {
        return $this->hasOne(Childcategory::class,'id','childcategory_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}