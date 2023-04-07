<?php

namespace douggonsouza\html\tags;

use douggonsouza\html\bookmark;
use douggonsouza\html\tags\tagsInterface;

class small implements tagsInterface
{
    protected $propertys;
    protected $content;
    protected $tag = '<small%s>%s</small>';
    
    /**
     * Method __construct
     *
     * @param array $propertys
     * @param array $events
     *
     * @return void
     */
    public function __construct(array $propertys, string $content)
    {
        $this->setPropertys($propertys);
        $this->setContent($content);
    }

    /**
     * Method tag : Prepara html para a tag
     *
     * @param string $tag - nova string para a tag html
     *
     * @return string
     */
    public function tag(string $tag = null)
    {
        $this->setTag($tag);
        
        $propertys = bookmark::formatToAttributes($this->getPropertys());

        return sprintf(
            $this->getTag(),
            isset($propertys)? ' '.$propertys: null,
            isset($this->content)? ' '.$this->getContent(): null
        );
    }

    /**
     * Get the value of propertys
     */ 
    public function getPropertys()
    {
        return $this->propertys;
    }

    /**
     * Set the value of propertys
     *
     * @return  self
     */ 
    public function setPropertys(array $propertys)
    {
        if(isset($propertys) && !empty($propertys)){
            $this->propertys = $propertys;
        }

        return $this;
    }

    /**
     * Get the value of tag
     */ 
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set the value of tag
     *
     * @return  self
     */ 
    protected function setTag($tag)
    {
        if(isset($tag) && !empty($tag)){
            $this->tag = $tag;
        }

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        if(isset($content) && !empty($content)){
            if($this->content === null){
                $this->content = $content;
                return $this;
            }
            $this->content .= "\r\n" . $content;
        }
        
        return $this;
    }
}

?>