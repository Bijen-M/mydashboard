<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    public function getSiteLogoUrl(){
        return asset('storage/settings/'.$this->site_logo);
    }
    public function getContactImageUrl(){
        return asset('storage/settings/'.$this->contact_image);
    }
    public function getBreadcrumbImageUrl(){
        return asset('storage/settings/'.$this->breadcrumb_image);
    }
    public function getUploadPath(){
        return public_path('storage/settings/');
    }
    public function removeSiteLogo(){
        if(is_file('storage/settings/'.$this->site_logo)){
            unlink('storage/settings/'.$this->site_logo);
        }
    }
    public function removeContactImage(){
        if(is_file('storage/settings/'.$this->contact_image)){
            unlink('storage/settings/'.$this->contact_image);
        }
    }
    public function removeBreadcrumbImage(){
        if(is_file('storage/settings/'.$this->breadcrumb_image)){
            unlink('storage/settings/'.$this->breadcrumb_image);
        }
    }
}
