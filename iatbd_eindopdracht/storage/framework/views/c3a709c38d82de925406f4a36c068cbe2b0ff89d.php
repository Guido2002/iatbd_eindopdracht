<!DOCTYPE html>
<html lang="nl">
<head>
    <?php echo $__env->make("components.head", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e($item->item_name); ?></title>
</head>
<body class="wrapper">
    <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(auth()->user()->blocked == 1): ?>
        <p>U bent geblokkeerd door de beheerder</p>
        <a href="/logout">Terug naar inlogpagina</a>
    <?php else: ?>
        <main>
            <h2><?php echo e($item->item_name); ?></h2>
            <section class="item_detail">
                <figure><img src="<?php echo e($item->image); ?>" alt="<?php echo e($item->item_name); ?>"></figure>
            <div class="textbox">
                <p><?php echo e($item->description); ?></p>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->id == $item->id_lender): ?>
                        <p>Aangeboden door: <?php echo e($user->name); ?></p>
                        <p>Contact: <?php echo e($user->email); ?></p>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <p>Categorie: <?php echo e($item->kind); ?></p>
                <p>Dagen leenbaar: <?php echo e($item->time_loaned); ?></p>
                <?php if($item->loaned == 1): ?>
                    <p>Dit item is al uitgeleend!</p>
                <?php else: ?>
                    <p>Dit item is nog niet uitgeleend!</p>
                <?php endif; ?>
            </div>
                <?php if($login_user == $item->id_borrower): ?>
                    <a class="funct show"  href="/review/<?php echo e($item->id_lender); ?>&<?php echo e($item->id); ?>">Retourneer</a>
                <?php elseif($login_user !=  $item->id_lender && $item->loaned == 0): ?>
                    <a class="funct show" href="/geleenditem/<?php echo e($login_user); ?>&<?php echo e($item->id); ?>">Leen product</a>
                <?php endif; ?>
        <?php endif; ?>
    </section>
    </main>
    <?php echo $__env->make("components.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /home/guidoduif/iatbd_eindopdracht/iatbd_eindopdracht/iatbd_eindopdracht/resources/views/item_detail.blade.php ENDPATH**/ ?>