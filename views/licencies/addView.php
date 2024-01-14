<div class="card w-100">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Ajouter un licencié</h5>
        </div>
        <!-- Flash message section -->
        <?php include './views/components/flashMsg.php'; ?>
        <!-- Form -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="index.php?page=licencies&action=create" method="post">
                        <div class="mb-3">
                            <label for="num_licence" class="form-label">Numéro de licence :</label>
                            <input type="number" class="form-control" id="num_licence" name="num_licence" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_categorie" class="form-label">Catégorie</label>
                            <select class="form-control" id="id_categorie" name="id_categorie" required>
                                <option value="">-- Choisir une catégorie --</option>
                                <?php foreach ($categories as $categorie) : ?>
                                    <option value="<?= $categorie->getId() ?>"><?= $categorie->getNom() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Ajouter</button>
                        <a href="index.php?page=licencies" class="btn btn-dark">Revenir</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>