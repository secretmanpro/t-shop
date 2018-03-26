<?php

class DBConnect{

	public $sql;
	public $connect = null;
	public $statement;

	public function __construct(){
		try{
		    $dbh = new PDO('mysql:host=localhost;dbname=t-shop-2', "root", ""); 
		    $dbh->exec("set names utf8"); 
		    $this->connect = $dbh;
		}
		catch(PDOException $e){
		    echo "Lỗi";
		    echo $e->getMessage();
		}
	}
	//$query = câu sql với các tham số là các cột của 1 bảng
	//$param = giá trị của các cột trong bảng
	public function setStatement($query,$param=array()){
		$stmt = $this->connect->prepare($query);
		if(!empty($param)){
			$number = count($param); 
			for($i=1; $i <= $number; $i++){
				//Gán các cột cho các giá trị tương ứng
				$stmt->bindParam($i,$param[$i-1]);
			}
		}		
		$this->statement = $stmt;
	}

	//TH1: insert/update/delete
	public function executeQuery($query,$param=array()){
	
		$this->setStatement($query,$param);
		return $this->statement->execute();

	}
	//TH2: SELECT 1
	public function loadOneRow($query,$param=array()){
		$check = $this->executeQuery($query,$param);
		if($check){
		//fetch : Lấy ra đối tượng 
			return $this->statement->fetch(PDO::FETCH_OBJ);
		}
		else{
			return false;
		}
	}

	public function loadMoreRows($query,$param=array()){
		$check = $this->executeQuery($query,$param);
		if($check){
			//Lấy tất cả
			return $this->statement->fetchAll(PDO::FETCH_OBJ);
		}
		else{
			return false;
		}
	}


	public function getLastID(){
		return $this->connect->lastInsertId();
	}

}
?>