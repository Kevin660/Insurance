<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\InsuranceItem;
class ExpertResult extends Model
{
    protected $guarded = [];

    public function item(){
        return $this->belongsTo(InsuranceItem::class);
    }
}
