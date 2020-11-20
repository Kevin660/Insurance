<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Traits\NotificationHandler;
use App\Question, \App\QuestionType, App\User, App\Type, App\Vote, App\Answer;

class QuestionController extends Controller
{
    use NotificationHandler;
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
        'type_id' => 'nullable|exists:types,id',
    ];

    public function __construct(){}

    public function indexSelf(){
        $validator = Validator::make(request()->all(), $this->indexValidation);
        if ($validator->fails()) abort(403);
        $data = request()->all();
        switch($data['order'] ?? '1' ) {
            case '1':
                $order_by='created_at';
                $order_method='desc';
                break;
            case '2':
                $order_by='created_at';
                $order_method='asc';
                break;
            case '3':
                $order_by='updated_at';
                $order_method='desc';
                break;
            case '4':
                $order_by='viewCount';
                $order_method='desc';
                 break;
            default:
                $order_by='created_at';
                $order_method='desc';
        break;
        }
        $data['order_by']= $order_by ?? 'created_at' ;
        $data['order_method']= $order_method ?? 'desc' ;
        $data['title'] = $data['search_title'] ?? '';
        $user = Auth::user();
        $types = Type::all();
        if ($data['type_id'] ?? 0){
            $questions = Question::where('user_id', $user->id)
                                ->whereHas('questionTypes', function($q) use($data){ $q->where('type_id', $data['type_id']);})
                                ->where('title', 'like', '%'. $data['title'] .'%')
                                ->orderBy($data['order_by'], $data['order_method'])
                                ->get();
        }else{
            $questions = Question::where('user_id', $user->id)
                                ->where('title', 'like', '%'. $data['title'] .'%')
                                ->orderBy($data['order_by'], $data['order_method'])
                                ->get();
        }
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
            $question->load(['user', 'votes', 'answer']);
            $types = Type::all();
            return view('forum_edit', compact('question', 'types'));
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
            $data = request()->all();
            $data += [
                'user_id' => $user->id
            ];
            $type_id_list = $data['type_id'];
            unset($data['type_id']);
            $question->questionTypes()->delete();
            foreach($type_id_list as $type_id){
                QuestionType::create([
                    'question_id' => $question->id,
                    'type_id' => $type_id
                ]);
            }
            $question->update($data);

            return back()->withInput();
        }
        return abort(403, 'Unauthorized action.');
    }

    public function destroy(Question $question){
        $user = Auth::user();
        if ($user == $question->user && $question->answer == null){
            $question->delete();
            return true;
        }
        return false;
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
        $this->addNotification($user, '討論區', '你的發問有新增一筆回答', '/questions/'.$question->id);
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

        switch($data['order'] ?? '1' ) {
            case '1':
                $order_by='created_at';
                $order_method='desc';
                break;
            case '2':
                $order_by='created_at';
                $order_method='asc';
                break;
            case '3':
                $order_by='updated_at';
                $order_method='desc';
                break;
            case '4':
                $order_by='viewCount';
                $order_method='desc';
                 break;
            default:
                $order_by='created_at';
                $order_method='desc';
        break;
        }
        $data['order_by']= $order_by ?? 'created_at' ;
        $data['order_method']= $order_method ?? 'desc' ;
        $data['title'] = $data['search_title'] ?? '';
        $types = Type::all();
        if ($data['type_id'] ?? 0){
            $questions = Question::where('title', 'like', '%'. $data['title'] .'%')
                                ->whereHas('questionTypes', function($q) use($data){ $q->where('type_id', $data['type_id']);})
                                ->orderBy($data['order_by'], $data['order_method'])
                                ->get();
        }else{
            $questions = Question::where('title', 'like', '%'. $data['title'] .'%')
                                ->orderBy($data['order_by'], $data['order_method'])
                                ->get();
        }            
        $questions->load(['user', 'questionTypes.type', 'votes', 'answers']);
        return view('forum', compact('questions','types'));//questions.index //forum
    }

    public function show(Question $question){
        $question->update([
            'viewCount' => $question->viewCount + 1
        ]);
        $user = Auth::user();
        $question->load(['user', 'questionTypes.type', 'votes', 'answers']);
        return view('forum_view', compact('question', 'user'));//questions.show
    }
}