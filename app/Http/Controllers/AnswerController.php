<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Traits\ScoreHandler;

use App\Answer;
class AnswerController extends Controller
{
    use scoreHandler;
    protected $validation = [
        'content' => 'bail|required|max:5000',
    ];

    public function __construct(){}

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
        $vote = $answer->votes()->where(
            ['user_id' => $user->id]
        )->first();
        $answer->votes()->updateOrCreate(
            ['user_id' => $user->id],
            ['count' => 1]
        );
        if ($vote) $this->addScore($answer->user, -$vote->count * 5, 'Vote cancel from answering of a question.');
        $this->addScore($answer->user, 5, 'Vote-up from answering of a question.');
        return true;
    }

    public function voteDown(Answer $answer){
        $user = Auth::user();
        $vote = $answer->votes()->where(
            ['user_id' => $user->id]
        )->first();
        $answer->votes()->updateOrCreate(
            ['user_id' => $user->id],
            ['count' => -1]
        );
        if ($vote) $this->addScore($answer->user, -$vote->count * 5, 'Vote cancel from answering of a question.');
        $this->addScore($answer->user, -5, 'Vote up from answering of a question.');
        return true;
    }

    public function voteCancel(Answer $answer){
        $user = Auth::user();
        $vote = $answer->votes()->where(
            ['user_id' => $user->id]
        )->first();
        if ($vote){
            $vote->delete();
            $this->addScore($answer->user, -$vote->count * 5, 'Vote cancel from answering of a question.');
            return true;
        }
        return false;
    }
}
