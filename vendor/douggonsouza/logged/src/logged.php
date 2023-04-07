<?php

namespace douggonsouza\logged;

use douggonsouza\propertys\propertys;
use douggonsouza\propertys\propertysInterface;

abstract class logged
{
    const NAME_SESSION = 'userlog';
    
    /**
     * in - Inclui infos no usuário da sessão
     *
     * @param  propertysInterface $info
     * @return void
     */
    public static function in(propertysInterface $info)
    {
        // limpa o usuário da sessão
        if(isset($_SESSION[self::NAME_SESSION])){
            unset($_SESSION[self::NAME_SESSION]);
        }

        // colocar dados na sessão
        $_SESSION[self::NAME_SESSION] = $info;

        return true;
    }
    
    /**
     * out - Limpa infos do usuário na sessão
     *
     * @return void
     */
    static public function out()
    {
        // limpa o usuário da sessão
        if(isset($_SESSION[self::NAME_SESSION])){
            unset($_SESSION[self::NAME_SESSION]);
        }

        return true;
    }
    
    /**
     * get - Expõe as infos do usuário na sessão
     *
     * @return void
     */
    static public function get()
    {
        if(isset($_SESSION[self::NAME_SESSION]) && !empty($_SESSION[self::NAME_SESSION]))
            return $_SESSION[self::NAME_SESSION];

        return null;
    }
    
    /**
     * info - Forma info propertys
     *
     * @param  mixed $info
     * @return void
     */
    static public function info(array $info)
    {
        if(!isset($info) || empty($info)){
            return null;
        }

        return new propertys($info);
    }
    
    /**
     * isLogged - Valida se usuário está logado na sessão
     *
     * @return void
     */
    static public function is()
    {
        if(isset($_SESSION[self::NAME_SESSION]) && !empty($_SESSION[self::NAME_SESSION])){
            return true;
        }

        return false;
    }
    
    /**
     * getUserId - Expõe o Id do usuário logado
     *
     * @return int|null
     */
    static public function getId()
    {
        if(self::is()){
            $login = (array) $_SESSION[self::NAME_SESSION];
            return (int) $login['user_id'];
        }

        return null;
    }
}

