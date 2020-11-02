<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use \App\User;
use \App\Certification;
use \App\CertificationType;
class UserController extends Controller
{
    public function sales(int $typeId = 1){
        // at least one certification
        static $roleId = 1;
        $certificationTypes = CertificationType::select('id')->where('type', $typeId);
        $sales = User::where('users.role', $roleId)
            ->join('certifications', 'users.id' , '=', 'certifications.user_id')
            ->whereIn('certifications.type_id', $certificationTypes->get())
            ->where('users.enabled', 1)
            ->whereNotNull('certifications.verified_at')
            ->groupBy('certifications.user_id')
            ->havingRaw('count(*) = ?', [$certificationTypes->count()])
            ->select('users.*')
            ->get();
        $sales->load('certifications.certificationType');
        return view('sales', compact('sales'));
    }
}