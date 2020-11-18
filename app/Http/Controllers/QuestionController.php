<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Question, \App\QuestionType, App\User, App\Type, App\Vote, App\Answer;

class QuestionController extends Controller
{
    protected $questionValidation = [
        'type_id' => 'bail|required|array',
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
        $types = Type::all();
        $questions = Question::where('user_id', $user->id)
                        ->where('title', 'like', '%'. $data['title'] .'%')
                        ->orderBy($data['order_by'], $data['order_method'])
                        ->get();
        $questions->load(['user', 'questionTypes.type', 'votes', 'answer']);
        return view('forum', compact('questions','types')); //forum
    }
    public function create(){
        $types = Type::all();
        return view('forum_post', compact('types')); //questions.create //forum_post
    }

    public function store(){
        $validator = Validator::make(request()->all(), $this->questionValidation);
        $validator->after(function ($validator) {
            $typeId = request()->all()['type_id'];
            if (Type::find($typeId)->count() != count($typeId) and count($typeId) != 0) {
                $validator->errors()->add('type_id', 'wrong input!');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator)
                         ->withInput();
        }
        $user = Auth::user();
        $data = request()->all();
        $data += [
            'user_id' => $user->id
        ];
        $type_id_list = $data['type_id'];
        unset($data['type_id']);
        $question = Question::create($data);
        
        foreach($type_id_list as $type_id){
            QuestionType::create([
                'question_id' => $question->id,
                'type_id' => $type_id
            ]);
        }
        return redirect('questions/index');
    }
    

    public function edit(Question $question){
        $user = Auth::user();
        if ($user == $question->user && $question->answer == null){
            $question->load(['user', 'questionTypes.type', 'votes', 'answer']);
            return view('questions.edit', compact('question'));//questions.edit //forum_edit
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
        $user = Auth::user();
        if ($user->role != 1) return abort(403, 'Unauthorized action.');
        $validator = Validator::make(request()->all(), $this->answerValidation);
        if ($question->answers()->where('user_id', $user->id)->count() != 0) {
            $validator->after(function ($validator) {
                $validator->errors()->add('error_msg', 'you have answer this question.');
            });
        }
        if ($validator->fails()) {
            return back()->withErrors($validator)
                         ->withInput();
        }
        $data = request()->all();
        $data += [
            'user_id' => $user->id,
            'question_id' => $question->id
        ];
        $answer = $question->answers()->create($data);
        return true;
    }
    public function accept(Question $question, Answer $answer){
        $user = Auth::user();
        if ($user->id == $question->user->id &&
            $question->id  == $answer->question->id &&
            $question->answer == null){
            $question->update([
                'answer_id' => $answer->id
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
        $questions->load(['user', 'questionTypes.type', 'votes', 'answers']);
        $types = Type::all();
        return view('forum', compact('questions','types'));//questions.index //forum
    }

    public function show(Question $question){
        $question->update([
            'viewCount' => $question->viewCount + 1
        ]);
        $user = Auth::user();
        $question->load(['user', 'questionTypes.type', 'votes', 'answers']);
        return view('questions.show', compact('question', 'user'));//questions.show //forum_view
    }
}
