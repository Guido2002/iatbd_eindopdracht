<!DOCTYPE html>
<html lang="nl">
<head>
    <?php echo $__env->make('components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Mijn Profiel</title>
</head>
<body class="wrapper" id="mijnprofiel">
    <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('components.userchecker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(auth()->user()->blocked ==0): ?>
    <main class="items">
        <div id="myBtn">
            <button class="btn active" onclick="filterSelection('producten')"> Mijn Producten </button>
            <button class="btn" onclick="filterSelection('leen')"> Geleende producten</button>
            <button class="btn" onclick="filterSelection('reviews')"> Reviews</button>
            <button class="btn" onclick="filterSelection('verzoeken')"> Verzoeken </button>
        </div>
        <section class="filter producten">
            <section class="mijnproducten">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->id_lender == $login_user): ?>
                    <section class="item_card item_profiel">
                        <figure><img class="item_img" src="<?php echo e($item->image); ?>" alt="$item->item_name"></figure>
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
        </section>
        <section class="filter leen">
            <section class="mijnproducten">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->id_borrower == $login_user): ?>
                    <section class="item_card item_profiel">
                        <figure><img class="item_img" src="<?php echo e($item->image); ?>" alt="<?php echo e($item->item_name); ?>"></figure>
                        <h2><?php echo e($item->item_name); ?></h2>
                        <div class="text">
                            <p>Categorie: <?php echo e($item->kind); ?></p>
                            <p>Hoeveel dagen leenbaar: <?php echo e($item->time_loaned); ?></p>
                        </div>
                        <a  href="/item/<?php echo e($item->id); ?>"> Bekijk dit product!</a>
                    </section>
                    <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </section>
        </section>
        <section class="filter reviews">

            <section class="mijnreviews">
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($review->reader == $login_user): ?>
                <div class="mijnreview">
                    <p><?php echo e($review->review); ?></p>
                    <p>Cijfer: <?php echo e($review->cijfer); ?></p>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($review->writer == $user->id): ?>
                            <p>Geschreven door <?php echo e($user->name); ?></p>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </section>
        </section>
        <section class="filter verzoeken">
            <section class="mijnreviews">
                    <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($request->reader == $login_user && $request->confirmed == 0): ?>
                        <div class="mijnreview">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($request->user_id == $user->id): ?>
                                    <p>Verzoek door <?php echo e($user->name); ?></p>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($request->item_id == $item->id): ?>
                                    <p>Voor product <?php echo e($item->item_name); ?></p>
                                    <a id="accept" href="/geleend/<?php echo e($item->id_lender); ?>&<?php echo e($item->id); ?>&<?php echo e($request->id); ?>">V</a>
                                    <a id="decline" href="/delete/request&<?php echo e($request->id); ?>">X</a>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </section>
        </section>
    </main>
    <?php endif; ?>
    <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php echo $__env->make("components.jsmijnprofiel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /home/guidoduif/iatbd_eindopdracht/iatbd_eindopdracht/iatbd_eindopdracht/resources/views/mijnprofiel.blade.php ENDPATH**/ ?>