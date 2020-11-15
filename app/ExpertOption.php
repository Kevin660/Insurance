<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ExpertQuestion;
class ExpertOption extends Model
{
    protected $guarded = [];
    public function question(){
        return $this->belongsTo(ExpertQuestion::class);
    }
    public function nextQuestion(){
        return $this->hasOne(ExpertQuestion::class, 'id', 'next_question_id');
    }
}
