<?php

namespace douggonsouza\html\tags;

use douggonsouza\html\tags\input;
use douggonsouza\html\tags\div;
use douggonsouza\html\tags\label;
use douggonsouza\html\tags\samll;
use douggonsouza\html\tags\tagsInterface;

class textInline implements tagsInterface
{
    protected $name;
    protected $label;
    protected $value;
    protected $smallDescription;
    protected $tag = '<div class="row form-group">
        %s
    </div>';
   
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct(string $name, string $label, $value = null, string $smallDescription = null)
    {
        $this->setName($name);
        $this->setLabel($label);
        $this->setValue($value);
        $this->setSmallDescription($smallDescription);
    }

    /**
     * Exporta string da tag
     *
     * @return string
     * 
     */
    public function tag(string $tag = null)
    {
        // conteúdo de saída do imput
        $contentInput = (new input(
            array(
                'type' => 'text',
                'id' => $this->getName().'-ipt',
                'name' => $this->getName(),
                'placeholder' => 'texto',
                'class' => 'form-control',
                'value' => $this->getValue()
            )
        ))->tag();
        if($this->getSmallDescription()){
            $contentInput .= "\r\n" . (new small(
                array(
                    'class' => 'form-text text-muted',
                    'id' => $this->getName().'-sml',
                ),
                $this->getSmallDescription()
            ))->tag();
        }

        // conteúdo de saída da label
        $content = (new div(
            array('class' => 'col col-md-3'),
            (new label(
                array(
                    'for' => $this->getName().'-ipt',
                    'class' => 'form-control-label',
                    'id' => $this->getName().'-lbl',
                ),
                $this->getLabel()
            ))->tag()
        ))->tag();
        $content .= "\r\n" . (new div(
            array(
                'class' => 'col-12 col-md-9',
            ),
            $contentInput
        ))->tag();

        return sprintf(
            $this->getTag(),
            $content
        );
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        if(isset($name) && !empty($name)){
            $this->name = $name;
        }

        return $this;
    }

    /**
     * Get the value of label
     */ 
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of label
     *
     * @return  self
     */ 
    public function setLabel($label)
    {
        if(isset($label) && !empty($label)){
            $this->label = $label;
        }

        return $this;
    }

    /**
     * Get the value of smallDescription
     */ 
    public function getSmallDescription()
    {
        return $this->smallDescription;
    }

    /**
     * Set the value of smallDescription
     *
     * @return  self
     */ 
    public function setSmallDescription($smallDescription)
    {
        if(isset($smallDescription) && !empty($smallDescription)){
            $this->smallDescription = $smallDescription;
        }

        return $this;
    }

    /**
     * Get the value of value
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        if(isset($value) && !empty($value)){
            $this->value = $value;
        }

        return $this;
    }
}

?>