<?php

function homeController()
{  
    $config = $getConfig(CON_FILE_PATH);
    $pdo = getConnection($config);
    
    view([
        "home"  => 'active',
        "title" => "Méréseket nyilvántartó program",
        'view'  => 'home'
    ]);
}



function notFoundController()
{
    view([        
        "title" => "Page Not Found",
        'view'  => '_404'
    ]);   
}
