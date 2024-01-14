<div class="card w-100">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Consulter une catégorie</h5>
        </div>
        <!-- Flash message section -->
        <?php include './views/components/flashMsg.php'; ?>
        <!-- Form -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php if ($categorie) : ?>
                        <form>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" value="<?= $categorie->getNom(); ?>" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" class="form-control" id="code" name="code" value="<?= $categorie->getCode(); ?>" disabled readonly>
                            </div>
                            <a href="index.php?page=categories&action=edit&id=<?= $categorie->getId(); ?>" class="btn btn-warning">Modifier</a>
                            <a href="index.php?page=categories&action=delete&id=<?= $categorie->getId(); ?>" class="btn btn-danger">Supprimer</a>
                        </form>
                    <?php else : ?>
                        <p>Le categorie n'a pas été trouvée.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>