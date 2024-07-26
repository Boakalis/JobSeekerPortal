<div>

    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Job Profiles</h5>
                <div class="table-responsive">

                    <!--[if BLOCK]><![endif]--><?php if(count($data) >0 ): ?>
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
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center">
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"><?php echo e($key + 1); ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1"><?php echo e($user->name); ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1"><?php echo e($user->email); ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1"><?php echo e($user->phone); ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1"><?php echo e($user->exp); ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <img src="<?php echo e(asset('/storage/' . $user->photo)); ?>" class="img-fluid"
                                                alt="">
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="<?php echo e(route('admin.get.resume',$user->id)); ?>"
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
                                                wire:click="loadUserData(<?php echo e($user->id); ?>)">View</button>
                                            <button class="btn btn-sm fs-1 btn-danger"     wire:click="delete(<?php echo e($user->id); ?>)"
                                            wire:confirm="Are you sure you want to delete this post?" >Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                            </tbody>
                        </table>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="userModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo e(@$userData->name ?? 'User'); ?> Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <img class="img-fluid mb-4" style="width:30%;height:auto" src="<?php echo e(asset('/storage/'.@$userData->photo)); ?>" alt="photo">
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
                                <p><?php echo e(@$userData->name); ?></p>
                                <p><?php echo e(@$userData->email); ?></p>
                                <p><?php echo e(@$userData->phone); ?></p>
                                <p><?php echo e(@$userData->exp); ?></p>
                                <p><?php echo e(@$userData->locationData->name); ?></p>
                                <p><?php echo e(@$userData->notice_period); ?></p>
                                <p><?php echo e(@$userData->skills); ?></p>
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
    <?php $__env->startPush('scripts'); ?>
        <script>
            Livewire.on('loadUserData', function() {
                $('#userModal').modal('show')
            })
        </script>
    <?php $__env->stopPush(); ?>
<?php /**PATH D:\xsmpdd\htdocs\JobSeekerPortal\resources\views/livewire/admin/job-list.blade.php ENDPATH**/ ?>