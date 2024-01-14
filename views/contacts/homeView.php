<div class="card w-100">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Contacts</h5>
            <a class="btn btn-primary m-1" href="index.php?page=licencies&action=add">Ajouter</a>
        </div>
        <div class="table-responsive">
            <?php if (!empty($contacts)) : ?>
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nom</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Prenom</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Email</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Telephone</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Actions</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contacts as $contact) : ?>
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?= $contact->getNom(); ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?= $contact->getPrenom(); ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?= $contact->getEmail(); ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1"><?= $contact->getTelephone(); ?></h6>
                                </td>
                                <td class="border-bottom-0 d-flex">
                                    <a class="btn btn-primary m-1" href="index.php?page=contacts&action=show&id=<?= $contact->getId(); ?>">Voir</a>
                                    <a class="btn btn-warning m-1" href="index.php?page=contacts&action=edit&id=<?= $contact->getId(); ?>">Modifier</a>
                                    <a class="btn btn-danger m-1" href="index.php?page=contacts&action=delete&id=<?= $contact->getId(); ?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Aucun contact trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
</div>