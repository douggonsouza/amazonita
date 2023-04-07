<?php

namespace douggonsouza\html\tags;

use douggonsouza\html\tags\tagsInterface;
use douggonsouza\propertys\propertysInterface;

class text implements tagsInterface
{
    protected $propertys;
    protected $tag;

    /**
     * Evento construtor da classe
     *
     * @param propertysInterface $propertys
     * 
     */
    public function __construct(propertysInterface $propertys)
    {
        $this->setPropertys($propertys);
    }

    /**
     * Exporta string da tag
     *
     * @return string
     * 
     */
    public function toString()
    {
        if($this->getPropertys() === null){
            return '';
        }

        return "<input name=\"$this->getPropertys()->name\" class=\"$this->getPropertys()->class\" 
        id=\"$this->getPropertys()->id\" alt=\"$this->getPropertys()->alt\" 
        checked=\"$this->getPropertys()->checked\" disabled=\"$this->getPropertys()->disabled\" 
        readonly=\"$this->getPropertys()->readonly\" required=\"$this->getPropertys()->equired\" 
        type=\"text\" value=\"$this->getPropertys()->value\" 
        accept=\"$this->getPropertys()->accept\" autocomplete=\"$this->getPropertys()->autocomplete\" 
        autofocus=\"$this->getPropertys()->autofocus\" checked=\"$this->getPropertys()->checked\" 
        dirname=\"$this->getPropertys()->dirname\" form=\"$this->getPropertys()->form\" 
        formaction=\"$this->getPropertys()->formaction\" formenctype=\"$this->getPropertys()->formenctype\" 
        formmethod=\"$this->getPropertys()->formmethod\" formnovalidate=\"$this->getPropertys()->formnovalidate\" 
        formtarget=\"$this->getPropertys()->formtarget\" height=\"$this->getPropertys()->height\" 
        list=\"$this->getPropertys()->list\" max=\"$this->getPropertys()->max\" 
        maxlength=\"$this->getPropertys()->maxlength\" min=\"$this->getPropertys()->min\" 
        minlength=\"$this->getPropertys()->minlength\" multiple=\"$this->getPropertys()->multiple\" 
        pattern=\"$this->getPropertys()->pattern\" placeholder=\"$this->getPropertys()->placeholder\" 
        size=\"$this->getPropertys()->size\" src=\"$this->getPropertys()->src\" 
        step=\"$this->getPropertys()->step\" width=\"$this->getPropertys()->name\" />";
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
    public function setPropertys(propertysInterface $propertys)
    {
        if(isset($propertys) && !empty($propertys)){
            $this->propertys = $propertys;
        }

        return $this;
    }
}

?>