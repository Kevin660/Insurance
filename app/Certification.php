<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = ['user_id', 'type_id', 'ref', 'verified_at'];

    public function  certificationType(){
        return $this->belongsTo(CertificationType::class, 'type_id');
    }
}
