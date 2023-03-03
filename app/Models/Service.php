<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(Image::class, 'fk_service');
    }

    public function getUploadPath(){
        return public_path('storage/services/');
    }

    public function getServiceImageUrl(){
        return asset('storage/services/'.$this->coverimage);
    }

    public function serviceImages(){
        return $this->hasMany(Image::class, 'fk_service');
    }
    public function removeServiceImage(){
        if(is_file('storage/services/'.$this->coverimage)){
            unlink('storage/services/'.$this->coverimage);
        }
    }

}
