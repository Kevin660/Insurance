<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Question, App\User, App\Type, App\Vote;

class QuestionController extends Controller
{
    protected $questionValidation = [
        'type_id' => 'bail|required|exists:types,id',
        'title' => 'bail|required|max:255',
        'content' => 'bail|required|max:5000',
    ];
    protected $answerValidation = [
        'content' => 'bail|required|max:5000',
    ];
    protected $indexValidation = [
        'order_by' => 'in:created_at,updated_at,viewCount',
        'order_method' => 'in:asc,desc',
        'title' => 'max:255',
    ];

    public function __construct(){}

    public function indexSelf(){
        $validator = Validator::make(request()->all(), $this->indexValidation);
        if ($validator->fails()) abort(403);
        $data = request()->all();
        $data['order_by'] = $data['order_by'] ?? 'created_at';
        $data['order_method'] = $data['order_method'] ?? 'desc';
        $data['title'] = $data['title'] ?? '';
        
        $user = Auth::user();
        $questions = Question::where('user_id', $user->id)
                        ->where('title', 'like', '%'. $data['title'] .'%')
                        ->orderBy($data['order_by'], $data['order_method'])
                        ->get();
        $questions->load(['user', 'type', 'votes', 'answer']);
        return view('questions.index', compact('questions'));
    }
    public function create(){
        $types = Type::all();
        return view('questions.create', compact('types'));
    }

    public function store(){
        $validator = Validator::make(request()->all(), $this->questionValidation);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                         ->withInput();
        }

        $user = Auth::user();
        $data = request()->all();
        $data += [
            'user_id' => $user->id
        ];
        $question = Question::create($data);
        return redirect('questions/index');
    }
    

    public function edit(Question $question){
        $user = Auth::user();
        if ($user == $question->user && $question->answer == null){
            $question->load(['user', 'type', 'votes', 'answer']);
            return view('questions.edit', compact('question'));
        }
        return abort(403, 'Unauthorized action.');
    }

    public function update(Question $question){
        $user = Auth::user();
        if ($user == $question->user && $question->answer == null){
            // validate
            $validator = Validator::make(request()->all(), $this->questionValidation);
            if ($validator->fails()) {
                return back()->withErrors($validator)
                            ->withInput();
            }

            $question->update(request()->all());
            return back()->withInput();
        }
        return abort(403, 'Unauthorized action.');
    }

    public function destroy(Question $question){
        $user = Auth::user();
        if ($user == $question->user && $question->answer == null){
            $question->delete();
        }
        return back()->withInput();
    }

    // answer
    public function answer(Question $question){
        $validator = Validator::make(request()->all(), $this->answerValidation);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                         ->withInput();
        }

        $user = Auth::user();
        $data = request()->all();
        $data += [
            'user_id' => $user->id
        ];
        $answer = $question->answer()->create($data);
        return redirect('');
    }
    public function accept(Question $question, Answer $answer){
        $user = Auth::user();
        if ($user == $question->user &&
            $question  == $answer->question &&
            $question->answer == null){
            $question->update([
                'answer' => $answer
            ]);  
            return true;
        }
        return false;
    }

    // vote
    public function voteUp(Question $question){
        $user = Auth::user();
        $question->votes()->updateOrCreate(
            ['user_id' => $user->id],
            ['count' => 1]
        );
        return true;
    }

    public function voteDown(Question $question){
        $user = Auth::user();
        $question->votes()->updateOrCreate(
            ['user_id' => $user->id],
            ['count' => -1]
        );
        return true;
    }

    public function voteCancel(Question $question){
        $user = Auth::user();
        $votes = $question->votes;
        $question->votes()->where(
            ['user_id' => $user->id]
        )->delete();
        return true;
    }


    // no auth
    public function index(){
        $validator = Validator::make(request()->all(), $this->indexValidation);
        if ($validator->fails()) abort(403);
        $data = request()->all();
        $data['order_by'] = $data['order_by'] ?? 'created_at';
        $data['order_method'] = $data['order_method'] ?? 'desc';
        $data['title'] = $data['title'] ?? '';
        
        $questions = Question::where('title', 'like', '%'. $data['title'] .'%')
                         ->orderBy($data['order_by'], $data['order_method'])
                         ->get();
        $questions->load(['user', 'type', 'votes', 'answer']);
        return view('questions.index', compact('questions'));
    }

    public function show(Question $question){
        $question->update([
            'viewCount' => $question->viewCount + 1
        ]);
        $question->load(['user', 'type', 'votes', 'answer']);
        return view('questions.show', compact('question'));
    }
}
