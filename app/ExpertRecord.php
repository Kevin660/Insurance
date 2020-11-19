<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
class ExpertRecord extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function sale(){
        return $this->belongsTo(User::class, 'sale_id');
    }
}
