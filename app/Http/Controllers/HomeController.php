<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $user->questions = $user->questions->sortByDesc('created_at');
        $user->notifications = $user->notifications->whereNull('read_time')->sortByDesc('created_at');
        $user->expertRecord =  $user->expertRecords->sortBy('created_at')->last();
        $user->load(['questions.answers', 'questions.answer']);
        return view('backend.home', compact('user'));
    }
}
