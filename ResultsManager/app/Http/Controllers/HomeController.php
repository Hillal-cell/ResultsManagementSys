<?php

namespace App\Http\Controllers;
use App\Models\Mark;
use App\Models\Student;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $totalStudents = Student::count();

        // Retrieve all students from the database
        $students = Student::all();
        

       
    // Extracting subject names from the database table
    $subjectNames = ['english', 'science', 'maths', 'sst'];

   
    
    // Extracting marks for each subject
$subjectMarks = $students->map(function ($student) use ($subjectNames) {
    return collect($subjectNames)->map(function ($subject) use ($student) {
        return $student->$subject;
    });
});

        return view('dashboard', compact('students', 'totalStudents', 'subjectNames', 'subjectMarks'));
    }
}
