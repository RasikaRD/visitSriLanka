@extends('layouts.layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Beautiful Locations near to {{ $location }}</h4>
                    </div>
                    <div class="row mb-3 mt-2 ml-3 justify-content-center">
                        <div class="col-md-10">
                            <div class="card-body">
                                <strong class="text  mt-2">{!! nl2br($responses) !!}</strong>
                            </div>
                         
                        </div>
                        <div class="row col-3 mt-5 justify-content-center">
                            <a class="btn btn-primary"   type="button" style="text-decoration: none;"
                            href="/">{{ __('Back') }}</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
