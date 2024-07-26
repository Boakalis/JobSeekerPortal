@extends('layouts.auth')
@section('title')
    Profile Details
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
        <a href="{{ route('change-password.index') }}" class="">Change Password</a>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ @Session::get('success') }}
        </div>
    @endif
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" id="name"
                aria-describedby="name">
            @error('name')
                <small class="text-danger">{{ @$errors->first('name') }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" readonly class="form-control" id="email" value="{{ Auth::user()->email }}"
                aria-describedby="email">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Mobile Number</label>
            <input type="number" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}"
                aria-describedby="phone">
            @error('phone')
                <small class="text-danger">{{ @$errors->first('phone') }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exp" class="form-label">Experience (in Years)</label>
            <input type="number" class="form-control" name="exp" id="exp" aria-describedby="exp"
                value="{{ Auth::user()->exp }}">
            @error('exp')
                <small class="text-danger">{{ @$errors->first('exp') }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="notice_period" class="form-label">Notice Period (in Days)</label>
            <input type="number" name="notice_period" class="form-control" id="notice_period"
                value="{{ Auth::user()->notice_period }}" aria-describedby="notice_period">
            @error('notice_period')
                <small class="text-danger">{{ @$errors->first('notice_period') }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Select Location</label>
            <select name="location" class="form-control" id="">
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}"
                        {{ $location->id == Auth::user()->location_id ? 'selected' : '' }}>
                        {{ $location->name }}</option>
                @endforeach
            </select>
            @error('location')
                <small class="text-danger">{{ @$errors->first('location') }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="skills" class="form-label">Skills</label>
            <input type="text" name="skills" class="form-control" id="skills" aria-describedby="skills"
                value="{{ Auth::user()->skills }}">
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
                        <a href="{{ route('get.resume') }} ">Click to download resume</a>
                        @error('resume')
        <small class="text-danger">{{ @$errors->first('resume') }}</small>
    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" aria-describedby="photo" name="photo">
                        <img class="img-fluid my-2" style="width: 30%;height:auto"  src="{{ asset('storage/' . Auth::user()->photo) }}" alt="ss">
                        @error('photo')
        <small class="text-danger">{{ @$errors->first('photo') }}</small>
    @enderror
                    </div>


                    <button type="submmit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Update Profile</button>
                </form>
@endsection
