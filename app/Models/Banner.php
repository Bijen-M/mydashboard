<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getUploadPath(){
        return public_path('storage/banners/');
    }

    public function getBannerImageUrl(){
        return asset('storage/banners/'.$this->image);
    }

    public function removeBannerImage(){
        if(is_file('storage/banners/'.$this->image)){
            unlink('storage/banners/'.$this->image);
        }
    }

}
