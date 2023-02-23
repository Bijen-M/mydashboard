<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function getUploadPath(){
        return public_path('storage/aboutus/');
    }

   public function getAboutUsImageUrl(){
        return asset('storage/aboutus/'.$this->image);
    }

    public function removeAboutUsImage(){
        if(is_file('storage/aboutus/'.$this->image)){
            unlink('storage/aboutus/'.$this->image);
        }
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function aboutUsImages(){
        return $this->hasMany(AboutUsImages::class, 'aboutus_id');
    }
}
