<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Image;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $doctors = User::role('doctor')->with('doctor')->get();
        $specialization = Specialization::all();
        return view('admin.doctor.index')
            ->with('doctors', $doctors)
            ->with('specialization', $specialization);
    }

    public function create()
    {
        $specialization = Specialization::all();
        return view('admin.doctor.create')
            ->with('specialization', $specialization);
    }

    public function store(Request $request)
    {
        $userData = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'salutation' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:13', 'unique:users'],
            'gender' => ['required', 'in:M,F,T'],
            'password' => ['required', 'string'],
            'dob' => 'date_format:Y-m-d|before:today',
            'practicing_from' => 'date_format:Y-m-d|before:today',
            'specialization_id' => ['required', 'integer'],
            'image' => 'mimes:jpeg,jpg,png|max:10000|nullable',
            'professional_statement' => ['string', 'max:255'],
            'bio' => ['string', 'max:255'],
            'address' => ['required', 'string'],
            'fee' => ['required', 'integer'],
            'is_active' => ['required', 'boolean'],
            'is_verified' => ['required', 'boolean'],
        ]);

        $docData['salutation'] = $userData['salutation'];
        $docData['practicing_from'] = $userData['practicing_from'];
        $docData['fee'] = $userData['fee'];
        $docData['professional_statement'] = $userData['professional_statement'];
        $docData['specialization_id'] = $userData['specialization_id'];

        unset($userData['salutation']);
        unset($userData['practicing_from']);
        unset($userData['fee']);
        unset($userData['professional_statement']);
        unset($userData['specialization_id']);

        //store image
        if ($request->image) {
            $imageName = $userData['username'].''.time().'.'.$request->image->extension();
            $imagePath = 'profile/'.$imageName;
            $imageFullPath = 'app/public/images/'.$imagePath;
            uploadImage($request->image, $imageFullPath);
            $userData['image'] = $imagePath;
        }

        $userData['password'] = Hash::make($userData['password']);

        $user = User::create($userData);
        $user->assignRole(Role::findByName('doctor'));

        $docData['user_id'] = $user->id;

        Doctor::create($docData);

        return redirect()->route('admin.doctor.show', $user->id);
    }

    public function show($id)
    {
        $doctor = User::find($id);
        return view('admin.doctor.show')
            ->with('doctor', $doctor);
    }

    public function update(Request $request, $id)
    {
        $userData = $request->validate([
            'salutation' => ['string', 'max:255'],
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'password' => ['string', 'min:8', 'nullable'],
            'specialization_id' => ['required', 'integer'],
            'image' => 'mimes:jpeg,jpg,png|max:10000|nullable',
            'dob' => 'date_format:Y-m-d|before:today',
            'practicing_from' => 'date_format:Y-m-d|before:today',
            'professional_statement' => ['string', 'max:255'],
            'bio' => ['string', 'max:255'],
            'address' => ['string'],
            'fee' => ['integer'],
            'is_active' => ['boolean'],
            'is_verified' => ['boolean'],
        ]);

        if($userData['password']) {
            $userData['password'] = Hash::make($userData['password']);
        }

        $userData = array_filter($userData, 'strlen');

        $docData['salutation'] = $userData['salutation'];
        $docData['practicing_from'] = $userData['practicing_from'];
        $docData['fee'] = $userData['fee'];
        $docData['professional_statement'] = $userData['professional_statement'];
        $docData['specialization_id'] = $userData['specialization_id'];

        unset($userData['salutation']);
        unset($userData['practicing_from']);
        unset($userData['fee']);
        unset($userData['professional_statement']);
        unset($userData['specialization_id']);

        $doctor = User::find($id);

        if($request->image) {
            $imageName = $doctor->username.''.time().'.'.$request->image->extension();
            $imagePath = 'profile/'.$imageName;
            $imageFullPath = 'app/public/images/'.$imagePath;
            uploadImage($request->image, $imageFullPath);
            $userData['image'] = $imagePath;
        }

        $doctor->update($userData);
        $doctor->doctor->update($docData);

        return redirect()->route('admin.doctor.show', $doctor->id);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->doctor->delete();
        $user->delete();
        return back();
    }
}
