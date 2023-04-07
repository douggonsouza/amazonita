<?php

namespace douggonsouza\imwvg\controls\api;

use douggonsouza\mvc\control\actInterface;
use douggonsouza\propertys\propertysInterface;
use douggonsouza\imwvg\controls\admin\admin;
use douggonsouza\mvc\control\act;
use douggonsouza\imwvg\models\accessPage;
use douggonsouza\gentelela\benchmarck;
use douggonsouza\routes\router;

class accesses extends act implements actInterface
{
    const PAGE_CONTENT = BASE_DIR . '/vendor/douggonsouza/benchmarck/src/blocks/dashboardPageContainerMainContentAccessesPagesBlock.phtml';
    
    /**
     * main - Method default
     *
     * @param  propertysInterface $info
     * @return void
     */
    public function main(propertysInterface $info = null)
    {
        $this->setPage(self::PAGE_CONTENT);

        if(isset($info->POST) && $info->POST['pub_key'] == 'UMOhZ2luYXMgRG8gQWNlc3Nv'){
        
        }

        return $this->identified('dashboard', $info);
    }
}
?>