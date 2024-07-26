@extends('layouts.auth')
@section('title')
    Welcome Administrator !!!
@endsection
@section('content')
    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{@Session::get('error')}}
        </div>
    @endif
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.login.attempt') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
            @error('email')
                <small class="text-danger">{{ @$errors->first('email') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            @error('password')
                <small class="text-danger">{{ @$errors->first('password') }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
    </form>
@endsection
