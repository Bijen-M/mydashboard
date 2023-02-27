<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsImages extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function aboutUs(){
        return $this->belongsTo(AboutUs::class, 'aboutus_id');
    }

    public function getAboutUsImageUrl(){
        return asset('storage/aboutus/'.$this->image);
    }
    public function removeAboutUsImages(){
        if(is_file('storage/aboutus/'.$this->image)){
            unlink('storage/aboutus/'.$this->image);
        }
    }
}
