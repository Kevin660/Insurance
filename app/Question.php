<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use App\Vote, App\User, App\Type, App\Answer;
class Question extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function votes(){
        return $this->morphMany(Vote::class, 'voteable');
    }
    
    public function answer(){
        return $this->hasOne(Answer::class);
    }
}
