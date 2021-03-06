<?php ob_start(); ?>

<h1>Bonjour à tous, soyez les bienvenus sur notre super site de location de voitures!</h1>

<h2>Enregistrez ici les conducteurs et véhicules en vous aidant de la barre de menu juste au-dessus!</h2>

<ol>
    <li></li>
    <li>Construisez vos tables et Models de base : <code>constructeur, setters, getters</code></li>
    <li>Ajoutez les fonctions CRUD aux Models: <code>find, findAll, findOne, save, update, delete</code></li>
    <li>Rédigez vos routes (attention à celles avec un paramètre), créez les Controllers correspondants et les méthodes pour les routes : <br>
        <code>GET index, GET show($id), GET add, POST save, GET delete($id)</code> pour chaque controller.</li>
    <li>Remplissez les méthodes dans les contrôleurs : appelez des Models et affichez des vues selon les routes.</li>
    <li>Créez les vues correspondantes <code>index, show, add, delete</code> pour chaque contrôleur.</li>
    <li>Ajustez les liens du header dans le fichier <code>links.php</code>.</li>
</ol>

<h2>Outils</h2>

<ul>
    <li>
        <strong>Comment créer une vue ?</strong><br>
        Un exemple se trouve dans <code>/public/views/pages/home.php</code>. Cette vue est appellée par le contrôleur <code>PagesController</code>. La route est déclarée dans <code>routes.php</code>.
    </li>

    <li>
        <strong>Comment afficher une vue depuis le contrôleur ?</strong><br>
        En utilisant <code>view('movies.index', compact('movies'));</code>, où <code>movies.index</code> correspond au fichier <code>/public/views/movies/index.php</code> et <code>compact('movies')</code> liste les variables à transmettre, ici uniquement <code>$movies</code>.
        S'il n'y a pas de variables à transmettre, on tappe juste <code>view('movies.index');</code> pour afficher la vue <code>/public/views/movies/index.php</code>.
    </li>

    <li>
        <strong>Comment afficher une URL dans un lien <code>a#href</code> ou dans un <code>form#action</code>?</strong><br>
        En utilisant <code>url('/movies')</code> pour aller vers la route <code>/movies</code> par exemple. Pour aller vers l'accueil, <code>url('/')</code>.
    </li>

    <li>
        <strong>Comment utiliser des requêtes personnalisées ?</strong><br>

        <ol>
            <li>Créer dans le Model de jointure la méthode (<code>EmprunteurDisque</code> par ex.), faire la requête dedans et retourner le résultat dans $data grâce à <code>Db::dbQuery()</code>: <br>
                <pre>
                    <code>
                        public static function listeDisquesNonEmpruntes() {

                            $req = 'SELECT *
                                    FROM disque
                                    LEFT JOIN emprunteur_disque ON disque.id = emprunteur_disque.id_disque
                                    WHERE id_emprunteur IS NULL';

                            return $data = Db::dbQuery($req);
                        }
                    </code>
                </pre>
            </li>
            <li>Appeler la requête depuis un contrôleur (<code>EmprunteursDisquesController</code> par ex.), et vardumper la data :<br>
                <pre>
                    <code>
                        public function listeNomsEmprunteurs() {
                            $data = EmprunteurDisque::listeNomsEmprunteurs();
                            var_dump($data);
                        }
                    </code>
                </pre>
            </li>
            <li>Créer la route correspondante afin d'accéder au résultat :<br>
                <pre>
                    <code>
                        $routes->get('/listeNomsEmprunteurs', 'EmprunteursDisquesController@listeNomsEmprunteurs');
                    </code>
                </pre>
            </li>
        </ol>

        En utilisant <code>url('/movies')</code> pour aller vers la route <code>/movies</code> par exemple. Pour aller vers l'accueil, <code>url('/')</code>.
    </li>

    
</ul>


<?php $content = ob_get_clean(); ?>

<?php view('template', compact('content')); ?>