<?php

namespace douggonsouza\imwvg\controls\admin;

use douggonsouza\imwvg\controls\admin\admin;
use douggonsouza\propertys\propertysInterface;
use douggonsouza\mvc\control\controllersInterface;
use douggonsouza\mvc\view\views;
use douggonsouza\routes\router;

// class dashboard extends admin implements actInterface
class dashboard extends admin implements controllersInterface
{
    public function main(propertysInterface $info = null)
    {
        return views::view(null, $info);
    }
}
?>