<?php

namespace douggonsouza\imwvg\controls\admin;

use douggonsouza\mvc\control\actInterface;
use douggonsouza\propertys\propertysInterface;
use douggonsouza\imwvg\controls\admin\admin;
use douggonsouza\genpermissions\models\genpermissions;
use douggonsouza\genpermissions\genpermissions as permissionLib;
use douggonsouza\gentelela\benchmarck;
use douggonsouza\routes\router;

class permissions extends admin implements actInterface
{   
    const PERMISSION_BLOCK = __DIR__ . '/../views/pageContainerPermissionTypeBlock.phtml';

    protected $layout = 'dashboard';

    /**
     * main - Method default
     *
     * @param  propertysInterface $info
     * @return void
     */
    public function main(propertysInterface $info = null)
    {
        if(isset($info->POST) && $info->POST['pub_key'] == 'UMOhZ2luYXMgRG8gQWNlc3Nv'){
        
        }

        return $this->view(self::PERMISSION_BLOCK, $info);
    }

    /**
     * Method pagesOfAccess - 
     *
     * @param propertysInterface $info 
     *
     * @return mixed
     */
    public function permissions(propertysInterface $info)
    {
        $params = array();
        
        // filtra opções
        $request = array_filter(explode('/', $info->REQUEST));
        $permissionId = $info->PARAMSREQUEST[0][2];

        $permissions = (new permission())->permissions((int) $permissionId);
        if(!empty($permissions)){
            return $this->json($params);
        }

        return $this->json(array());
    }
}
?>