<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index() {
        $specializations = Specialization::all();
        return view('admin.specialization.index')
            ->with('specializations', $specializations);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => ['string', 'max:255', 'unique:specializations'],
            'alias' => ['string', 'max:255', 'nullable'],
        ]);

        Specialization::create($data);
        $specializations = Specialization::all();
        return back()
            ->with('specializations', $specializations)
            ->with('message', 'Specialization Added Successfully!');
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'name' => ['string', 'max:255', 'unique:specializations'],
            'alias' => ['string', 'max:255', 'nullable'],
        ]);

        Specialization::find($id)->update($data);
        return back()->with('message', 'Specialization Updated Successfully!');
    }

    public function destroy($id)
    {
        $specialization = Specialization::find($id);
        if($specialization->doctors->count()) {
            return back()->withErrors(['message' => 'Specialization already attached to Doctor']);
        }
        $specialization->delete();
        return back()->with('message', 'Specialization Deleted Successfully!');
    }
}
