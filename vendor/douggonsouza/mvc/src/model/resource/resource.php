<?php

namespace douggonsouza\mvc\model\resource;

use douggonsouza\mvc\model\connection\conn;
use douggonsouza\mvc\model\resource\resourceInterface;
use douggonsouza\mvc\model\connection\connInterface;

class resource extends conn implements resourceInterface
{
    // protected static $conn;
    protected $data;
    protected $resource;
    protected $error;
    protected $index = -1;
    protected $isEof = true;
    protected $new   = true;

    public function __construct()
    {
        // self::setConn($conn::getConnection());
    }
  
    /**
     * Method query
     *
     * @param string $sql [explicite description]
     *
     * @return void
     */
    public function query(string $sql)
    {
        if(!isset($sql) || empty($sql) || !self::getConnection()){
            return false;
        }
        
        try{
            mysqli_query(self::getConnection(), 'SET SQL_SAFE_UPDATES = 0;');

            $resource = mysqli_query(self::getConnection(), (string) $sql);
            if(!is_bool($resource)){
                $this->setResource($resource);
                if(!$this->next()){
                    $this->setError(self::getConnection()->error);
                    return false;
                }
            }
            
            if(!empty(self::getConnection()->error)){
                $this->setError(self::getConnection()->error);
                return false;
            }

            mysqli_query(self::getConnection(), 'SET SQL_SAFE_UPDATES = 1;');

            return true;
        }
        catch(\Exception $e){
            return false;
        }
    }

    /**
     * Expõe o total de linha afetadas pela query
     * @return int
    */
    public function total()
    {
        if(empty($this->getResource())){
            return 0;
        }

        return mysqli_num_rows($this->getResource());
    }

    /**
     * Exist dados para o recurso
     * @return int
    */
    public function exist()
    {
        if(empty($this->getResource())){
            return false;
        }

        return mysqli_num_rows($this->getResource()) >= 1;
    }

    /**
     * Devolve array associativo de todos os registros
     * 
     * @return array|null
     */
    public function asArray()
    {
        if(empty($this->getResource())){
            return array();
        }

        return mysqli_fetch_all($this->getResource(), MYSQLI_ASSOC);
    }
    
    /**
     * Method asAllArray
     *
     * @return void
     */
    public function asAllArray()
    {
        if(empty($this->getResource())){
            return array();
        }

        return mysqli_fetch_all($this->getResource(), MYSQLI_ASSOC);
    }

    /**
     * Inicia transação
     * 
     * @return boolean
     */
    static public function begin()
    {

		// inicia sessão de transação
		mysqli_query(self::getConnection(), 'SET SQL_SAFE_UPDATES = 0;');
        mysqli_begin_transaction(self::getConnection());
		mysqli_query(self::getConnection(), 'SET SQL_SAFE_UPDATES = 1;');
		
        return true;
	}

    /**
     * Faz commit na transação iniciada
     * @return boolean
     */
    static public function commit()
    {
		// confirma sessão de transação
		mysqli_query(self::getConnection(), 'SET SQL_SAFE_UPDATES = 0;');
        mysqli_commit(self::getConnection());
		mysqli_query(self::getConnection(), 'SET SQL_SAFE_UPDATES = 1;');
		
        return true;
    }

    /**
     * Faz rollback na transação iniciada
     * @return boolean
     */
    static public function rollback()
    {
		// desfaz sessão de transação
		mysqli_query(self::getConnection(), 'SET SQL_SAFE_UPDATES = 0;');
        mysqli_rollback(self::getConnection());
		mysqli_query(self::getConnection(), 'SET SQL_SAFE_UPDATES = 1;');
		
        return true;
    }

    /**
     * Executa uma instrução MySQL
     * 
     */
    // public function execute(string $sql)
    // {
    //     if(!isset($sql) || empty($sql)){
    //         return false;
    //     }

    //     if(!self::getConn()){
    //         return false;
    //     }
        
    //     try{
    //         self::getConn()->query('SET SQL_SAFE_UPDATES = 0;');
    //         $resource = self::getConn()->query((string) $sql);
    //         if(!empty(self::getConn()->error)){
    //             $this->setError(self::getConn()->error);
    //             return false;
    //         }
    //         self::getConn()->query((string) 'SET SQL_SAFE_UPDATES = 1;');

    //         if(is_bool($resource)){
    //             return $resource;
    //         }
    //         return mysqli_fetch_all($resource, MYSQLI_ASSOC);
    //     }
    //     catch(\Exception $e){
    //         return false;
    //     }
    // }

    /**
     * Busca entre os registros
     *
     * @param string $table
     * @param array  $search
     * @return bool
     */
    // public function search(string $table, array $search)
    // {
    //     if(!isset($table) || empty($table) || !isset($search) || empty($search)){
    //         $this->setError('Não é permitido parâmetro nulo.');
    //         return false;
    //     }

    //     if(!$this->query(sprintf(
    //         "SELECT * FROM %1\$s WHERE %2\$s;",
    //         $table,
    //         implode(' AND ', $search)
    //     ))){
    //         $this->setError(self::getConnection()->error);
    //         return false;
    //     }

    //     return true;
    // }

