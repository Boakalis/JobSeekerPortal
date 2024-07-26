<div>

    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Job Profiles</h5>
                <div class="table-responsive">

                    @if (count($data) >0 )
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4 text-center">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">S.No</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Email</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Phone</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Experience</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Photo</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Resume</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $user)
                                    <tr class="text-center">
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">{{ $key + 1 }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{ $user->name }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{ $user->email }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{ $user->phone }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{ $user->exp }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <img src="{{ asset('/storage/' . $user->photo) }}" class="img-fluid"
                                                alt="">
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{route('admin.get.resume',$user->id)}}"
                                                    class="badge text-light bg-success fs-1 rounded-3 fw-semibold d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="15"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                        <path d="M7 11l5 5l5 -5" />
                                                        <path d="M12 4l0 12" />
                                                    </svg>

                                                    Download</a>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <button class="btn btn-sm fs-1 btn-primary"
                                                wire:click="loadUserData({{ $user->id }})">View</button>
                                            <button class="btn btn-sm fs-1 btn-danger"     wire:click="delete({{$user->id}})"
                                            wire:confirm="Are you sure you want to delete this post?" >Delete</button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="userModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">{{@$userData->name ?? 'User'}} Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <img class="img-fluid mb-4" style="width:30%;height:auto" src="{{asset('/storage/'.@$userData->photo)}}" alt="photo">
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p>Name:</p>
                                <p>Email:</p>
                                <p>Phone:</p>
                                <p>Experience:</p>
                                <p>Location:</p>
                                <p>Notice Period:</p>
                                <p>Skills:</p>
                            </div>
                            <div class="col-8">
                                <p>{{@$userData->name}}</p>
                                <p>{{@$userData->email}}</p>
                                <p>{{@$userData->phone}}</p>
                                <p>{{@$userData->exp}}</p>
                                <p>{{@$userData->locationData->name}}</p>
                                <p>{{@$userData->notice_period}}</p>
                                <p>{{@$userData->skills}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            Livewire.on('loadUserData', function() {
                $('#userModal').modal('show')
            })
        </script>
    @endpush
