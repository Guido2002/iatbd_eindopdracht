<!DOCTYPE html>
<html lang="nl">
<head>
    <?php echo $__env->make('components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Time2Share</title>
</head>
<body class="wrapper" >
    <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(auth()->user()->blocked == 1): ?>
        <p>U bent geblokkeerd door de beheerder</p>
        <a href="/logout">Terug naar inlogpagina</a>
    <?php else: ?>
    <main class="items example">
        <div id="myBtn">
            <button class="btn active" onclick="filterSelection('all')"> Alle items</button>
            <button class="btn" onclick="filterSelection('cassette')"> Cassette </button>
            <button class="btn" onclick="filterSelection('toetsenborden')"> Toetsenborden</button>
            <button class="btn" onclick="filterSelection('kinderspeelgoed')"> Kinderspeelgoed</button>
            <button class="btn" onclick="filterSelection('games')"> Games </button>
        </div>
        <section class="mijnproducten">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($login_user != $item->id_lender && $item->loaned == 0 || $login_user == $item->id_borrower && $item->loaned == 0): ?>
            <section class="item_card filterDiv <?php echo e($item->kind); ?>">
                <figure class="figure_img"><img class="item_img" src="<?php echo e($item->image); ?>" alt="<?php echo e($item->item_name); ?>"></figure>
                    <h2><?php echo e($item->item_name); ?></h2>
                    <div class="text">
                        <p>Categorie: <?php echo e($item->kind); ?></p>
                        <p>Hoeveel dagen leenbaar: <?php echo e($item->time_loaned); ?></p>
                    </div>
                <a href="/item/<?php echo e($item->id); ?>"> Bekijk dit product!</a>
            </section>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>
    </main>
    <?php endif; ?>
    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php echo $__env->make("components.jsfrontpage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/guidoduif/iatbd_eindopdracht/iatbd_eindopdracht/iatbd_eindopdracht/resources/views/frontpage.blade.php ENDPATH**/ ?>