<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Order;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class MyAccountController extends Controller
{
    public function index()
    {
        $settings = Settings::select('currency', 'shipping')->first();
        $orders = Order::withCount('orderDetails')->withSum('orderDetails', 'price')->where('user_id', auth()->user()->id)->get();
        return view('website.my-account',compact('settings','orders'));
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        // Update the user's password
        $user = User::findOrFail(auth()->user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();

        // Check if the old password matches
        if(isset($request->old_password))
        {
            $this->validate($request,[
                'old_password' => 'nullable|min:8|max:16', // Add any additional rules for the old password
                'new_password' => 'nullable|min:8|different:old_password|max:16', // Ensure new password is different from the old password
                'confirm_password' => 'nullable|same:new_password', // Ensure confirmation matches the new password
            ]);
            if (!Hash::check($request->input('old_password'), auth()->user()->password)) {
                throw ValidationException::withMessages([
                    'old_password' => ['The provided old password does not match our records.'],
                ]);
            }
            $user->password = Hash::make($request->new_password);
            $user->save();
        }



        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
