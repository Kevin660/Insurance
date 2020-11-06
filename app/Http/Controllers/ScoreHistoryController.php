<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ScoreHistoryController extends Controller
{
    
    protected $validation = [
        'point' => 'bail|required|integer',
        'description' => 'bail|required|max:1000',
    ];
    public function indexSelf(){
        $user = Auth::user();
        $scoreHistory = $user->scoreHistory();
        return view('', compact('scoreHistory'));
    }
    
    public function add(User $user){
        $data = request()->all();
        $validator = Validator::make($data, $this->validation);
        if ($validator->fails()) abort(403);
        $user->scoreHistory()->create($data);
        return true;
    }
}
