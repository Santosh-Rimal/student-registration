<?php

namespace App\Http\Controllers\admin;
use File;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students=Student::get();
        return view('admin.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
         $input=$request->all();
        $input['image']=$this->FileUpload($request,'image');
        Student::create($input);
        return redirect()->route('students.index')->with('success','Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student=Student::get()->where('id',$id)->first();
        return view('admin.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // dd($student);
        return view('admin.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
     $old_image = $student->image;
        $input = $request->all();
        $image = $this->fileUpload($request, 'image');

        if ($image) {
            $this->removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        $student->update($input);
        return redirect()->route('students.index')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
         $this->removeFile($student->image);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Delete Successfully');
    }



     public function FileUpload($request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
        // if ($image = $request->$name) {
            $destinationPath = public_path() . '/assets/admin/img/student';
            $imageName = date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
        }
        return $imageName;
    }

    public function removeFile($file)
    {
        $path = public_path() . '/assets/admin/img/student/' . $file;
        //  dd($path);
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}