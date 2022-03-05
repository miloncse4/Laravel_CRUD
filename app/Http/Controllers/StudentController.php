<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = DB::table('students')->get();
        $students = Student::all();
        return view('index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'class'=>'required|string',
            'roll'=>'required|numeric|unique:students',
            'address'=>'required|string',
        ]);


        // DB::table('students')->insert([
        //     'name'=>$request->name,
        //     'class_name'=>$request->class,
        //     'roll'=>$request->roll,
        //     'address'=>$request->address,
        // ]);

        $student = new Student();
        $student->name = $request->name;
        $student->class_name = $request->class;
        $student->roll = $request->roll;
        $student->address = $request->address;
        $student->save();

        $request->session()->flash('message', 'student create');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $student = DB::table('students')->find($id);
        $student = Student::findOrFail($id);
        return view('show',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $student = DB::table('students')->find($id);
        $student = Student::findOrFail($id);
        return view('edit',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $request->validate([
            'name'=>'required|string',
            'class'=>'required|string',
            'roll'=>'required|numeric|unique:students,roll,'.$id,
            'address'=>'required|string',
        ]);


        // DB::table('students')->where('id',$id)->update([
        //     'name'=>$request->name,
        //     'class_name'=>$request->class,
        //     'roll'=>$request->roll,
        //     'address'=>$request->address,
        // ]);

        $student = new Student();
        $student->name = $request->name;
        $student->class_name = $request->class;
        $student->roll = $request->roll;
        $student->address = $request->address;
        $student->save();

        $request->session()->flash('message', 'student update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // DB::table('students')->where('id',$id)->delete();
        $student = Student::findOrFail($id);
        $student->delete();
        $request->session()->flash('message', 'student delete');
        return redirect()->back();
    }
}
