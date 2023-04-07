<?php

namespace douggonsouza\imwvg\controls\admin;

use douggonsouza\mvc\control\actInterface;
use douggonsouza\propertys\propertysInterface;
use douggonsouza\imwvg\controls\admin\admin;
use douggonsouza\gentelela\benchmarck;

class perfil extends admin implements actInterface
{
    protected $layout = 'dashboard1';

    public function main(propertysInterface $info = null)
    {
        return $this->identified('dashboard1PageContainerPerfilBlock', $info);
    }
}
?>