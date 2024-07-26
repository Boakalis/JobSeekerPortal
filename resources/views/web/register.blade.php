@extends('layouts.auth')
@section('title')
    Sign up for free to join our team
@endsection
@section('content')
    <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name" aria-describedby="name">
            @error('name')
                <small class="text-danger">{{ @$errors->first('name') }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}" aria-describedby="email">
            @error('email')
                <small class="text-danger">{{ @$errors->first('email') }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Mobile Number</label>
            <input type="number" class="form-control" id="phone" name="phone" value="{{old('phone')}}" aria-describedby="phone">
            @error('phone')
                <small class="text-danger">{{ @$errors->first('phone') }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exp" class="form-label">Experience (in Years)</label>
            <input type="number" class="form-control" name="exp" id="exp" aria-describedby="exp" value="{{old('exp')}}" >
            @error('exp')
                <small class="text-danger">{{ @$errors->first('exp') }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="notice_period" class="form-label">Notice Period (in Days)</label>
            <input type="number" name="notice_period" class="form-control" id="notice_period" value="{{old('notice_period')}}"
                aria-describedby="notice_period">
            @error('notice_period')
                <small class="text-danger">{{ @$errors->first('notice_period') }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Select Location</label>
            <select name="location" class="form-control" id="">
                @foreach ($locations as $location)
                    <option value="{{$location->id}}">{{$location->name}}</option>
                @endforeach
            </select>
            @error('location')
                <small class="text-danger">{{ @$errors->first('location') }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="skills" class="form-label">Skills</label>
            <input type="text" name="skills" class="form-control" id="skills" aria-describedby="skills" value="{{old('skills')}}">
            {{-- <textarea name="skills"  class="form-control" id="skills" aria-describedby="skills">
            </textarea>
            <small><span class="text-danger">*</span>Mention one skill per line</small> --}}
            @error('skills')
                <small class="text-danger">{{ @$errors->first('skills') }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="resume" class="form-label">Resume</label>
            <input type="file" class="form-control" id="resume" aria-describedby="resume" name="resume" ">
            @error('resume')
                <small class="text-danger">{{ @$errors->first('resume') }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="photo" aria-describedby="photo" name="photo">
            @error('photo')
                <small class="text-danger">{{ @$errors->first('photo') }}</small>
            @enderror
        </div>


        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
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
        <button type="submmit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
            <a class="text-primary fw-bold ms-2" href="{{ route('login.index') }}">Sign In</a>
        </div>
    </form>
@endsection
