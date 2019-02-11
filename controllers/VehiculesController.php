<?php

class VehiculesController {

    public function index() {
        $vehicules = Vehicule::findAll();
        view('vehicules.index', compact('vehicules'));
    }

    public function show($id_vehicule) {
        $vehicule = Vehicule::findOne($id_vehicule);
        view('vehicules.show', compact('vehicule'));
    }

    public function add() {
        view('vehicules.add');

    }

    public function save() {

        $vehicule = new Vehicule($_POST['marque'], $_POST['modele'], $_POST['couleur'], $_POST['immatriculation'], $_POST['id_vehicule']);
        $vehicule->save();
        Header('Location: '. url('vehicules'));
        exit();

    }

    public function edit($id_vehicule) {
        $vehicule = Vehicule::findOne($id_vehicule);
        view('vehicules.add', compact('vehicule'));
    }

    public function delete($id_vehicule) {

        $vehicule = Vehicule::findOne($id_vehicule);
        $vehicule->delete();
        Header('Location: '. url('vehicules'));

    }

}