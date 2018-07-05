<?php
    namespace Classes;
    use Rain\Tpl;

    class Page {

        private $tpl;
        private $options = [];
        private $defaults = [
            "data" => []
        ];

        // Inicia o RainTpl e cria o HEADER
        public function __construct($opts = array()){

            // Sobrescreve o array $defaults com o array passado no construtor $opts e guarda no array $options
            $this->options = array_merge($this->defaults, $opts);

            // Configurações do RainTPL
            $config = array(
                "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/",
                "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
                "debug"         => false // set to false to improve the speed
               );

            Tpl::configure( $config );

            $this->tpl = new Tpl;

            $this->setData($this->options["data"]);

            $this->tpl->draw("header");


        }

        // Atribuição de variáveis que vão aparecer no template. Ex: $título e seu valor
        private function setData($data = array()){

            foreach ($data as $key => $value) {
                $this->tpl->assign($key, $value); // Atribuição de variáveis que vão aparecer no template. Ex: $título e seu valor
            }
        }

        // Conteúdo do HTML
        public function setTpl($name, $data = array(), $returnHTML = false){

            $this->setData($data);

            return $this->tpl->draw($name, $returnHTML);
        }


        // FOOTER
        public function __destruct(){
            $this->tpl->draw("footer");
        }
    }


?>