    /**
     * Busca entre os registros da tabela ou retorna todos
     *
     * @param string $table
     * @param array  $search
     * @return bool
     */
    // public function seek(string $sql)
    // {
    //     if(!isset($sql) || empty($sql)){
    //         $this->setError('Não é permitido Sql nulo.');
    //         return false;
    //     }

    //     if(!$this->query($sql)){
    //         $this->setError(self::getConn()->error);
    //         return false;
    //     }

    //     return true;
    // }

    /**
     * Atualiza a propriedade data
     *
     * @return bool
     */
    public function data()
    {
        if(empty($this->getResource())){
            return true;
        }

        $data = $this->getResource()->fetch_assoc();
        if(isset($data) && !empty($data)){
            $this->setData($data);
            $this->setIndex($this->getIndex() + 1);
        }
        return true;
    }

    /**
     * Move o ponteiro para o prÃ³ximo
     * 
     */
    public function next()
    {
        if(empty($this->getResource())){
            return true;
        }

        $data = $this->getResource()->fetch_assoc();
        if(!isset($data) || empty($data)){
            $this->setIsEof(true);
            return true;
        }
        $this->setData($data);
        $this->setIndex($this->getIndex() + 1);
        return true;
    }

    /**
     * Move o ponteiro para o anterior
     * 
     */
    public function previous()
    {
        if(empty($this->getResource())){
            return true;
        }

        $this->setIndex($this->getIndex() - 1);
        $this->getResource()->data_seek($this->getIndex());
        $this->data();

        return true;
    }

    /**
     * Move o ponteiro para o primeiro
     * 
     */
    public function first()
    {
        if(empty($this->getResource())){
            return true;
        }

        $this->setIndex(0);
        $this->getResource()->data_seek($this->getIndex());
        $this->data();

        return true;
    }

    /**
     * Move o ponteiro para o Ãºltimo
     * 
     */
    public function last()
    {
        if(empty($this->getResource())){
            return true;
        }

        $this->setIndex($this->total() - 1);
        $this->getResource()->data_seek($this->getIndex());
        $this->data();

        return true;
    }

    /**
     * Get the value of conn
     */ 
    public static function getConn()
    {
        return self::$conn;
    }

    /**
     * Set the value of conn
     *
     * @return  self
     */ 
    public static function setConn(connInterface $conn)
    {
        if(isset($conn) && !empty($conn)){
            self::$conn = $conn;
        }
    }

    /**
     * Popula o objeto data pelo array
     *
     * @param array $data
     * @return bool
     */
    public function populate(array $data)
    {
        if(empty($data)){
            $this->setError('Não é permitido vazio no parâmetro Data.');
            return false;
        }

        foreach($data as $index => $value){
            $this->data[$index] = $value;
        }

        return true;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        if(!isset($this->data)){
            $this->data = array();
        }
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    protected function setData($data)
    {
        if(!isset($data) && $this->getIndex() >= $this->total()){
            $this->setIsEof(true);
            return;
        }

        $this->data = $data;
        $this->setIsEof(false);
    }

    /**
     * Get the value of data
     */ 
    public function getField(string $field)
    {
        if(empty($this->getData()) || !isset($field) || empty($field)){
            return null;
        }
        return $this->data[$field];
    }

    /**
     * Preenche um campo com valor
     *
     * @param string $field
     * @param mixed $value
     * @return bool
     */
    public function setField(string $field, $value)
    {
        if(!isset($field) || empty($field) || !isset($value) || empty($value)){
            $this->setError('Não é permitido nulo para os parâmentros Field ou Value.');
            return false;
        }
        if(empty($this->getData())){
            $this->setData(array());
        }
        $this->data[$field] = $value;
        return true;
    }

    /**
     * Get the value of error
     */ 
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set the value of error
     *
     * @return  self
     */ 
    public function setError($error)
    {
        if(isset($error) && !empty($error)){
            $this->error = $error;
        }
    }

    /**
     * Get the value of resource
     */ 
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Set the value of resource
     *
     * @return  self
     */ 
    protected function setResource($resource)
    {
        $this->resource = null;
        if(isset($resource) && !empty($resource) && !is_bool($resource)){
            $this->resource = $resource;
            $this->setNew(true);
            if($resource->num_rows > 0){
                $this->setNew(false);
            }
        }
    }

    /**
     * Get the value of index
     */ 
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Set the value of index
     *
     * @return  self
     */ 
    public function setIndex($index)
    {
        if(empty($this->getResource())){
            return;
        }

        if(isset($index) && $index <= $this->total()){
            $this->index = $index;
        }
    }

    /**
     * Get the value of isEof
     */ 
    public function getIsEof()
    {
        return $this->isEof;
    }

    /**
     * Set the value of isEof
     *
     * @return  self
     */ 
    public function setIsEof($isEof)
    {
        if(isset($isEof)){
            $this->isEof = $isEof;
        }
    }

    /**
     * Get the value of new
     */ 
    public function getNew()
    {
        return $this->new;
    }

    /**
     * Set the value of new
     *
     * @return  self
     */ 
    public function setNew($new)
    {
        $this->new = $new;
    }
}
