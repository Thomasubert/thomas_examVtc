<?php

class Vehicule extends Db {

    protected $id_vehicule;
    protected $marque;
    protected $modele;
    protected $couleur;
    protected $immatriculation;
    

    const TABLE_NAME = 'vehicule';

    public function __construct($marque, $modele, $couleur, $immatriculation, $id_vehicule = null) {
        $this->setMarque($marque);
        $this->setModele($modele);
        $this->setId($id_vehicule);
    }

    /**
     * Get the value of id
     */ 
    public function id_vehicule()
    {
        return $this->id_vehicule;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id_vehicule)
    {
        $this->id_vehicule = $id_vehicule;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function marque()
    {
        return $this->marque;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setMarque(string $marque)
    {

        if (strlen($marque) == 0) {
            throw new Exception('La marque ne doit pas être nul.');
        }

        if (strlen($marque) > 150) {
            throw new Exception('La marque ne doit pas être plus long que 150 caractères.');
        }

        $this->marque = $marque;
        return $this;
    }

    /**
     On récupère la valeur de "modele"
     */ 
    public function modele()
    {
        return $this->modele;
    }

    /**
    On définit les conditions pour "modele" avec set
     *
     * @return  self
     */ 
    public function setModele($modele)
    {
        if (strlen($modele) == 0) {
            throw new Exception('Le modèle ne doit pas être nul.');
        }

        if (strlen($modele) > 150) {
            throw new Exception('Le modèle ne doit pas être plus long que 150 caractères.');
        }

        $this->modele = $modele;
        return $this;
    }


    /* On récupère la valeur de "couleur" */

    public function couleur()
    {
        return $this->couleur;
    }

    /**
     On définit les conditions d'existence de "couleur".
     *
     * @return  self
     */ 
    public function setCouleur($couleur)
    {

        if (strlen($couleur) == 0) {
            throw new Exception('La couleur ne doit pas être nul.');
        }

        if (strlen($couleur) > 150) {
            throw new Exception('La couleur ne doit pas être plus longue que 150 caractères.');
        }

        $this->couleur = $couleur;

        return $this;
    }


     /**
     * On récupère la valeur de "immatriculation".
     */ 
    public function immatriculation()
    {
        return $this->immatriculation;
    }

    /**
     * On définit les conditions d'existence de "immatriculation".
     *
     * @return  self
     */ 
    public function setImmatriculation($immatriculation)
    {

        if (strlen($immatriculation) == 0) {
            throw new Exception('L\'immatricualtion ne doit pas être nul.');
        }

        if (strlen($immatriculation) > 150) {
            throw new Exception('L\'immatriculation ne doit pas être plus longue que 150 caractères.');
        }

        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function nomComplet() {
        
        return $this->modele . ' - ' . $this->marque();
    }

    /**
     * CRUD Methods
     */

    public static function findOne(int $id_vehicule) {

        $data = Db::dbFind(self::TABLE_NAME, [
            ['id_vehicule', '=', $id_vehicule]
        ]);

        if(count($data) > 0) $data = $data[0];
        else return;


        $vehicule = new Vehicule($data['marque'], $data['modele'], $data['couleur'], $data['immatriculation'], $data['id_vehicule']);

        return $vehicule;

    }

    public static function findAll() {

        $datas = Db::dbFind(self::TABLE_NAME);

        $vehicules = [];

        foreach($datas as $data) {
            $vehicules[] = new Vehicule($data['marque'], $data['modele'], $data['couleur'], $data['immatriculation'], $data['id_vehicule']);
        }

        return $vehicules;

    }
    public function save() {

        $data = [
            "modele"            => $this->modele(),
            "marque"            => $this->marque(),
            "couleur"           => $this->couleur(),
            "immatriculation"   => $this->immatriculation(),
        ];

        if ($this->id_vehicule() > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }

    public function update() {

        if ($this->id_vehicule > 0) {
            $data = [
                "modele"                => $this->modele(),
                "marque"                => $this->marque(),
                "couleur"               => $this->couleur(),
                "immatriculation"       => $this->immatriculation(),
                "id_vehicule"           => $this->id_vehicule()
            ];
            Db::dbUpdate(self::TABLE_NAME, $data, 'id_vehicule');
            return $this;
        }
        return;
    }

    public function delete() {

        $data = [
            'id_vehicule' => $this->id_vehicule(),
        ];
        
        Db::dbDelete(self::TABLE_NAME, $data);

        // On supprime aussi tous les emprunts !
        Db::dbDelete(Location::TABLE_NAME, [
            'id_vehicule' => $this->id_vehicule()
        ]);

        return;
    }


}