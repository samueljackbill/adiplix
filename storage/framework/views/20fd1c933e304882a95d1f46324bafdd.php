<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>

    <title>ADIPLIX</title>
</head>
<body>

    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="<?php echo e(route('user.index')); ?>" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="<?php echo e(route('user.index')); ?>" class="nav-link px-2 text-white">Pessoas</a></li>
                    <li><a href="<?php echo e(route('task.index')); ?>" class="nav-link px-2 text-white">Tarefas</a></li>
                </ul>

                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2" disabled>Login</button>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\crud-laravel\resources\views/layouts/admin.blade.php ENDPATH**/ ?>