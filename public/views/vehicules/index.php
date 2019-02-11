<?php ob_start(); ?>

<a href="<?= url('vehicules/add') ?>">Ajouter un véhicule</a>

<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Modèle</th>
        <th>Marque</th>
        <th>Couleur</th>
        <th>Immatriculation</th>
    </tr>

    <?php foreach($vehicules as $vehicule) : ?>
        <tr>
            <td>
                <a href="<?= url('vehicules/' . $vehicule->id_vehicule())?>">
                    <?= $vehicule->id_vehicule() ?>
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
    <?php endforeach; ?>
</table>



<!-- Pareil que pour le form d'index.php -->
<form action="<?= url('vehicules/save') ?>" method="post">

    <input type="hidden" name="id_vehicule"     value="<?= (isset($vehicule)) ? $vehicule->id_vehicule() : '' ?>">
    <input type="text"   name="marque"  value="<?= (isset($vehicule)) ? $vehicule->marque() : '' ?>"    placeholder="Marque"  class="form-control">
    <input type="text"   name="modele" value="<?= (isset($vehicule)) ? $vehicule->modele() : '' ?>"   placeholder="Modèle" class="form-control">
    <input type="text"   name="couleur"  value="<?= (isset($vehicule)) ? $vehicule->couleur() : '' ?>"    placeholder="Couleur"  class="form-control">
    <input type="text"   name="immatriculation" value="<?= (isset($vehicule)) ? $vehicule->immatriculation() : '' ?>"   placeholder="Immatriculation" class="form-control">

    <button type="submit" class="btn btn-<?= (isset($vehicule)) ? 'warning' : 'success' ?>">
        <?= (isset($vehicule)) ? 'Editer' : 'Créer' ?> un véhicule
    </button>
</form>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>