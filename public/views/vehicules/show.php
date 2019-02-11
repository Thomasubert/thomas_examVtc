<?php ob_start(); ?>

<a href="<?= url('vehicules') ?>">Retour</a>

<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Modèle</th>
        <th>Marque</th>
        <th>Couleur</th>
        <th>Immatriculation</th>
    </tr>
    <tr>
        <td>
            <a href="<?= url('vehicules/' . $vehicule->id_vehicule())?>">
                <?= $vehicule->id_vehicules() ?>
            </a>
        </td>
        <td><?= $vehicule->modele() ?></td>
        <td><?= $vehicule->marque() ?></td>
        <td><?= $vehicule->couleur() ?></td>
        <td><?= $vehicule->immatriculation() ?></td>
        <td>
            <a href="<?= url('vehicules/' . $vehicule->id_vehicule() . '/edit')?>"><i class="fas fa-pencil-alt"></i></a>
        </td>
        <td>
            <a href="<?= url('vehicules/' . $vehicule->id_vehicule() . '/delete')?>" class="delete"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>
</table>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>