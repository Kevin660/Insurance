<?php

namespace App\Traits;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

trait ScoreHandler
{
    
    protected $scoreValidation = [
        'point' => 'bail|required|integer',
        'description' => 'bail|required|max:1000',
    ];
    public function addScore($user, $point, $description){
        $data = compact('point','description');
        $validator = Validator::make($data, $this->scoreValidation);
        if ($validator->fails()) return false;
        
        $user->scoreHistory()->create($data);
        $user->increment('score', $point);
        return true;
    }
}
