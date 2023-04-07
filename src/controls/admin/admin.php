<?php

namespace douggonsouza\imwvg\controls\admin;

use douggonsouza\routes\router;
use douggonsouza\mvc\control\controllers;
use douggonsouza\mvc\control\controllersInterface;
use douggonsouza\propertys\propertysInterface;
use douggonsouza\logged\logged;

class admin extends controllers implements controllersInterface
{
    /**
     * _before - Evento que antecede o carregamento da Main
     *
     * @param  mixed $info
     * @return void
     */
    public function _before(propertysInterface $info = null)
    {
        if(!in_array('json', $info->PARAMSREQUEST[0])){
            // valida se está logado
            if(!logged::is()){
                logged::out();
                router::redirect('/login');
            }
        }
    }
}
?>