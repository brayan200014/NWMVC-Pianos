<?php
    namespace Controllers\Sec;

use Controllers\PublicController;
use Dao\Security\Security;
use phpDocumentor\Reflection\Types\Void_;
use \Views\Renderer; 

class Reset extends \Controllers\PublicController {

        private $pswd= "";
        private $pswdConfirm= ""; 
        private $id= "";
        private $errorPswdFormat= "";
        private $errorPswd= "";
        private $hasError= false;
    
            public function run() :void {

                if(!$this->isPostBack()) {
                    $this->id= $_GET["id"];
                }


            if($this->isPostBack()) {
                $this->pswd= $_POST["pswd"];
                $this->pswdConfirm= $_POST["pswdConfirm"];
                $this->id= $_POST["id"];

                if(!\Utilities\Validators::IsValidPassword($this->pswd)) {
                    $this->errorPswdFormat= "Contraseña debe ser almenos 8 caracteres, 1 número, 1 mayúscula, 1 símbolo especial";
                    $this->hasError= true;
                }
                if($this->pswd !== $this->pswdConfirm) {
                    $this->errorPswd= "Las contraseñas no son iguales";
                    $this->hasError= true;
                }

                if(!$this->hasError) {
                    $result= \Dao\Security\Security::updatePassword($this->id, $this->pswd);
                    if($result) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=sec_login",
                            "Cambio Exitoso"
                        );
                    }
                }
            }


            $dataView= get_object_vars($this);
                \Views\Renderer::render("security/reset", $dataView);
            }
    }
?>