<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Notification;
class NotificationController extends Controller
{
    public function read(Notification $notification){
        $user = Auth::user();
        if ($notification->user->user_id != $user->user_id or
            $notification->read != null) {
            return false;
        }
        $time = now();
        $notification->update([
            'read_time' => $time,
        ]);
        return redirect($notification->link);
    }
    public function readAll(){
        $user = Auth::user();
        $time = now();
        $user->notifications()->whereNull('read_time')->each->update([
            'read_time' => $time,
        ]);
        return true;
    }
}
