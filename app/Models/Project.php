<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function projectType()
    {
       return $this->belongsTo(ProjectType::class, 'fk_project_type');
    }

    public function getUploadPath(){
        return public_path('storage/projects/');
    }

    public function projectImages(){
        return $this->hasMany(Image::class, 'fk_project');
    }

    public function removeProjectImage(){
        if(is_file('storage/projects/'.$this->coverimage)){
            unlink('storage/projects/'.$this->coverimage);
        }
    }
    public function getProjectImageUrl(){
        return asset('storage/projects/'.$this->coverimage);
    }
}
