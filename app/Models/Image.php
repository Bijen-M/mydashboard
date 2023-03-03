<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function serviceImages(){
        return $this->belongsTo(Service::class, 'fk_service');
    }

    public function getServiceImageUrl(){
        return asset('storage/services/'.$this->image);
    }

    public function removeServiceImages(){
        if(is_file('storage/services/'.$this->image)){
            unlink('storage/services/'.$this->image);
        }
    }
}
