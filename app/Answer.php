<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Vote;
class Answer extends Model
{
    protected $guarded = [];
    
    public function vote(){
        return $this->morphMany(Vote, 'voteable');
    }
}
