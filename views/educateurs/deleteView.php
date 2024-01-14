<div class="card w-100">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Supprimer un éducateur</h5>
        </div>
        <!-- Flash message section -->
        <?php include './views/components/flashMsg.php'; ?>
        <!-- Form -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php if ($educateur) : ?>
                        <p>Voulez-vous vraiment supprimer le éducateur <strong>"<?= $educateur->getNomComplet(); ?>"</strong> ?</p>
                        <form action="index.php?page=educateurs&action=delete&id=<?= $educateur->getId(); ?>" method="post">
                            <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                            <a href="index.php?page=educateurs" class="btn btn-dark">Non, revenir</a>
                        </form>
                    <?php else : ?>
                        <p>L'éducateur n'a pas été trouvé.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>