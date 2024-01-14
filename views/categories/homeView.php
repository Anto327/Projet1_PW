<div class="card w-100">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Catégories</h5>
        <div class="table-responsive">
            <?php if (!empty($categories)) : ?>
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nom</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Code</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Actions</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $categorie) : ?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?= $categorie->getNom(); ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?= $categorie->getCode(); ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <a href="index.php?page=categories&action=show&id=<?= $categorie->getId(); ?>">Voir</a>
                                    <a href="index.php?page=categories&action=edit&id=<?= $categorie->getId(); ?>">Modifier</a>
                                    <a href="index.php?page=categories&action=delete&id=<?= $categorie->getId(); ?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Aucun categorie trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
</div>