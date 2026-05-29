<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\student;
use Illuminate\Http\Request;
use App\Models\Schoolclass;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        $classes=Schoolclass::all();
        return view('register', compact('classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'IC'      => 'required|string|unique:student,IC', 
            'Name'    => 'required|string|max:255',
            'Contact' => 'required|string|max:20',
            'class'   => 'required|string|max:100',
        ]);

        student::create($validated);
        return redirect('portal')->with('success', 'Registration successful!');
    }

    public function update(Request $request, string $id)
    {
        $attendance = student::findOrFail($id);

        $attendance->status = $request->input('status');
        $attendance->save();
        return redirect()->back()->with('success', 'Data updated!');
    }

    public function destroy($id)
    {
        $attendance = student::findOrFail($id);
        $attendance->delete();

        return redirect()->back()->with('success', 'Data deleted!');
    }
}

