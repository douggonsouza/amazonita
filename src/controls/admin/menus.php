<?php

namespace douggonsouza\discovery\controls\admin;

use douggonsouza\mvc\control\actInterface;
use douggonsouza\propertys\propertysInterface;
use douggonsouza\discovery\controls\admin\admin;
use douggonsouza\permission\models\menu;
use douggonsouza\permission\permission as permissionLib;
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