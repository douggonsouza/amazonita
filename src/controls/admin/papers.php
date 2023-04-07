<?php

namespace douggonsouza\imwvg\controls\admin;

use douggonsouza\mvc\control\actInterface;
use douggonsouza\propertys\propertysInterface;
use douggonsouza\imwvg\controls\admin\admin;
use douggonsouza\genpermissions\models\paper;
use douggonsouza\genpermissions\genpermissions as permissionLib;
use douggonsouza\gentelela\benchmarck;
use douggonsouza\routes\router;

class papers extends admin implements actInterface
{   
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

        return $this->identified('dashboardPageContainerMainContentAccessesPagesBlock', $info);
    }

    /**
     * Method pagesOfAccess - 
     *
     * @param propertysInterface $info 
     *
     * @return mixed
     */
    public function pagesOfAccess(propertysInterface $info)
    {
        $params = array();
        
        // filtra opções
        $request = array_filter(explode('/', $info->REQUEST));
        $accessId = $info->PARAMSREQUEST[0][2];

        $pages = (new accessPage())->pages((int) $accessId);
        if(!empty($pages)){
            $params = $pages;
        }

        return $this->json($params);
    }
}
?>