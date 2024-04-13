    @extends('layouts.app')

    @section('content')
        <div class="header py-7 py-lg-8">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <img src="{{asset('resultslogo.png')}}" alt="">
                            <h1></h1>
                            <h1 class="text-white">{{ __('WELCOME') }}</h1>
                            <h1 class="text-white">{{ __('TO') }}</h1>
                            <p class="text-lead text-light">
                            <h1> {{ __('YOUR RESULTS MANAGEMNET SYSTEM.') }}</h1>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
