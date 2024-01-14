<div class="card w-100">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Educateurs</h5>
            <a class="btn btn-primary m-1" href="index.php?page=licencies&action=add">Ajouter</a>
        </div>
        <div class="table-responsive">
            <?php if (count($educateurs) > 1) : ?>
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">No licence</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nom</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Prenom</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Catégorie</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Email</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Accès admin</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Actions</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($educateurs as $educateur) : ?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?= $educateur->getNumLicence() ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?= $educateur->getNom() ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?= $educateur->getPrenom() ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?= $educateur->getIdCategorie() ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?= $educateur->getEmail() ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">
                                        <?php if ($educateur->isAdmin()) : ?>
                                            <span class="badge bg-success rounded-3 fw-semibold">Oui</span>
                                        <?php else : ?>
                                            <span class="badge bg-danger rounded-3 fw-semibold">Non</span>
                                        <?php endif; ?>
                                    </h6>
                                </td>
                                <td class="border-bottom-0 d-flex">
                                    <a class="btn btn-primary m-1" href="index.php?page=educateurs&action=show&id=<?= $educateur->getId(); ?>">Voir</a>
                                    <a class="btn btn-warning m-1" href="index.php?page=educateurs&action=edit&id=<?= $educateur->getId(); ?>">Modifier</a>
                                    <a class="btn btn-danger m-1" href="index.php?page=educateurs&action=delete&id=<?= $educateur->getId(); ?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Aucun éducateur trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
</div>