@extends('layouts.layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text1">Sri Lanka: Explore the Emerald Island </h4>
                        
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('chatgpt.ask') }}">
                        @csrf

                        <div class="row mb-3">
                            
                            <label for="location" class="col-md-4  text-md-end mt-4 text2"><b>{{ __('Destination') }}:</b></label>

                            <div class="col-md-6 mt-4">
                                <input id="location" type="text"
                                    class="form-control" name="location"
                                    value="{{ old('location') }}" required autocomplete="location" autofocus>

                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0 mt-5">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Near To Me') }}
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
