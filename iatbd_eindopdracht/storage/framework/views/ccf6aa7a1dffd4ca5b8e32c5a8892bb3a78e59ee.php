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
            <h1>Product verwijderen</h1>
            <form action="/deleted" method="POST">
                <?php echo csrf_field(); ?>

                <div class="txt_field">
                    <label for="item">Product:</label>
                <select name="item" id="item" required>
                    <?php if(auth()->user()->role == "admin"): ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->item_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php elseif(auth()->user()->role == "user"): ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(auth()->user()->id == $item->id_lender): ?>
                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->item_name); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
                </div>


                <button class="btn_Card" type="submit">Verwijderen</button>
        </section>
    </main>
    <?php endif; ?>
    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /home/guidoduif/iatbd_eindopdracht/iatbd_eindopdracht/iatbd_eindopdracht/resources/views/delete.blade.php ENDPATH**/ ?>