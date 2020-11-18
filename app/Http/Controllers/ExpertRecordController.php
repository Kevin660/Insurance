<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpertRecordController extends Controller
{
    public function index(){
        $user = Auth::user();
        $sales = DB::table('expert_records')->groupBy('sale_id')->addSelect(DB::raw('*, max(created_at) as max_created_at'))->orderByDesc('max_created_at')->get();
        $expertRecordCollection = $user->expertRecords->groupBy('sale_id');
        $expertRecords = [];
        foreach($sales as $sale){
            $record = $expertRecordCollection[$sale->sale_id]->first();
            $record->id = null; // not a relativec object
            $record->created_at = $sale->max_created_at;
            $record->count = $expertRecordCollection[$sale->sale_id]->count();
            array_push($expertRecords, $record);
        }
        return view('backend.expertRecord', compact('expertRecords'));
    }
}
