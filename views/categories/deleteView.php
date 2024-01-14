<div class="card w-100">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Supprimer une catégorie</h5>
        </div>
        <!-- Flash message section -->
        <?php include './views/components/flashMsg.php'; ?>
        <!-- Form -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <?php if ($categorie) : ?>
                        <p>Voulez-vous vraiment supprimer la catégorie <strong>"<?= $categorie->getNom(); ?>"</strong> ?</p>
                        <form action="index.php?page=categories&action=delete&id=<?= $categorie->getId(); ?>" method="post">
                            <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                            <a href="index.php?page=categories" class="btn btn-dark">Non, revenir</a>
                        </form>
                    <?php else : ?>
                        <p>La catégorie n'a pas été trouvée.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>