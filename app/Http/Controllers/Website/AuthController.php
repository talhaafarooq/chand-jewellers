<?php

namespace App\Http\Controllers\Website;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $repo;

    public function __construct(BaseRepositoryInterface $baseRepo)
    {
        $this->repo = $baseRepo;
    }
    
    public function register(RegisterRequest $request)
    {
        $data = [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone_no'=>$request->phone_no,
            'address'=>$request->address,
            'email_verified_at'=>now(),
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=>RoleEnum::Customer,
        ];
        $user = User::create($data);
        $user->assignRole(RoleEnum::Customer);
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        return redirect()->route('website.home')->with('success','Account created successfully!');
    }
}
