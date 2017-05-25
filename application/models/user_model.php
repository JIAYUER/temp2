<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model{
		public function get_sel($arr1,$arr2){
			//通过$name去数据库查询(select * from user where uname='$name')
			//$query=$this->db->query("select * from user where uname='$name'");
			$query=$this->db->query("select time,temperature from tempt where time BETWEEN'$arr1'AND'$arr2'  group by time order by time");
			// $query=$this->db->query("select time,max(temperature) from tempt group by time where time BETWEEN'$arr1'AND'$arr2'");
			return $query->result(); 
		}
		
		public function get_selup($arr1,$arr2){
			
			$query=$this->db->query("select time,temperature from tempt where time BETWEEN'$arr1'AND'$arr2' group by time order by temperature asc");
			
			return $query->result(); 
		}
		
		public function get_seldown($arr1,$arr2){
			
			$query=$this->db->query("select time,temperature from tempt where time BETWEEN'$arr1'AND'$arr2' group by time order by temperature desc");
			
			return $query->result(); 
		}
	
		public function get_sel11($arr11){
			
			$query=$this->db->query("select time,temperature from tempt where time='$arr11' order by time");
			
			return $query->result(); 
		}
		public function get_newsel($arr11,$arr22){
			
			$query=$this->db->query("SELECT time,MAX(temperature) as maxtemperature,MIN(temperature) as mintemperature from tempt where time BETWEEN'$arr11'AND'$arr22' group by time");
			// var_dump($query);
			// die();
			return $query->result(); 
		}
		public function get_bing($arr1,$arr2){
			
			$query=$this->db->query("select time,temperature from tempt where time BETWEEN'$arr1'AND'$arr2'  group by time order by time");
			// var_dump($query);
			// die();
			return $query->result(); 
		}
		
		//SELECT MAX(temperature) FROM (select * from tempt where time like '1901-01-01%' ) AS table1
	
	
	}


?>