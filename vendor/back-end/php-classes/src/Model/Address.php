<?php 

namespace Classes\Model;

use \Classes\DB\Sql;
use \Classes\Model;

class Address extends Model {


	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_addresses_save(:idaddress, :iduser, :desaddress, :desnumber, :descomplement, :descity, :desstate, :descountry, :deszipcode, :desdistrict)", [
			':idaddress'=>$this->getidaddress(),
			':iduser'=>$this->getiduser(),
			':desaddress'=>$this->getdesaddress(),
			':desnumber'=>$this->getdesnumber(),
			':descomplement'=>$this->getdescomplement(),
			':descity'=>$this->getdescity(),
			':desstate'=>$this->getdesstate(),
			':descountry'=>$this->getdescountry(),
			':deszipcode'=>$this->getdeszipcode(),
			':desdistrict'=>$this->getdesdistrict()
		]);

		if (count($results) > 0) {
			$this->setData($results[0]);
		}

	}

	public function getAddress($iduser){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_addresses WHERE iduser = :iduser", array(":iduser" => $iduser));

		$this->setData($results[0]);
	}


}

 ?>