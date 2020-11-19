<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Question, App\Type;

class QuestionType extends Model
{
    protected $fillable = ['question_id', 'type_id'];

    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
}
