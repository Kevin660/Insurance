<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    protected $validation = [
        'content' => 'bail|required|max:5000',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Answer $answer){
        $user = Auth::user();
        if ($user == $answer->user){
            $answer->load(['user', 'type', 'votes', 'answer']);
            return view('answers.edit', compact('answer'));
        }
        return abort(403, 'Unauthorized action.');
    }

    public function update(Answer $answer){
        $user = Auth::user();
        if ($user == $answer->user && $answer->question->answer == null){
            // validate
            $validator = Validator::make(request()->all(), $this->validation);
            if ($validator->fails()) {
                return back()->withErrors($validator)
                            ->withInput();
            }

            $answer->update(request()->all());
            return back()->withInput();
        }
        return abort(403, 'Unauthorized action.');
    }

    public function destroy(Answer $answer){
        $user = Auth::user();
        if ($user == $answer->user && $answer->question->answer == null) $answer->delete();
        return back()->withInput();
    }


    // vote
    public function voteUp(Answer $answer){
        $user = Auth::user();
        $answer->votes()->updateOrCreate(
            ['user_id' => $user->id],
            ['count' => 1]
        );
        return true;
    }

    public function voteDown(Answer $answer){
        $user = Auth::user();
        $answer->votes()->updateOrCreate(
            ['user_id' => $user->id],
            ['count' => -1]
        );
        return true;
    }

    public function voteCancel(Answer $answer){
        $user = Auth::user();
        $votes = $answer->votes;
        $answer->votes()->where(
            ['user_id' => $user->id]
        )->delete();
        return true;
    }
}
