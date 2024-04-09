@extends('layouts.app', ['page' => __('Edit'), 'pageSlug' => 'edit'])

@section ('content')

<div class="container">
    <h3 style="color:blue">Edit Student Info and Marks</h3>

          @if ($errors->any())
        <div id="error-alert" class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        <script>
            // Automatically close the error alert after 5 seconds
            setTimeout(function () {
                $('#error-alert').fadeOut('slow');
            }, 2000);
        </script>
        @endif

        @php
        $successMessage = session('success');
        // Remove the success message from the session to prevent it from reappearing on page reload
        session()->forget('success');
        @endphp

        @if ($successMessage)
        <div id="success-alert" class="alert alert-success">
            {{ $successMessage }}
        </div>
        <script>
            // Automatically close the success alert after 5 seconds
            setTimeout(function () {
                $('#success-alert').fadeOut('slow');
            }, 2000);
        </script>
        @endif


    <form method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $student->id }}">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">NAME</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="{{ $student->name }}">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">ENGLISH</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="english" value="{{ $student->english }}">
            </div>
        </div>

          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">SST</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="sst" value="{{ $student->sst }}">
            </div>
        </div>


        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">MATHS</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="maths" value="{{ $student->maths }}">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">SCIENCE</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="science" value="{{ $student->science }}">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class=" col-sm-3 d-grid">
                <a href="{{ route('pages.icons') }}" class="btn btn-outline-primary">Cancel</a>
            </div>
        </div>
    </form>
</div>

@endsection




@php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $english = $_POST['english'];
    $maths = $_POST['maths'];
    $science = $_POST['science'];
    $sst = $_POST['sst'];
    

    // Database update logic
    $student = \App\Models\Student::find($id);
    if ($student) {
        $student->name = $name;
        $student->english = $english;
        $student->maths = $maths;
        $student->science = $science;
        $student->sst = $sst;
        $student->save();
        session()->flash('success', 'Student record updated successfully.');
        // Redirect to results page or wherever needed
        return redirect()->route('pages.icons');
    } else {
        session()->flash('error', 'Failed to update student record.');
    }
}
@endphp