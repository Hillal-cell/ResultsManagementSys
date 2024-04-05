<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function icons()
    {
        

         // Check if there are any flash messages
        if(session()->has('error')) {
            // Flash error message to the session
            session()->flash('error', session('error'));
        }

        if(session()->has('success')) {
            // Flash success message to the session
            session()->flash('success', session('success'));
        }
    
        // Return view
        return view('pages.results');
    }

    /**
     * Display maps page
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {
        return view('pages.maps');
    }

    /**
     * Display tables page
     *
     * @return \Illuminate\View\View
     */
    public function tables()
    {
        return view('pages.tables');
    }

    /**
     * Display notifications page
     *
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('pages.notifications');
    }

    /**
     * Display rtl page
     *
     * @return \Illuminate\View\View
     */
   public function editResults(Request $request, $id)
    {
        // If the request is a GET request, render the edit form
        if ($request->isMethod('get')) {
            // Retrieve the student record by ID
            $student = Student::find($id);

            // Check if the student record exists
            if (!$student) {
                return redirect()->route('pages.icons')->with('error', 'Student not found.');
            }

            // Return the edit form view with the student data
            return view('pages.edit', compact('student'));
        }

        // If the request is a POST request, handle the form submission
        if ($request->isMethod('post')) {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string',
                'english' => 'required|numeric',
                'maths' => 'required|numeric',
                'science' => 'required|numeric',
                'sst' => 'required|numeric',
            ]);

            // Find the student record by ID
            $student = Student::find($id);

            // Check if the student record exists
            if (!$student) {
                return redirect()->route('pages.icons')->with('error', 'Student not found.');
            }

            // Update the student record with the data from the form fields
            $student->update($validatedData);


             // Log the message that the student record was not updated
            //Log::info('Student record with ID ' . $id . ' was not updated.');

            // Redirect back to the results page with a success message
            return redirect()->route('pages.icons')->with('success', 'Student record updated successfully.');
        }
    }
    /**
     * Display typography page
     *
     * @return \Illuminate\View\View
     */
    public function typography()
    {
        return view('pages.typography');
    }


    /**
     * Display delete page
     *
     * @return \Illuminate\View\View
     */
    public function deleteResults(Request $request,$id)
    {
        

        return view('pages.remove',['id' => $id]);
    }
}
