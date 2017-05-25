<base href="<?php echo site_url();?>">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
  <title>温度阈值</title>
<link rel="stylesheet" href="assets/css/header.css">
<link rel="stylesheet" href="assets/css/index.css">

<style type="text/css" media="screen">
    #box1{
		float:left;
		
	}
	#box2{
		float:left;
		margin-left:90px;
	}
	#button2{
		margin-left:90px;
		height:25px;
	}
	.threshold{
		width:300px;
		height:30px;
		float:left;
		margin-left:150px;
	}
	#result{
		width:250px;
		margin:auto;
	}
</style>
<body>
	<div class="header">
		<div class="wrapper">
            <a href="#" id="logo">
                <img src="assets/img/logo.jpg" alt=""/>
            </a>
            <ul id="nav">
	            <li>About</li>
	            <li class="selected">Services</li>
	            <li>Works</li>
	            <li>Blog</li>
	            <li>Contact Us</li>
            </ul>
            <div class="search">
                <input type="text" placeholder="search"/>
                <a id="btn-search" href="index.php/user/change"></a>
            </div>
        </div>
	</div>
	
	
	
	<div id="body">
	   <div id="navbar" class="menu"> 
			<ul> 
				 <li><a href="index.php/user/demon">首页</a></li> 
				 <li><a id="tu">曲线走势</a></li> 
				 <li><a class="selected1" href="index.php/user/specific">温度阈值</a></li> 
				 <li><a href="">天气预报</a></li> 
				 <li><a href="">台风海洋</a></li> 
				 <li>环境气象</li> 
				 <li>农业气象</li> 
				 <li>水文地质</li> 
				 <li>数值预报</li>
			</ul> 
		</div>
    <div class="wrapper">
			<h1 id="h1">Welcome to inquiry system</h1>
			
		  		<div id="box1">
		  			<div class="name1">
						起始时间：
					  </div>
			    	   
				 	 <select name="sel1" id="sel1">
					 	<option value="year">年</option>
					 </select>
					 <select name="sel2" id="sel2">
					    <option value="month">月</option>
					 </select>
					 <select name="sel3" id="sel3">
					 	<option value="day">日</option>
					 </select>
					 <select name="timer1" id="timer1">
					 	<option value="timer1">时</option>
					 </select>
			 <!-- <input id="result" type="submit" name="inquiry" value="查询"> --> 		 	
				</div>

	
				<div id="box2">
					<div class="name1">
						结束时间：
					  </div>
					 <select name="sel4" id="sel4">
					 	<option  value="year">年</option>
					 </select>
					 <select name="sel5" id="sel5">
					    <option value="month">月</option>
					 </select>
					 <select name="sel6" id="sel6">
					 	<option value="day">日</option>
					 </select>
					 <select name="timer2" id="timer2">
					 	<option value="timer2">时</option>
					 </select>
					 <!-- <input id="result" type="submit" name="inquiry" value="查询"> -->
				</div>
		   		<button id="button2" name="sub">查询</button>
		   <h2 id="h1">请输入你想要的阈值</h2>		
	   <div id="name"  class="threshold">
	
			 最小阈值:
	
	   	
		 <input type="text" name="min" id="min"/>
	   </div>
	   
	   <div id="name" class="threshold">
	   	
			 最大阈值:
		
	   	
		 <input type="text" name="max" id="max"/>
	   </div>
	
			   <div id="result">
				 <table border="0" cellspacing="5" cellpadding="5" id="test">
					
				 </table>
			   </div>
			   
	   	  
	   	  
	</div>	
	<script src="assets/js/jquery-1.11.3.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/date1.js"></script>
    <script src="assets/js/date2.js"></script>
    <script>
        $(function(){    //文档就绪函数，所有dom节点都解析后开始执行
			$('#button2').click(function(){
				 var sel1=$('#sel1').val();
				 var sel2=$('#sel2').val();
				 var sel3=$('#sel3').val();
				 var sel4=$('#sel4').val();
				 var sel5=$('#sel5').val();
				 var sel6=$('#sel6').val();
				 var timer1=$('#timer1').val();
				 var timer2=$('#timer2').val();
				 var max=$('#max').val();
				 var min=$('#min').val();
				
				 // console.log(sel1);
				 var data={
				 	'sel1':sel1,
				 	'sel2':sel2,
				 	'sel3':sel3,
				 	'sel4':sel4,
				 	'sel5':sel5,
				 	'sel6':sel6,
				 	'timer1':timer1,
				 	'timer2':timer2,
				 	
				 	
				 }
		
				    $.post("http://localhost/temp2/index.php/user/do_demon",data,function(data){
				    //$("#tu").attr("href","index.php/user/change?data="+data);
				    	$("#result table").empty("");
					
					 for(var i=0;i<data.length;i++){
						
						 if(parseInt(data[i].temperature)>max || parseInt(data[i].temperature)<min){
							var trTD="<tr style='background:#3ff;'><td>" + data[i].time +'&nbsp;&nbsp;'+"</td><td>" + data[i].temperature + "</td></tr>";
						 /*$("tr td:nth-child(2):contains('"+data[i].temperature+"')").parent().css("background","red");*/
						 }else{
						 	var trTD="<tr style='background:#63f;'><td>" + data[i].time +'&nbsp;&nbsp;'+"</td><td>" + data[i].temperature + "</td></tr>";
						 }
					 	 $("#result table").append(trTD);
					 
					 } 
				 },'json');  //不写默认就是text，即传回的data是字符串
			});
		});
    </script>
</body>
