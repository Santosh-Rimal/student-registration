<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function approve(string $id)
    {
        $student=Student::find($id);
        if ($student && $student->status === 'pending') {
            // Update the status to approved
            $student->status = 'approved';
            $student->save();
            return redirect()->route('students.index');

        }
    }
     public function reject(string $id)
    {
        $student=Student::find($id);
        if ($student && $student->status === 'pending') {
            // Update the status to approved
            $student->status = 'rejected';
            $student->save();
            return redirect()->route('students.index');
        }
    }
}