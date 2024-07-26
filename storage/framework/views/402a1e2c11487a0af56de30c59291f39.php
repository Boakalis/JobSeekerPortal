<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Job Seeker Portal</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.min.css')); ?>" />



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Job Seeker Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                <div class="d-flex">
                    <?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('login.index')); ?>" class="btn btn-outline-primary mx-2"    >Login</a>
                        <a href="<?php echo e(route('register.index')); ?>" class="btn btn-outline-success mx-2"    >Register</a>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('profile')); ?>" class="btn btn-outline-success mx-2"    >My Profile</a>
                        <a href="<?php echo e(route('logout')); ?>" class="btn btn-outline-danger"    >Logout</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="bg-light p-5 rounded">
            <h1>Hello <?php echo e(@Auth::user()->name ?? 'Guest'); ?></h1>

            <?php if(auth()->guard()->check()): ?>
                <p class="lead">Your resume is sent to our recruitment team and we will contact you soon!!!</p>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
                <p class="lead">Please Login to proceed further!!!</p>
            <?php endif; ?>


        </div>
    </main>


    <script src="<?php echo e(asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>


</body>

</html>
<?php /**PATH D:\xsmpdd\htdocs\JobSeekerPortal\resources\views/web/home.blade.php ENDPATH**/ ?>
