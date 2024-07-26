@extends('layouts.auth')
@section('title')
    Change Password
@endsection
@section('content')
    <div class="container-fluid my-2 px-0 d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" style="width: 60px" class="btn  btn-sm btn-primary d-flex my-2"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l14 0" />
                <path d="M5 12l6 6" />
                <path d="M5 12l6 -6" />
            </svg> Back</a>
    </div>
    <form action="{{ route('password.change') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="password" class="form-label">Old Password</label>
            <input type="password" name="oldpassword" class="form-control" id="oldpassword">
            @error('oldpassword')
                <small class="text-danger">{{ @$errors->first('oldpassword') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">New Password</label>
            <input type="password" name="password" class="form-control" id="password">
            @error('password')
                <small class="text-danger">{{ @$errors->first('password') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" id="cpassword">
            @error('cpassword')
                <small class="text-danger">{{ @$errors->first('cpassword') }}</small>
            @enderror
        </div>
        <button type="submmit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Update Password</button>

    </form>
@endsection
