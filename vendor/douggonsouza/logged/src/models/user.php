<?php

namespace douggonsouza\logged\models;

use douggonsouza\mvc\model\model;
use douggonsouza\mvc\model\modelInterface;
use douggonsouza\propertys\propertys;
use douggonsouza\propertys\propertysInterface;

class user extends model implements modelInterface
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
        $var = $this->getField('user_id');
        if(!isset($var)){
            return null;
        }

        return new propertys(
            array(
                'user_id' => $this->getField('user_id'),
                'name' => $this->getField('name'),
                'email' => $this->getField('email'),
                'paper_id' => $this->getField('paper_id')
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
                    'user_id' =>$user->getField('user_id'),
                    'paper_id' => $user->getField('paper_id'),
                    'name' => $user->getField('name'),
                    'email' => $user->getField('email'),
                    'document' => $user->getField('document'),
                    'birthday' => $user->getField('birthday'),
                    'school' => $user->getField('school'),
                    'office' => $user->getField('office')
            );
        }

        if($this->isModel()){
            return array(
                    'user_id' => $this->getField('user_id'),
                    'paper_id' => $this->getField('paper_id'),
                    'name' => $this->getField('name'),
                    'email' => $this->getField('email'),
                    'document' => $this->getField('document'),
                    'birthday' => $this->getField('birthday'),
                    'school' => $this->getField('school'),
                    'office' => $this->getField('office')
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
            return end(explode(' ', $this->getField('name')));
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