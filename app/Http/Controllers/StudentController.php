<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::all();

        if($request->keyword){
            $students = Student::query()
                        ->where('ic','LIKE','%'.$request->keyword.'%')
                        ->paginate(3);
        }else{
            $students =  Student::paginate(10);
        }
        return view('registration.admin.index',compact('students'));
    }

    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'name' => 'required|max:50', //perlu isi, max 50char
            'email' => 'required|unique:students,email|email', //perlu isi, unique->check table students->column email
            'ic' => 'required|min:12|max:12', //perlu isi , min|max 12char
            'username' => 'required|min:5|max:12', //perlu isi, min 5char max 5char
            'password' => 'required|min:5|max:12', //perlu isi, min 5char max 5char
            'address' => 'required', //perlu isi
        ]);

        //store guna mass asignment laravel
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'ic' => $request->ic,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'interest' => $request->interest,
            'class' => $request->class,
        ]);

        //lepas store, return view
        return redirect()->route('create:fee',$student);
    }

    public function show(Request $request,Student $student)
    {
        return view('registration.admin.show',compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'ic' => $request->ic,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('student:index')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Student information has been updated'
        ]);
    }

    public function edit(Request $request,Student $student)
    {
        return view('registration.admin.edit',compact('student'));
    }

    public function approve(Request $request,Student $student)
    {
        $student->update([
            'status' => 'Approved',
        ]);

        return redirect()->route('student:index')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'This student has been approved'
        ]);
    }

    public function reject(Request $request,Student $student)
    {
        $student->update([
            'status' => 'Rejected',
        ]);

        return redirect()->route('student:index')->with([
            'alert-type' => 'alert-danger',
            'alert-message' => 'This student has been rejected'
        ]);
    }

    public function destroy(Request $request, Student $student)
    {
        $student->delete();

        return redirect()->route('student:index')->with([
            'alert-type' => 'alert-danger',
            'alert-message' => 'This student has been deleted'
        ]);
    }
}
