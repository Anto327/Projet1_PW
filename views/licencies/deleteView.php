<div class="card w-100">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Supprimer un licencié</h5>
        </div>
        <!-- Flash message section -->
        <?php include './views/components/flashMsg.php'; ?>
        <!-- Form -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <?php if ($licencie) : ?>
                        <p>Voulez-vous vraiment supprimer le licencié <strong>"<?= $licencie->getNomComplet(); ?>"</strong> ?</p>
                        <form action="index.php?page=licencies&action=delete&id=<?= $licencie->getId(); ?>" method="post">
                            <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                            <a href="index.php?page=licencies" class="btn btn-dark">Non, revenir</a>
                        </form>
                    <?php else : ?>
                        <p>Le licencié n'a pas été trouvé.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>