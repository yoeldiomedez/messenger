<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $appends = ['contact_name', 'contact_picture'];

    public function getContactPictureAttribute()
    {
        return "/users/" . $this->contact()->first(['picture'])->picture;
    }    
    
    public function getContactNameAttribute()
    {
        return $this->contact()->first(['name'])->name;
    }

    public function contact()
    {
        return $this->belongsTo(User::class);
    }
}
