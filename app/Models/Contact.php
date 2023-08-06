<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=['name','question','post_id','answer_id','status'];
    public function post(){
        return $this->belongsTo(Post::class,'post_id','id');
    }
//    public function belong()
//    {
//        return $this->belongsTo(Contact::class, 'answer_id', 'id');
//    }

}
