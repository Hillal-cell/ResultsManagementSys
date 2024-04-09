<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

use Illuminate\Support\Facades\Log;

class StudentsController extends Controller
{
    


   public function upload(Request $request)
    {
        // Get file
        
        $upload = $request->file('upload-file');
        $filePath = $upload->getRealPath();
        
        
        // Open and read the file
        $file = fopen($filePath, 'r');
            
       

        // Read the CSV header
        $csvHeader = fgetcsv($file);

        // Generate a column mapping based on case-insensitive CSV headers
        $columnMapping = $this->generateColumnMapping($csvHeader);

        // Loop through the columns
        while ($columns = fgetcsv($file)) {
            if ($columns[0] == "") {
                continue;
            }

            // Create an associative array by combining column mapping with CSV values
            $data = array_combine($columnMapping, $columns);

            // Create a new Student instance
            $student = new Student();

            // Set the member attributes from the CSV data
            $student->name = $data['name'];
            $student->english = $data['english'];
            $student->sst = $data['sst'];
            $student->science = $data['science'];
            $student->maths = $data['maths'];
           

            // Save the stundent record
            $student->save();
        }

        fclose($file);

        // Redirect or display a success message
        return redirect()->route('pages.icons')->with('success', 'Students uploaded successfully.');
    }

    private function generateColumnMapping($csvHeaders)
    {
        $tableColumns = [
            'name', 'english', 'sst', 'maths', 'science'
        ]; 

        $mapping = [];
        foreach ($csvHeaders as $csvHeader) {
            $csvHeaderLower = strtolower($csvHeader);
            foreach ($tableColumns as $tableColumn) {
                if (strpos($csvHeaderLower, strtolower($tableColumn)) !== false) {
                    $mapping[] = $tableColumn;
                    break;
                }
            }
        }

        return $mapping;
    }









}
