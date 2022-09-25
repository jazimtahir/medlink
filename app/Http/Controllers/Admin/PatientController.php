<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $patients = User::role('patient')->with('patient')->paginate(10);
        return view('admin.patient.index')
            ->with('patients', $patients);
    }

    public function create()
    {
        return view('admin.patient.create');
    }

    public function store(Request $request)
    {
        $userData = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:13', 'unique:users'],
            'gender' => ['required', 'in:M,F,T'],
            'password' => ['required', 'string'],
            'dob' => 'date_format:Y-m-d|before:today',
            'image' => 'mimes:jpeg,jpg,png|max:10000|nullable',
            'is_active' => ['required', 'boolean'],
            'is_verified' => ['required', 'boolean'],
        ]);

        //store image
        if ($request->image) {
            $imageName = $userData['username'].''.time().'.'.$request->image->extension();
            $imagePath = 'profile/'.$imageName;
            $request->image->storeAs('public/images', $imagePath);
            $userData['image'] = $imagePath;
        }

        $userData['password'] = Hash::make($userData['password']);

        $user = User::create($userData);
        $user->assignRole(Role::findByName('patient'));

        $patData['user_id'] = $user->id;

        Patient::create($patData);

        return view('admin.patient.show')->with('patient', $user);
    }

    public function show($id)
    {
        $patient = User::find($id);
        return view('admin.patient.show')
            ->with('patient', $patient);
    }

    public function update(Request $request, $id)
    {
        $userData = $request->validate([
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'password' => ['string', 'min:8', 'nullable'],
            'image' => 'mimes:jpeg,jpg,png|max:10000|nullable',
            'dob' => 'date_format:Y-m-d|before:today',
            'bio' => ['string', 'max:255'],
            'is_active' => ['boolean'],
            'is_verified' => ['boolean'],
        ]);

        if($userData['password']) {
            $userData['password'] = Hash::make($userData['password']);
        }

        $userData = array_filter($userData, 'strlen');

        $patient = User::find($id);

        //store image
        if ($request->image) {
            $imageName = $patient->username.''.time().'.'.$request->image->extension();
            $imagePath = 'profile/'.$imageName;
            $request->image->storeAs('public/images', $imagePath);
            $userData['image'] = $imagePath;
        }

        $patient->update($userData);

        return redirect()->route('admin.patient.show', $patient->id);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->patient->delete();
        $user->delete();
        return back();
    }
}
