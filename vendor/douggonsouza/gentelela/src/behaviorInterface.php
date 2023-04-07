<?php

namespace douggonsouza\gentelela;

use douggonsouza\propertys\propertysInterface;

interface behaviorInterface
{
    /**
     * Executa o comportamento
     *
     * @param string|null $script
     * 
     * @return void
     * 
     */
    public function behavior(string $script = null);
}