<?php

use douggonsouza\routes\router;
use douggonsouza\imwvg\controls\login;
use douggonsouza\imwvg\controls\admin\dashboard;

router::routing(
    'GET', 
    "/", 
    new dashboard(PLAIN_PAGE)
);
router::routing(
    'POST', 
    "/", 
    new dashboard(PLAIN_PAGE)
);
router::routing(
    'GET', 
    "/login", 
    new login(LOGIN)
);
router::routing(
    'POST', 
    "/login", 
    new login(LOGIN)
);
router::routing(
    'GET', 
    "/admin/dashboard", 
    new dashboard(LAYOUT_1)
);
router::routing(
    'POST', 
    "/admin/dashboard", 
    new dashboard(LAYOUT_1)
);

router::end('404');
?>
