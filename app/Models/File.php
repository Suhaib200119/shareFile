<?php

namespace App\Models;

use App\Observers\FileObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public function getFileNameAttribute($value){
        return strtoupper($value);
    }

    public function setLinkHoursAttribute($value){
        $this->attributes["linkHours"]="after $value h";
    }
 
    protected static function boot(){
        parent::boot();
        static::observe(FileObserver::class);
    }
}
