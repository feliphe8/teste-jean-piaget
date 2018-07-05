<?php 

namespace Classes\Model;

use \Classes\DB\Sql;
use \Classes\Model;

class Post extends Model {


    // Salva um post
    public function save(){

        $sql = new Sql();

		$results = $sql->select("CALL sp_posts_save(:idpost, :destitle, :desbody, :iduser)", [
			':idpost'=>$this->getidpost(),
			':destitle'=>$this->getdestitle(),
			':desbody'=>$this->getdesbody(),
			':iduser'=>$this->getiduser()
		]);

		if (count($results) > 0) {
			$this->setData($results[0]);
		}
    }

    
    // Pega todos os posts de um usuário
    public static function getPosts($iduser)
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_posts WHERE iduser = :iduser ORDER BY idpost DESC", array(
			":iduser"=>$iduser
		));


    }
    
    // Pega um post pelo id do post
    public function get($idpost)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_posts WHERE idpost = :idpost", array(
			":idpost"=>$idpost
		));

		$data = $results[0];


		$this->setData($data);

    }
    

    // Deleta um post
    public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_posts WHERE idpost = :idpost", array(
			":idpost"=>$this->getidpost()
		));

    }
    
    // Atualiza um relato
    public function update()
	{

		$sql = new Sql();

		$results = $sql->select("UPDATE tb_posts SET destitle = :destitle, desbody = :desbody WHERE idpost = :idpost", array(
            ":destitle" => $this->getdestitle(),
            ":desbody" => $this->getdesbody(),
            ":idpost" => $this->getidpost()
        ));

		$this->setData($results);

	}

}

 ?>