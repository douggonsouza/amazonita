<?php

namespace douggonsouza\html\tags;

use douggonsouza\html\bookmark;
use douggonsouza\html\tags\tagsInterface;

class input implements tagsInterface
{
    protected $propertys;
    protected $events;
    protected $tag = '<input%s%s/>';
    
    /**
     * Method __construct
     *
     * @param array $propertys
     * @param array $events
     *
     * @return void
     */
    public function __construct(array $propertys, array $events = null)
    {
        $this->setPropertys($propertys);
        $this->setEvents($events);
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
        $events    = bookmark::formatToAttributes($this->getEvents());

        return sprintf(
            $this->getTag(),
            isset($propertys)? ' '.$propertys: null,
            isset($events)? ' '.$events: null
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
     * Get the value of events
     */ 
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set the value of events
     *
     * @return  self
     */ 
    public function setEvents($events)
    {
        if(isset($events) && !empty($events)){
            $this->events = $events;
        }

        return $this;
    }
}

?>