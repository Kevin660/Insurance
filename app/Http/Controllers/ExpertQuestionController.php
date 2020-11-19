<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ExpertQuestion, App\ExpertOption, App\ExpertResult, App\InsuranceItem;
class ExpertQuestionController extends Controller
{
    public function question(){
        $questions = ExpertQuestion::all();
        $items = InsuranceItem::all();
        $questions->load('options');
        return view('analyze', compact('questions', 'items'));
    }
    public function analyze(){
        $data = request()->all();
        $results = ExpertResult::whereIn('option_id', $data['option_id'])->get();
        $results->load('item');
        return view('analyze', compact('results'));
    }
}
