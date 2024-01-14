<div class="card w-100">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Détails du contact</h5>
        </div>
        <!-- Flash message section -->
        <?php include './views/components/flashMsg.php'; ?>
        <!-- Form -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php if ($contact) : ?>
                        <form>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?= $contact->getNom() ?>" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $contact->getPrenom() ?>" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $contact->getEmail() ?>" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" value="<?= $contact->getTelephone() ?>" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="id_licencie" class="form-label">Licencié</label>
                                <select class="form-control" id="id_licencie" name="id_licencie" disabled readonly>
                                    <?php foreach ($licencies as $licencie) : ?>
                                        <?php if ($licencie->getId() != 1) : ?>
                                            <option value="<?= $licencie->getId() ?>" onclick="fillNameInputs('<?= $licencie->getNom() ?>', '<?= $licencie->getPrenom() ?>');" <?php if ($licencie->getId() == $contact->getIdLicencie()) echo "selected"; ?>>
                                                <?= $licencie->getNomComplet() ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <a href="index.php?page=contacts&action=edit&id=<?= $contact->getId(); ?>" class="btn btn-warning">Modifier</a>
                            <a href="index.php?page=contacts&action=delete&id=<?= $contact->getId(); ?>" class="btn btn-danger">Supprimer</a>
                            <a href="index.php?page=contacts" class="btn btn-dark">Revenir</a>
                        </form>
                    <?php else : ?>
                        <p>Le contact n'a pas été trouvé.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>