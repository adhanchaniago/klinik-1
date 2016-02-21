<?php

// created by : Rusmana Basyar 

class paging{
	var $posisi;
	var $batas;
	var $halaman;
	var $query;
	var $mysqlQuery;
	var $num;
	var $Link;
	
	function setBatas($batas){
		$this->batas=$batas;	
	}
	
	function setHalaman($h){
		$this->halaman=$h;
	}
	
	function getBatas(){
		return $this->batas;
	}
		
	function getPosisi(){
		if(empty($this->halaman)){
			$this->posisi=0;
			$this->halaman=1;
		}
		else{
			$this->posisi = ($this->halaman-1) * $this->batas;
		}
		return $this->posisi;
	}
		
	function setQuery($q){
		$this->query=$q;
	}
	
	
	function getMysqlQuery(){
		$this->mysqlQuery=mysql_query($this->query);
		return $this->mysqlQuery;
	}
	
	function getNumRows(){
		$this->num=mysql_num_rows($this->mysqlQuery);
		return $this->num;
	}
	
	function setLink($l){
		$this->Link=$l;
	}
	
	function getHalaman(){
		$jmlhalaman=ceil($this->num/$this->batas);

		for($i=1;$i<=$jmlhalaman;$i++)
		if ($i != $this->halaman)
		{
			echo " <a href=$_SERVER[PHP_SELF]?".$this->Link."&p=$i>$i</a> | ";
		}
		else
		{
			echo " <b>$i</b> | ";
		}
		echo "<br />Total Record : <b>".$this->num."</b> Record";
	
	}

}

?>