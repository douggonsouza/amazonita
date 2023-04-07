<?php

namespace douggonsouza\imwvg\controls;

use douggonsouza\mvc\control\controllers;
use douggonsouza\mvc\control\controllersInterface;
use douggonsouza\routes\router;
use douggonsouza\propertys\propertysInterface;
use douggonsouza\logged\models\user;
use douggonsouza\logged\logged;
use douggonsouza\gentelela\benchmarck;
use douggonsouza\mvc\view\views;

class login extends controllers implements controllersInterface
{

    public function main(propertysInterface $info = null)
    {
        if(isset($_POST['pub_key']) && $_POST['pub_key'] == 'bG9naW5fZm9ybQ=='){
            $user = new user(array(
                'email' => $_POST['email'],
                'password' => md5($_POST['password'])
            ));
            if(!$user->exist()){
                router::setAlert('Não encontrado usuário para a senha.', benchmarck::BADGE_DANGER); 
                return views::view('', $info, LOGIN);
            }

            if(!logged::in($user->info())){
                router::setAlert('Erro no login do usuário.', benchmarck::BADGE_DANGER);
            };

            router::setAlert('Usuário registrado com sucesso.');
            return router::redirect("/admin/dashboard", $info);
        }

        return views::view('', $info, LOGIN);
    }
}
?>