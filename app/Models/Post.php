<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    protected $append = ['published','status','status_color','post_by','thumbnail_l','thumbnail_m','thumbnail_s','thumbnail_xs'];

    // Set Attribute
    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug($value);
    }
    public function setThumbnailAttribute($value){
        if($value){

            if($this->thumbnail){
                if(Storage::disk('do_spaces')->exists('posts/large/'.$this->thumbnail)){
                    Storage::disk('do_spaces')->delete('posts/large/'.$this->thumbnail);
                }
                if(Storage::disk('do_spaces')->exists('posts/medium/'.$this->thumbnail)){
                    Storage::disk('do_spaces')->delete('posts/medium/'.$this->thumbnail);
                }
                if(Storage::disk('do_spaces')->exists('posts/small/'.$this->thumbnail)){
                    Storage::disk('do_spaces')->delete('posts/small/'.$this->thumbnail);
                }
                if(Storage::disk('do_spaces')->exists('posts/extra_small/'.$this->thumbnail)){
                    Storage::disk('do_spaces')->delete('posts/extra_small/'.$this->thumbnail);
                }
            }

            $extension = $value->extension();
            $image_name = time().'.'.$extension;

            $imgFile = Image::make($value->getRealPath());

            $imgFile->resize(1200, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            Storage::disk('do_spaces')->put('posts/large/'.$image_name,(string) $imgFile);

            $imgFile->resize(960, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            Storage::disk('do_spaces')->put('posts/medium/'.$image_name,(string) $imgFile);

            $imgFile->resize(510, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            Storage::disk('do_spaces')->put('posts/small/'.$image_name,(string) $imgFile);

            $imgFile->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            Storage::disk('do_spaces')->put('posts/extra_small/'.$image_name,(string) $imgFile);


            $this->attributes['thumbnail'] = $image_name;
        }
    }

    // get attribute
    public function getPublishedAttribute(){
        return Carbon::parse($this->published_at)->format('d M Y H:i');
    }
    public function getStatusAttribute(){
        return $this->is_activated == 1 ? 'Active' : 'Inactive';
    }
    public function getStatusColorAttribute(){
        return $this->is_activated == 1 ? 'success' : 'danger';
    }
    public function getPostByAttribute(){
        return $this->user->name ?? '';
    }
    public function getThumbnailLAttribute(){
        if($this->thumbnail){
            return config('filesystems.disks.do_spaces.url').'/posts/large/'.$this->thumbnail;
        }else{
            return asset('/images/post_thumbnail.png');
        }
    }
    public function getThumbnailMAttribute(){
        if($this->thumbnail){
            return config('filesystems.disks.do_spaces.url').'/posts/medium/'.$this->thumbnail;
        }else{
            return asset('/images/post_thumbnail.png');
        }
    }
    public function getThumbnailSAttribute(){
        if($this->thumbnail){
            return config('filesystems.disks.do_spaces.url').'/posts/small/'.$this->thumbnail;
        }else{
            return asset('/images/post_thumbnail.png');
        }
    }
    public function getThumbnailXsAttribute(){
        if($this->thumbnail){
            return config('filesystems.disks.do_spaces.url').'/posts/extra_small/'.$this->thumbnail;
        }else{
            return asset('/images/post_thumbnail.png');
        }
    }

    // Relationship
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class,PostCategory::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,PostTag::class);
    }
}
