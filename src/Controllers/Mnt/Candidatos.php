<?php

namespace Controllers\Mnt;
use Controllers\PublicController;
use Dao\Mnt\Candidatos as DaoCandidatos; 
use Views\Renderer;


class Candidatos extends PublicController
{
    /**
     * Runs the controller
     *
     * @return void
     */
    public function run():void
    {
        // code
        $viewData = array();
        $viewData["Candidatos"]= DaoCandidatos::getAll();
        Renderer::render('mnt/candidatos', $viewData);
    }
}

?>
