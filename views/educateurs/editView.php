<div class="card w-100">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Modifier un éducateur</h5>
        </div>
        <!-- Flash message section -->
        <?php include './views/components/flashMsg.php'; ?>
        <!-- Form -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php if ($educateur) : ?>
                        <form action="index.php?page=educateurs&action=update&id=<?= $educateur->getId() ?>" method="post">
                            <div class="mb-3">
                                <label for="num_licence" class="form-label">Numéro de licence :</label>
                                <input type="number" class="form-control" id="num_licence" name="num_licence" value="<?= $educateur->getNumLicence() ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?= $educateur->getNom() ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $educateur->getPrenom() ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_categorie" class="form-label">Catégorie</label>
                                <select class="form-control" id="id_categorie" name="id_categorie" required>
                                    <option value="">-- Choisir une catégorie --</option>
                                    <?php foreach ($categories as $categorie) : ?>
                                        <?php if ($categorie->getId() != 1) : ?>
                                            <option value="<?= $categorie->getId() ?>" <?php if ($categorie->getId() == $educateur->getIdCategorie()) echo "selected" ?>><?= $categorie->getNom() ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $educateur->getEmail() ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe (seulement si vous voulez changer de mot de passe)</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" <?php if ($educateur->isAdmin()) echo "checked"; ?>>
                                    <label class="form-check-label" for="is_admin">
                                        Accès admin
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Modifier</button>
                            <a href="index.php?page=educateurs" class="btn btn-dark">Revenir</a>
                        </form>
                    <?php else : ?>
                        <p>Le educateur n'a pas été trouvé.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>