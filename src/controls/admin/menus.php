<?php

namespace douggonsouza\imwvg\controls\admin;

use douggonsouza\mvc\control\actInterface;
use douggonsouza\propertys\propertysInterface;
use douggonsouza\imwvg\controls\admin\admin;
use douggonsouza\genpermissions\models\menu;
use douggonsouza\genpermissions\genpermissions as permissionLib;
use douggonsouza\gentelela\benchmarck;

class menus extends admin implements actInterface
{
    protected $layout = 'dashboard1';

    public function main(propertysInterface $info = null)
    {
        return $this->identified('dashboard1PageContainerPerfilBlock', $info);
    }
}
?>