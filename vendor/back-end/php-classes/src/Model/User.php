<?php

    namespace Classes\Model;
    use \Classes\DB\Sql;
    use \Classes\Model;

    class User extends Model {

        const SESSION = "User";

        // Método para LOGAR
        public static function login($email, $password){
            $sql = new Sql();

            // Faz uma consulta, trazendo o usuário que da match com o email passado no parâmetro
            $results = $sql->select("SELECT * FROM tb_users WHERE desemail = :EMAIL", array(":EMAIL" => $email));

            // Verifica se o banco retornou algum registro
            if (count($results) === 0) {
                throw new \Exception("Usuário inexistente ou senha inválida.");
            }

            // Guarda os dados na variavel data
            $data = $results[0];

            // Verifica se o HASH da senha passado no parâmetro é igual ao da senha que veio do banco
            if (password_verify($password, $data["despassword"]) === true){
                $user = new User();
                $user->setData($data); // Carrega a instância do usuário com os dados que veio do banco

                $_SESSION[User::SESSION] = $user->getValues(); // Coloca os dados do usuário dentro da SESSION

                return $user;

            } else {
                throw new \Exception("Usuário inexistente ou senha inválida.");
            }
        }

        // Método para verificar se o usuário está logado e redireciona-lo para página de login
        public static function verifyLogin(){

            if (!isset($_SESSION[User::SESSION]) || !$_SESSION[User::SESSION] || !(int) $_SESSION[User::SESSION]["iduser"] > 0) { // Se a sessão não estiver definida ou for falsa ou o ID do usuário NÂO for maior que 0
                header("Location: /login");
                exit;
            }
        }

        // Método para verificar se o usuário está logado. Utilizado para esconder partes do menu para usuários que não estão logado.
        public static function checkLogin(){

            // Se a sessão estiver definida, for verdadeira e o IDUSER for maior que 0, então o usuário está logado, retorna true.
		if (isset($_SESSION[User::SESSION]) || $_SESSION[User::SESSION] || (int)$_SESSION[User::SESSION]["iduser"] > 0) {
			return true;

		} 

	}


        // Método para deslogar
        public static function logout(){
            $_SESSION[User::SESSION] = NULL;
        }


        // Método para salvar os dados do usuário no BD
        public function save(){
            $sql = new Sql();

            // CHAMA UMA PROCEDURE QUE INSERE O NOVO USUÁRIO NO BANCO E RETORNA O NOVO USUÁRIO INSERIDO
            $results = $sql->select("CALL sp_users_save(:desname, :desbirth, :desbiograph, :desemail, :despassword, :nrphone)", array(
                ":desname" =>$this->getdesname(),
                ":desbirth" => $this->getdesbirth(),
                ":desbiograph" =>$this->getdesbiograph(),
                ":desemail" => $this->getdesemail(),
                ":despassword" => User::getPasswordHash($this->getdespassword()),
                ":nrphone" => $this->getnrphone()
            ));

            $this->setData($results[0]); // CARREGA A INSTÂNCIA DO USUÁRIO COM OS DADOS QUE VEIO DO BANCO

        }

        // Criptografa a senha
        public static function getPasswordHash($password){

		    return password_hash($password, PASSWORD_DEFAULT, [
			    'cost'=>12
		    ]);

        }
        
        // Método para recuperar os dados do usuário na sessão
        public static function getFromSession(){

		    $user = new User();

		    if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0) {

			    $user->setData($_SESSION[User::SESSION]);

		    }

		    return $user;

	    }
    }

?>