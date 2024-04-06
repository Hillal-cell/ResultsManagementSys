@extends('layouts.app',['page'=>_('Create'),'pageSlug'=>'create'])

@section('content')




    <div class="container">

    <h3 style="color:blue">New Student</h3>

    

        <form method="post" action="{{route('pages.store')}}">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">NAME</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                </div>
            </div>        

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ENGLISH</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="english" value="{{old('english')}}">
                </div>
            </div>        

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">SST</label>
                <div class="col-sm-6">
                    <input type="text"  class="form-control" name="sst" value="{{old('sst')}}">
                </div>
            </div>        

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">MATHS</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="maths" value="{{old('maths')}}">
                </div>
            </div>        


             <div class="row mb-3">
                <label class="col-sm-3 col-form-label">SCIENCE</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="science" value="{{old('science')}}">
                </div>
            </div>        

            

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class=" col-sm-3 d-grid">
                    <a type="submit" class="btn btn-outline-primary" href="{{route('pages.icons')}}" role="button" value="">Cancel</a>
                </div>
            </div>        
        
        </form>

    </div>
    

@endsection