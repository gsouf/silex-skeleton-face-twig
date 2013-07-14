<?php

// REQUIRED WITH $app SILEXE VARIABLE


$routes = $app['controllers_factory'];


$routes -> match('/', function (Symfony\Component\HttpFoundation\Request $request) use ($app) {

    
    return twig("index");

});




$app->mount('/', $routes);



class Tree {

    use \Face\Traits\EntityFaceTrait;
    
    public $id;
    public $age;
    public $lemons=array();
    public $leafs=array();
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }
    
    public function getLemons() {
        return $this->lemons;
    }

    public function setLemons($lemons) {
        $this->lemons = $lemons;
        echo "TREE : ".$this->id." SET LEMON : ".$lemons->getId().PHP_EOL;
    }

        
    

    public function getLeafs() {
        return $this->leafs;
    }

    public function setLeafs($leafs) {
        $this->leafs = $leafs;
    }

        
    
    public static function __getEntityFace() {
        return [
            "sqlTable"=>"tree",
            
            "elements"=>[
                "id"=>[
                    "identifier"=>true,
                    "sql"=>[
                        "columnName"=> "id",
                        "isPrimary" => true
                    ]
                ],
                "age"=>[
                  
                ],
               
              
            ]
            
        ];
    }
    
}