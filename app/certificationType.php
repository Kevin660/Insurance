<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class certificationType extends Model
{
    protected $fillable = ['type', 'name'];
    
    public function certifications(){
        return $this->hasMany(Certifications::class);
    }
}
