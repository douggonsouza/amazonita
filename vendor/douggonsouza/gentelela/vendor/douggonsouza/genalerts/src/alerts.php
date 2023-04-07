<?php

namespace douggonsouza\alerts;

use douggonsouza\alerts\alertsInterface;

class alerts implements alertsInterface
{
    // BADGE
    const BADGE_PRIMARY    = 'Primário';
    const BADGE_SECONDARY  = 'Secundário';
    const BADGE_SUCCESS    = 'Sucesso';
    const BADGE_DANGER     = 'Erro';
    const BADGE_WARNING    = 'Atento';
    const BADGE_INFO       = 'Informação';
    const BADGE_LIGHT      = 'Inativo';
    const BADGE_DARK       = 'Ativo';

    // LABEL BADGE
    const LABEL_BADGE = array(
        self::BADGE_PRIMARY    => 'alert-primary',
        self::BADGE_SECONDARY  => 'alert-secondary',
        self::BADGE_SUCCESS    => 'alert-success',
        self::BADGE_DANGER     => 'alert-danger',
        self::BADGE_WARNING    => 'alert-warning',
        self::BADGE_INFO       => 'alert-info',
        self::BADGE_LIGHT      => 'alert-light',
        self::BADGE_DARK       => 'alert-dark'
    );

    static public $clear = true;

    /**
     * Busca pela mensagem de alerta na sessão
     * 
     * 
     * @return array
     */
    static final function session()
    {
        if(!isset($_SESSION['msgAlert']) || empty($_SESSION['msgAlert'])){
            $_SESSION['msgAlert'] = array();
        }

        return $_SESSION['msgAlert'];
    }

    /**
     * Salva na sessão a mensagem de alerta
     *
     * @param string $alert
     * @param string $badge
     * @return void
     */
    public final function save(string $alert, string $badge = self::BADGE_SUCCESS)
    {
        if(!isset($alert) || empty($alert)){
            return false;
        }

        $_SESSION['msgAlert'][$badge][] = $this->template($alert, $badge);

        return true;
    }

    /**
     * Expõe template para do alerta conforme o layout
     * 
     * <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
     *      <span class="badge badge-pill badge-primary">Success</span>
     * 		You successfully read this important alert.
     * 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     * 		<span aria-hidden="true">&times;</span></button>
     * 	</div>
     *
     * @return void
     */
    public static function template(string $message, string $badge = self::BADGE_SUCCESS)
    {
        if(!isset($message) || empty($message)){
            return null;
        }

        return sprintf('<div class="sufee-alert alert with-close %1$s alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">%2$s</span>
             %3$s
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>',
        $badge,
        self::LABEL_BADGE[$badge],
        $message
        );
    }

    /**
     * Regista um alerta
     *
     * @param string  $mensagem
     * @param string  $badge
     * @return void
     */
    static final public function set(string $mensagem, string $badge = self::BADGE_SUCCESS)
    {
        self::save(str_pad($mensagem,120), $badge);
    }

    /**
     * Retorna alerta definido
     * @param bool $clear
     * 
     * @return mixed
     */
    static final public function get(bool $clear = true)
    {
        $alerts = self::session();

        if(!isset($alerts) || empty($alerts)){
            return null;
        }

        self::setClear($clear);
        if(self::getClear()){
            self::clear();
        }

        $messages = null;
        foreach($alerts as $items){
            $messages = implode("\n ",$items)."\n ";
        }

        return $messages;
    }
   
    /**
     * clear - Limpa a mensagem de alerta
     *
     * @param  mixed $clear
     * @return void
     */
    static final public function clear($clear = null)
    {
        self::setClear($clear);
        if(self::getClear()){
            $_SESSION['msgAlert'] = array();
        }
    }

    /**
     * Get the value of exists
     */ 
    static final public function exist()
    {
        if(isset($_SESSION['msgAlert']) && !empty($_SESSION['msgAlert'])){
             return true;
        }

        return false;
    }

    /**
     * Get the value of clear
     */ 
    static public function getClear()
    {
        return self::$clear;
    }

    /**
     * Set the value of clear
     *
     * @return  self
     */ 
    static public function setClear($clear)
    {
        if(isset($clear)){
            self::$clear = $clear;
        }
    }

    /**
     * Evento destrutor da classe
     */
    public function __destruct()
    {
        self::clear();
    }
}

    