<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $append = ['status','status_color'];

    // Get Attibute
    public function getStatusAttribute()
    {
        return data_get(Status(),$this->is_activated);
    }
    public function getStatusColorAttribute(){
       return $this->is_activated == 0 ? 'danger' : 'success';
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class,'video_tags');
    }
}
