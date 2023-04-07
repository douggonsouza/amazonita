<?php

namespace douggonsouza\logged\models;

use douggonsouza\mvc\model\table;
use douggonsouza\mvc\model\tableInterface;
use douggonsouza\propertys\propertys;
use douggonsouza\propertys\propertysInterface;

class user extends table implements tableInterface
{
    public $table = 'users';
    public $key   = 'user_id';
    public $options = "SELECT user_id as value, name as label FROM users %s;";

    /**
     * options
     *
     * @return void
     */
    public function options(array $where = null)
    {
        return parent::options($where);
    }
    
    /**
     * info - Expõe os dados a serem salvos de login na sessão
     *
     * @return propertysInterface
     */
    public function info()
    {
        $var = $this->get('user_id');
        if(!isset($var)){
            return null;
        }

        return new propertys(
            array(
                'user_id' => $this->get('user_id'),
                'name' => $this->get('name'),
                'email' => $this->get('email'),
                'paper_id' => $this->get('paper_id')
            )
        );
    }

    /**
     * info - Expõe os dados do perfil do usuário
     *
     * @return object
     */
    public function perfil(int $userId = null)
    {
        if(isset($userId) || !empty($userId)){
            $user = new user($userId);
            return array(
                    'user_id' =>$user->get('user_id'),
                    'paper_id' => $user->get('paper_id'),
                    'name' => $user->get('name'),
                    'email' => $user->get('email'),
                    'document' => $user->get('document'),
                    'birthday' => $user->get('birthday'),
                    'school' => $user->get('school'),
                    'office' => $user->get('office')
            );
        }

        if($this->isModel()){
            return array(
                    'user_id' => $this->get('user_id'),
                    'paper_id' => $this->get('paper_id'),
                    'name' => $this->get('name'),
                    'email' => $this->get('email'),
                    'document' => $this->get('document'),
                    'birthday' => $this->get('birthday'),
                    'school' => $this->get('school'),
                    'office' => $this->get('office')
            );
        }

        return null;
    }
    
    /**
     * lastName - Retorna último nome do usuário
     *
     * @return void
     */
    public function lastName()
    {
        if($this->isModel()){
            return end(explode(' ', $this->get('name')));
        }

        return null;
    }


    /**
     * Get the value of table
     */ 
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Get the value of key
     */ 
    public function getKey()
    {
        return $this->key;
    }
}

?>