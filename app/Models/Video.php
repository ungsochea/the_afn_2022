<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;
use Carbon\Carbon;

class Video extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    public $incrementing = false;
    protected $append = ['published','status','status_color','post_by','thumbnail_l','thumbnail_m','thumbnail_s','thumbnail_xs'];
    public function getRouteKeyName()
    {
        return 'id';
    }
    public function setIdAttribute($value){
        $this->attributes['id'] = Str::slug($value);
    }

    public static function generateUserid(int $length = 12): string
    {
        $user_id = Str::random($length);//Generate random string
        $exists = DB::table('users')
            ->where('id', '=', $user_id)
            ->get(['id']);//Find matches for id = generated id
        if (isset($exists[0]->id)) {//id exists in users table
            return self::generateUserid();//Retry with another generated id
        }
        return $user_id;//Return the generated id as it does not exist in the DB
    }
    public function setThumbnailAttribute($value){
        if($value){

            if($this->thumbnail){
                if(Storage::disk('do_spaces')->exists('videos/large/'.$this->thumbnail)){
                    Storage::disk('do_spaces')->delete('videos/large/'.$this->thumbnail);
                }
                if(Storage::disk('do_spaces')->exists('videos/medium/'.$this->thumbnail)){
                    Storage::disk('do_spaces')->delete('videos/medium/'.$this->thumbnail);
                }
                if(Storage::disk('do_spaces')->exists('videos/small/'.$this->thumbnail)){
                    Storage::disk('do_spaces')->delete('videos/small/'.$this->thumbnail);
                }
                if(Storage::disk('do_spaces')->exists('videos/extra_small/'.$this->thumbnail)){
                    Storage::disk('do_spaces')->delete('videos/extra_small/'.$this->thumbnail);
                }
            }

            $extension = $value->extension();
            $image_name = time().'.'.$extension;

            $imgFile = Image::make($value->getRealPath());

            $imgFile->resize(1200, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            Storage::disk('do_spaces')->put('videos/large/'.$image_name,(string) $imgFile);

            $imgFile->resize(960, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            Storage::disk('do_spaces')->put('videos/medium/'.$image_name,(string) $imgFile);

            $imgFile->resize(510, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            Storage::disk('do_spaces')->put('videos/small/'.$image_name,(string) $imgFile);

            $imgFile->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            Storage::disk('do_spaces')->put('videos/extra_small/'.$image_name,(string) $imgFile);


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
            return config('filesystems.disks.do_spaces.url').'/videos/large/'.$this->thumbnail;
        }else{
            return asset('/images/video_thumbnail.png');
        }
    }
    public function getThumbnailMAttribute(){
        if($this->thumbnail){
            return config('filesystems.disks.do_spaces.url').'/videos/medium/'.$this->thumbnail;
        }else{
            return asset('/images/video_thumbnail.png');
        }
    }
    public function getThumbnailSAttribute(){
        if($this->thumbnail){
            return config('filesystems.disks.do_spaces.url').'/videos/small/'.$this->thumbnail;
        }else{
            return asset('/images/video_thumbnail.png');
        }
    }
    public function getThumbnailXsAttribute(){
        if($this->thumbnail){
            return config('filesystems.disks.do_spaces.url').'/videos/extra_small/'.$this->thumbnail;
        }else{
            return asset('/images/video_thumbnail.png');
        }
    }
    // Relationship
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class,VideoCategory::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,VideoTag::class);
    }
}
