<?php

namespace douggonsouza\html\tags;

use douggonsouza\propertys\propertysInterface;

interface tagsInterface
{
    /**
     * Method tag : Prepara html para a tag
     *
     * @param string $tag - nova string para a tag html
     *
     * @return string
     */
    public function tag(string $tag = null);
}
?>