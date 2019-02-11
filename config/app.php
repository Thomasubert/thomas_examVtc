<?php

/**
 * Aliases : raccourcis pour les noms de classes
 */
class_alias('\Bramus\Router\Router', 'Router');

/**
 * Constantes : éléments de configuration propres au système
 */
const WEBSITE_TITLE = "Location de véhicules";
const BASE_URL = "http://localhost/thomas_examVtc";

/**
 * Liste des dossiers source pour l'autoload des classes
 */
const CLASSES_SOURCES = [
    'controllers',
    'config',
    'models',
];