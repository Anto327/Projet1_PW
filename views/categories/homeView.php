<div class="card w-100">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Catégories</h5>
            <a class="btn btn-primary m-1" href="index.php?page=categories&action=add">Ajouter</a>
        </div>
        <!-- Flash message section -->
        <?php include './views/components/flashMsg.php'; ?>
        <!-- Records -->
        <div class="table-responsive">
            <?php if (count($categories) > 1) : ?>
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
                            <?php if ($categorie->getId() != 1) : ?>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0"><?= $categorie->getNom(); ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1"><?= $categorie->getCode(); ?></h6>
                                    </td>
                                    <td class="border-bottom-0 d-flex">
                                        <a class="btn btn-primary m-1" href="index.php?page=categories&action=show&id=<?= $categorie->getId(); ?>">Voir</a>
                                        <a class="btn btn-warning m-1" href="index.php?page=categories&action=edit&id=<?= $categorie->getId(); ?>">Modifier</a>
                                        <a class="btn btn-danger m-1" href="index.php?page=categories&action=delete&id=<?= $categorie->getId(); ?>">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Aucun categorie trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
</div>