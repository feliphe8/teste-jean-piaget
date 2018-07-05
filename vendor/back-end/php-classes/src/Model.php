<?php
    namespace Classes;

    class Model {

        private $values = [];

	    public function __call($name, $args){

		    $method = substr($name, 0, 3); // Pega o as três primeiras letras para saber se é SET ou GET
		    $fieldName = substr($name, 3, strlen($name)); // Pega o restante do nome do método

		    switch ($method){

			    case "get":
				    return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
			        break;

			    case "set":
				    $this->values[$fieldName] = $args[0];
			    break;

		    }

	    }

	    public function setData($data = array()){

		    foreach ($data as $key => $value) {
			
			    $this->{"set".$key}($value); // Criar dinâmicamente o método set. setAlgumaCoisaQueVemDoBanco($valor)

		    }

	    }

	    public function getValues(){

		    return $this->values;

        }
    
    }

?>