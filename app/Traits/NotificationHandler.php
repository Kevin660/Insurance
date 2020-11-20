<?php

namespace App\Traits;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

trait NotificationHandler
{
    
    protected $notificationValidation = [
        'type' => 'bail|string|max:10',
        'content' => 'bail|string|max:255',
        'link' => 'bail|string|max:1000',
    ];
    public function addNotification($user, $type, $content, $link){
        $data = compact('type','content', 'link');
        $validator = Validator::make($data, $this->notificationValidation);
        if ($validator->fails()) return false;
        return $user->notifications()->create($data);
    }
}
