<!DOCTYPE html>
<html lang="nl">
<head>
    <?php echo $__env->make('components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Time2Share</title>
</head>
<body class="wrapper">
    <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(auth()->user()->blocked == 1): ?>
    <p>U bent geblokkeerd door de beheerder</p>
    <a href="/logout">Terug naar inlogpagina</a>
    <?php else: ?>
    <main>
        <section class="center">
            <h1>Aanmaken van product</h1>
            <form action="/items" method="POST">
                <?php echo csrf_field(); ?>
                <div class="txt_field">
                    <label for="name" id="lb"> Naam: </label>
                    <input name="name" id="name" type="text" placeholder="Vul hier productnaam in" required>
                </div>

                <div class="txt_field">
                    <label for="kind">Soort: </label>
                <select name="kind" id="kind" required>
                    <?php $__currentLoopData = $kind_of_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kind_of_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($kind_of_item->kind); ?>"><?php echo e($kind_of_item->kind); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>

                <div class="txt_field">
                    <label for="description"> Omschrijving: </label>
                    <input name="description" id="description" placeholder="Vul hier de omschrijving in" type="text" required>
                </div>

                <div class="txt_field">
                    <label for="image"> Afbeelding: </label>
                <select name="image" id="image" required>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->image); ?>"><?php echo e($item->image); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>

                <div class="txt_field">
                    <label for="leentijd"> Leentijd in dagen: </label>
                    <input name="leentijd" id="leentijd" type="number" min="1" max="365" required>
                </div>

                <button class="btn_Card" type="submit">Product aanmaken</button>
        </section>
    </main>
    <?php endif; ?>
    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /home/guidoduif/iatbd_eindopdracht/iatbd_eindopdracht/iatbd_eindopdracht/resources/views/create.blade.php ENDPATH**/ ?>