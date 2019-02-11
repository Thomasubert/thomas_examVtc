<?php

class ConducteursController {

    public function index() {

        $conducteurs = Conducteur::findAll();
        view('conducteurs.index', compact('conducteurs'));

    }

    public function show($id_conducteur) {

        $conducteur = Conducteur::findOne($id_conducteur);
        view('conducteurs.show', compact('conducteur'));
    }

    public function add() {

        view('conducteurs.add');
    }

    public function save() {

        $conducteur = new Conducteur($_POST['nom'], $_POST['prenom'], $_POST['id_conducteur']);
        $conducteur->save();
        Header('Location: '. url('conducteurs'));
        exit();

    }

    public function edit($id_conducteur) {
        $conducteur = Conducteur::findOne($id_conducteur);
        view('conducteurs.add', compact('conducteur'));
    }

    public function delete($id_conducteur) {
        $conducteur = Conducteur::findOne($id_conducteur);
        $conducteur->delete();
        Header('Location: '. url('conducteurs'));
    }   
}