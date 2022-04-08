<!DOCTYPE html>
<html lang="nl">
<head>
    <?php echo $__env->make('components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Blokkeren</title>
</head>
<body class="wrapper" >
    <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(auth()->user()->blocked == 1): ?>
    <p>U bent geblokkeerd door de beheerder</p>
    <a href="/logout">Terug naar inlogpagina</a>
    <?php else: ?>
    <main>
        <section class="center center_review">
            <h1>Blokkeren</h1>
            <form action="/blocked" method="POST">
                <?php echo csrf_field(); ?>

                <div class="txt_field">
                    <label for="user">Gebruiker:</label>
                <select name="user" id="user" required>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->role != "admin"): ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>


                <button class="btn_Card" type="submit">Blokkeren</button>
        </section>
    </main>
    <?php endif; ?>
    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /home/guidoduif/iatbd_eindopdracht/iatbd_eindopdracht/iatbd_eindopdracht/resources/views/block.blade.php ENDPATH**/ ?>