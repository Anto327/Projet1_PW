<?php if (isset($_SESSION['flashMsg'])) : ?>
    <div class="alert alert-<?= $_SESSION['flashMsg']['status'] ?>" role="alert">
        <?= $_SESSION['flashMsg']['msg'] ?>
    </div>
    <?php unset($_SESSION['flashMsg']); ?>
<?php endif; ?>