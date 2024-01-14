<div class="card w-100">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Consulter un licencié</h5>
        </div>
        <!-- Flash message section -->
        <?php include './views/components/flashMsg.php'; ?>
        <!-- Form -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="num_licence" class="form-label">Numéro de licence :</label>
                            <input type="number" class="form-control" id="num_licence" name="num_licence" aria-describedby="emailHelp" value="<?= $licencie->getNumLicence(); ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" value="<?= $licencie->getNom(); ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="emailHelp" value="<?= $licencie->getPrenom(); ?>" disabled readonly>
                        </div>
                        <div class="mb-3">
                            <label for="id_categorie" class="form-label">Catégorie</label>
                            <select class="form-control" id="id_categorie" name="id_categorie" disabled readonly>
                                <?php foreach ($categories as $categorie) : ?>
                                    <option value="<?= $categorie->getId() ?>" <?php if ($categorie->getId() == $licencie->getIdCategorie()) echo "selected"; ?>>
                                        <?= $categorie->getNom() ?>
                                    </option>
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