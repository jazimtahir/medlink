<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile() {
        $user = auth()->user();
        $user->rating = (int) $user->reviews_to_me()->avg('rating');
        $specialization = Specialization::all();

        return view('profile.index')
            ->with('user', $user)
            ->with('specialization', $specialization);
    }

    public function updateProfile(Request $request) {
        $userData = $request->validate([
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'password' => ['string', 'min:8', 'nullable'],
            'image' => 'mimes:jpeg,jpg,png|max:10000|nullable',
            'address' => ['string', 'nullable'],
            'bio' => ['string', 'nullable'],
            'dob' => 'date_format:Y-m-d|before:today',
            'professional_statement' => ['string', 'max:255', 'nullable'],
            'specialization_id' => ['integer'],
            'fee' => ['integer'],
            'salutation' => ['string', 'max:255'],
        ]);

        $user = auth()->user();

        if($userData['password']) {
            $userData['password'] = Hash::make($userData['password']);
        }

        $userData = array_filter($userData, 'strlen');

        if($user->roles->pluck('name')[0] == 'doctor') {
            $docData['professional_statement'] = $userData['professional_statement'] ?? "";
            $docData['specialization_id'] = $userData['specialization_id'] ?? "";
            $docData['fee'] = $userData['fee'] ?? "";
            $docData['salutation'] = $userData['salutation'] ?? "";
            $user->doctor->update($docData);
            unset($userData['professional_statement']);
            unset($userData['specialization_id']);
            unset($userData['fee']);
            unset($userData['salutation']);
        }

        if(isset($userData['image'])) {
            $imageName = $user->username.''.time().'.'.$request->image->extension();
            $imagePath = 'profile/'.$imageName;
            $imageFullPath = 'app/public/images/'.$imagePath;
            uploadImage($request->image, $imageFullPath);
            $userData['image'] = $imagePath;
        }

        $user->update($userData);

        return redirect()->route('profile');
    }
}
