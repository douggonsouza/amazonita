<?php

namespace douggonsouza\mvc\model\resource;

use douggonsouza\mvc\model\resource\sourceInterface;
use douggonsouza\mvc\model\connection\conn;

/**
 * source
 * 
 * Gerenciamento do recurso
 * 
 * @vesion 1.0.0
 * 2023-04-01 
 */
class source implements sourceInterface
{
    protected $resource;
    protected $error;
    
    /**
     * Method __construct
     *
     * @param $resource $resource [explicite description]
     *
     * @return void
     */
    public function __construct(string $sql)
    {
        if(isset($sql) && !empty($sql)){
            $this->setResource(conn::select($sql));
        }
    }
    
    /**
     * Method close
     *
     * @return void
     */
    public function close($return = null)
    {
        if(empty($this->getResource())){
            throw new \Exception("Não existe recurso.");
        }

        if(isset($return) && !empty($return)){
            return $return;
        }

        return $this->getResource()->close();
    }

    /**
     * Method fetchObject
     *
     * @return object
     */
    public function fetchObject()
    {
        if(empty($this->getResource())){
            throw new \Exception("Não existe recurso.");
        }

        return $this->getResource()->fetch_object();
    }
    
    /**
     * Method fetchArray
     *
     * @param int $index [explicite description]
     *
     * @return array
     */
    public function  fetchArray(int $index = 0)
    {
        if(empty($this->getResource())){
            throw new \Exception("Não existe recurso.");
        }

        return mysqli_fetch_array($this->getResource(), $index);
    }

    /**
     * Expõe o total de linha afetadas
     * @return int
    */
    public function total()
    {
        if(empty($this->getResource())){
            throw new \Exception("Não existe recurso.");
        }

        return mysqli_num_rows($this->getResource());
    }

    /**
     * Exist dados no recurso
     * @return int
    */
    public function exist()
    {
        if(empty($this->getResource())){
            throw new \Exception("Não existe recurso.");
        }

        return mysqli_num_rows($this->getResource()) >= 1;
    }
    
    /**
     * Method asAllArray
     *
     * @return void
     */
    public function allArray()
    {
        if(empty($this->getResource())){
            throw new \Exception("Não existe recurso.");
        }

        return mysqli_fetch_all($this->getResource(), MYSQLI_ASSOC);
    }
    
    /**
     * Method dataSeek
     *
     * @param int $index [explicite description]
     *
     * @return void
     */
    public function dataSeek(int $index = 0)
    {
        if(empty($this->getResource())){
            throw new \Exception("Não existe recurso.");
        }

        return mysqli_data_seek($this->getResource(), $index);
    }

    /**
     * Get the value of resource
     */ 
    protected function getResource()
    {
        return $this->resource;
    }

    /**
     * Set the value of resource
     *
     * @return  self
     */ 
    public function setResource($resource)
    {
        if(isset($resource) && !empty($resource)){
            $this->resource = $resource;
        }
    }
}
