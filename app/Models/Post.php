<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    protected $fillable = ['content','user_id']; 
 
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }

}
