<?php ob_start(); ?>

<a href="<?= url('conducteurs/add') ?>">Ajouter un élément</a>

<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Edition</th>
        <th>Suppression</th>
    </tr>

    <?php foreach($conducteurs as $conducteur) : ?>
        <tr>
            <td>
                <a href="<?= url('conducteurs/' . $conducteur->id_conducteur())?>">
                    <?= $conducteur->id_conducteur() ?>
                </a>
            </td>
            <td><?= $conducteur->prenom() ?></td>
            <td><?= $conducteur->nom() ?></td>
            <td>
                <a href="<?= url('conducteurs/' . $conducteur->id_conducteur() . '/edit')?>">
                    <i class="fas fa-pencil-alt"></i>
                </a>
            </td>
            <td>
                <a href="<?= url('conducteurs/' . $conducteur->id_conducteur() . '/delete')?>" class="delete">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>



<!-- On met un nouveau formulaire afin de permettre à l'utilisateur de rajouter un conducteur 
Je n'ai malheureusement pas eu le temps de finir et de faire en sorte qu'il fonctionne
-->


<form action="<?= url('conducteurs/save') ?>" method="post">

    <input type="hidden" name="id_conducteur"     value="<?= (isset($conducteur)) ? $conducteur->id_conducteur() : '' ?>">
    <input type="text"   name="prenom" value="<?= (isset($conducteur)) ? $conducteur->prenom() : '' ?>" placeholder="Prenom" class="form-control">
    <input type="text"   name="nom"    value="<?= (isset($conducteur)) ? $conducteur->nom() : '' ?>"    placeholder="Nom"    class="form-control">

    <button type="submit" class="btn btn-<?= (isset($conducteur)) ? 'warning' : 'success' ?>">
        <?= (isset($conducteur)) ? 'Editer' : 'Créer' ?> un conducteur
    </button>
</form>


<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>