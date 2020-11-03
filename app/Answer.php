<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Vote, App\Question;
class Answer extends Model
{
    protected $guarded = [];
    
    public function vote(){
        return $this->morphMany(Vote, 'voteable');
    }
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
