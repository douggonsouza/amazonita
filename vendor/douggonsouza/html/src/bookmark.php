<?php

namespace douggonsouza\html;

use douggonsouza\html\tags\div;
use douggonsouza\html\tags\input;
use douggonsouza\html\tags\label;
use douggonsouza\html\tags\small;
use douggonsouza\html\tags\textInline;

abstract class bookmark
{    
    /**
     * Method propertys
     *
     * @param array $propertys [explicite description]
     * @param string $str [explicite description]
     *
     * @return void
     */
    public static function formatToAttributes(array $propertys, string $str = null)
    {
        if(!isset($propertys) || empty($propertys)){
            return null;
        }

        foreach($propertys as $key => $value){
            if(isset($value)){
                $str .= $key . '="' . $value . '"';
            }
        }

        return $str;
    }

    static function div(array $propertys, string $content = null)
    {
        return new div($propertys, $content);
    }

    static function input(array $propertys, array $events = null)
    {
        return new input($propertys, $events);
    }

    static function label(array $propertys, string $content)
    {
        return new label($propertys, $content);
    }

    static function small(array $propertys, string $content)
    {
        return new small($propertys, $content);
    }

    static function textInline(string $name, string $label, $value = null, string $smallDescription = null)
    {
        return new textInline($name, $label, $value, $smallDescription);
    }
}

?>