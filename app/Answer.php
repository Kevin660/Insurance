<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User, App\Vote, App\Question;
class Answer extends Model
{
    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function votes(){
        return $this->morphMany(Vote::class, 'voteable');
    }
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
