<?php

namespace App\Controllers;

abstract class MainController{
    /**
     * Afficher une vue
     *
     * @param string $fichier
     * @param array $data
     * @return void
     */
    public function render(string $fichier, array $data = []){
        extract($data);

        // On démarre le buffer de sortie
        ob_start();
        
        // On génère la vue
        /*require_once ROOT.'src/Views/'.$fichier.'.php';*/
        
        // On stocke le contenu dans $content
        $content = ob_get_clean();
        
         // Template de page
         require_once ROOT.'src/Views/'.$fichier.'.php';
    }

}
