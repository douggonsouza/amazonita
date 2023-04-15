<?php

namespace douggonsouza\gentelela\controls;

use douggonsouza\propertys\propertysInterface;
use douggonsouza\mvc\control\controllersInterface;
use douggonsouza\mvc\control\controllers;
use douggonsouza\mvc\view\views;

// class dashboard extends controllers implements actInterface
class alert extends controllers implements controllersInterface
{
    public function main(propertysInterface $info = null)
    {
        return views::view(null, $info);
    }
}
?>