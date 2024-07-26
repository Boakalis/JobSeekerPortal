<?php

namespace App\Livewire\Admin;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class JobList extends Component
{

    public $data ,$userData;

    public function mount(){
        $this->data = User::get();
    }

    public function loadUserData($id){
        $this->userData = User::with('locationData')->find($id);
        $this->dispatch('loadUserData');
    }

    public function delete($id){
        $data = User::where('id',$id)->first();
        Storage::delete(Resume::where('user_id', $id)->first()->resume);
        Storage::delete($data->photo);
        $data->delete();
    }

    public function render()
    {
        return view('livewire.admin.job-list')->extends('layouts.admin.master')->section('content');
    }
}
