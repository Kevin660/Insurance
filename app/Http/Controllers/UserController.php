<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Mail\NoticeMail;
use \App\User;
use \App\Certification;
use \App\CertificationType;
class UserController extends Controller
{
    protected $validation = [
        'chinese_name' => ['required', 'string', 'max:10'],
        'email' => ['string', 'email', 'max:255', 'unique:users'],
        'birthday' => ['required', 'date'],
        'gender' => ['required', 'integer', 'in:1,2'],
        'address' => ['required', 'string', 'max:255'],
        'number_home' => ['string', 'max:255'],
        'number_cellphone' => ['required', 'string', 'max:255'],
    ];
    
    public function indexSelf(){
        $user = Auth::user();
        return view('backend.user', compact('user'));
    }
    public function update(){
        $data = request()->all();
        $validator = Validator::make($data, $this->validation);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }
        Auth::user()->update($data);
        return redirect('user');
    }
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
        return view('sales/index', compact('sales'));
    }

    public function show(User $user){
        static $roleId = 1;
        if ($user->role = $roleId && $user->enabled = 1){
            $sale = $user;
            $sale->load('certifications.certificationType');
            return view('sales/show', compact('sale'));
        }
        return abort(403, 'Unauthorized action.');
    }

    public function sendNotice(User $user){
        static $roleId = 1;
        $sale = $user;
        if ($sale->role = $roleId && $sale->enabled == 1){
            $user = Auth::user();
            if ($user->email_verified_at){
                Mail::to($sale)
                ->send(new NoticeMail($user));
                $user->expertRecord()->create([
                    'user_id' => $user->id,
                    'sale_id' => $sale->id,
                ]);
                return true;
            }
            
        }
        return abort(403, 'Unauthorized action.');
    }
}