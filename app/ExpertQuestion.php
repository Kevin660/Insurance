<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ExpertOption;
class ExpertQuestion extends Model
{
    protected $guarded = [];

    public function options(){
        return $this->hasMany(ExpertOption::class, 'question_id');
    }
}
