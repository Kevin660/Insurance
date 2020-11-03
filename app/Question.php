<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use App\Vote, App\User, App\Type, App\Answer, App\QuestionType;
class Question extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function questionTypes(){
        return $this->hasMany(QuestionType::class);
    }

    public function votes(){
        return $this->morphMany(Vote::class, 'voteable');
    }
    
    public function answer(){
        // accepted one by the user
        return $this->hasOne(Answer::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
