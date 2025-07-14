<?php

    class TaskController{
    
        //public function processsRequest(string $method, string $id) : void
        
        /***
        by placing a ? as prefix before string $id we make it nullable
        */
        public function processsRequest(string $method, ?string $id) : void
        {
        
            if($id === null){
            
                if($method == "GET"){
                
                    echo "index";
                
                } elseif ($method == "POST"){
                
                    echo "create";
                
                }

            } else {
            
                switch ($method){
                
                    case "GET":
                        echo "show $id";
                    break;

                    case "PATCH":
                        echo "update $id";
                    break;

                    case "DELETE":
                        echo "delete $id";
                    break;

                }
            
            }

        }
  
    }

?>