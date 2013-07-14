<?php

chdir((__DIR__."/.."));

require_once 'vendor/autoload.php';

$app = new Silex\Application();


/////////////////////////////////////////////////////////
//                                                     //
//                      CONFIGS                        //
//                                                     //
//                                                     //
//-----------------------------------------------------//
//                                                     //


    /***********************************************
     = DEFINE TWIG PROVIDER TO LOOK AT ./views DIR *
     ==============================================*/

// FOR FORM SERVICE
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new \Silex\Provider\TranslationServiceProvider());

// set view path
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => 'views',
));

// a convenient function that renders twig templates from controllers
function twig($templateNate,$params=[]){
    global $app;

    return $app['twig']->render($templateNate.".twig",$params);
}

                    /* END TWIG *
                     *==========*/
//                                                     //
//                                                     //
//                                                     //
//                                                     //
//                                                     //
//                                                     //
//-----------------------------------------------------//
//                                                     //
//                                                     //
//-----------------------------------------------------//
//                                                     //
//                                                     //
//                                                     //
//                                                     //
//                                                     //
//                                                     //
//                                                     //
                /*********************
                 =  PREPARE THE ORM  *
                 ====================*/

$app->register(new \Face\Silex\FaceServiceProvider(),array(
    'pdo.dsn'      =>  "mysql:host=localhost;dbname=mydb",
    "pdo.username" =>  "root",
    "pdo.password" =>  "root",
    "pdo.options"  =>   null
));


                    /*  END ORM  *
                     *===========*/
//                                                     //
//                                                     //
//                                                     //
//                                                     //
//-----------------------------------------------------//
//                                                     //
//                                                     //
//-----------------------------------------------------//
//                                                     //
//                                                     //
//                                                     //
//                                                     //
                /**********************
                 = PREPARE THE ROUTES *
                 =====================*/

// ****
// ROUTES BASE DIRECTORY
$ROUTE_DIR=__DIR__."/routes";

$routes=glob("routes/*.route.php");
// mount the routes
foreach ($routes as $route) {
    include($route);
}

                    /* END ROUTES *
                     *============*/

//                                                     //
//                                                     //
//                                                     //
//                                                     //
//-----------------------------------------------------//






// definitions
$app->run();