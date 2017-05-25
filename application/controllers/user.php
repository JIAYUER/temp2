<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('user_model');
			// $this->load->library('session');
		}
		
		
		public function demon(){
			//把view中的demon.php在浏览器上展示出来
			$this->load->view('demon.php');
		}
		
		public function do_demon(){
		
			$sel1=$this->input->post('sel1');
			$sel2=$this->input->post('sel2');
			$sel3=$this->input->post('sel3');
			$sel4=$this->input->post('sel4');
			$sel5=$this->input->post('sel5');
			$sel6=$this->input->post('sel6');
			$timer1=$this->input->post('timer1');
			$timer2=$this->input->post('timer2');
			$sort=$this->input->post('sort');
			
			//ajax中echo不是将值显示在页面上，而是返回给data即第三个参数
			$arr1="$sel1".'-'."$sel2".'-'."$sel3".' '."$timer1".':00:00';
		
			$arr2="$sel4".'-'."$sel5".'-'."$sel6".' '."$timer2".':00:00';
			
			
			
			    if($sort == 'nsort'||$sort == ''){
					$rs=$this->user_model->get_sel($arr1,$arr2);
				}else if($sort == 'upsort'){
					$rs=$this->user_model->get_selup($arr1,$arr2);
				}else if($sort == 'downsort'){
					$rs=$this->user_model->get_seldown($arr1,$arr2);
				}
				// echo $rs;
			
				//json是js对象的字符串表示法
				$jsonobj = json_encode($rs);    //对变量进行json编码
// 				
			    echo $jsonobj;
			
			
			//把view中的demon.php在浏览器上展示出来
			// $this->load->view('demon.php');
			
		}


		public function doo_demon(){
			$sel11=$this->input->post('sel11');
			$sel22=$this->input->post('sel22');
			$sel33=$this->input->post('sel33');
			$timer3=$this->input->post('timer3');
			$arr11="$sel11".'-'."$sel22".'-'."$sel33".' '."$timer3".':00:00';
			
			
			$rs=$this->user_model->get_sel11($arr11);
			
			
			$jsonobj1 = json_encode($rs);    //对变量进行json编码
				
			     echo $jsonobj1;
		}
		
		public function change(){
			
			
			
			$this->load->view('change.php');
		}
		public function specific(){
			//把view中的demon.php在浏览器上展示出来
			$this->load->view('specific.php');
		}
		
		public function phpinfo(){
			//把view中的demon.php在浏览器上展示出来
			$this->load->view('phpinfo.php');
		}
		
		public function do_newdemon(){
			$sel11=$this->input->post('sel11');
			$sel22=$this->input->post('sel22');
			$sel33=$this->input->post('sel33');
			$timer3=$this->input->post('timer3');
			$sel333=$sel33+2;
			$timer33=$timer3+14;
			// var_dump($sel333);
			// var_dump($timer33);
			// die();
			$arr11="$sel11".'-'."$sel22".'-'."$sel33".' '."$timer3".':00:00';
			$arr22="$sel11".'-'."$sel22".'-'."$sel333".' '."$timer33".':00:00';
			// var_dump($arr22);
			// die();
			// $arr22="$sel11".'-'."$sel22".'-'."$sel33+3".' '."$timer3".':00:00';
			
			$rs=$this->user_model->get_newsel($arr11,$arr22);
			
			
			
			$jsonobj1 = json_encode($rs);    //对变量进行json编码
				
			     echo $jsonobj1;
		}
		
		public function bing(){
			//把view中的demon.php在浏览器上展示出来
			$this->load->view('bing.php');
		}
		
		public function do_bing(){
		
			$sel1=$this->input->post('sel1');
			$sel2=$this->input->post('sel2');
			$sel3=$this->input->post('sel3');
			$sel4=$this->input->post('sel4');
			$sel5=$this->input->post('sel5');
			$sel6=$this->input->post('sel6');
			$timer1=$this->input->post('timer1');
			$timer2=$this->input->post('timer2');
			$sort=$this->input->post('sort');
			
			//ajax中echo不是将值显示在页面上，而是返回给data即第三个参数
			$arr1="$sel1".'-'."$sel2".'-'."$sel3".' '."$timer1".':00:00';
		
			$arr2="$sel4".'-'."$sel5".'-'."$sel6".' '."$timer2".':00:00';
			
			
			
			   
					$rs=$this->user_model->get_bing($arr1,$arr2);
				
	// echo $rs;
			
				//json是js对象的字符串表示法
				$jsonobj = json_encode($rs);    //对变量进行json编码
// 				
			    echo $jsonobj;
			
			
			//把view中的demon.php在浏览器上展示出来
			// $this->load->view('demon.php');
			
		}
	}
	
?>
