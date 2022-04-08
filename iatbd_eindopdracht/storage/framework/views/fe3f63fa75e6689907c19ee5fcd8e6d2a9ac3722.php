<!DOCTYPE html>
<html lang="nl">
<head>
    <?php echo $__env->make('components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Recensie schrijven</title>
</head>
<body class="wrapper">
    <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(auth()->user()->blocked == 1): ?>
    <p>U bent geblokkeerd door de beheerder</p>
    <a href="/logout">Terug naar inlogpagina</a>
    <?php else: ?>
    <main>
        <section class="center center_review recensie">
            <h1>Recensie schrijven</h1>
            <form action="/items/<?php echo e($userId); ?>&<?php echo e($itemId); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="txt_field">
                    <label for="cijfer"> Cijfer: </label>
                    <input name="cijfer" id="cijfer" type="number" min="1" max="10" required>
                </div>

                <div class="txt_field">
                    <label for="review"> Bericht: </label>
                    <input name="review" id="review" type="text" required>
                </div>

                <button class="btn_Card" type="submit">Recensie versturen</button>
        </section>
    </main>
    <?php endif; ?>
    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /home/guidoduif/iatbd_eindopdracht/iatbd_eindopdracht/iatbd_eindopdracht/resources/views/review.blade.php ENDPATH**/ ?>