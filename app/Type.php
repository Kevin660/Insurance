<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Question;
class Type extends Model
{
    protected $fillable = ['name'];
    public function questionTypes(){
        return $this->hasMany(QuestionType::class);
    }
}
