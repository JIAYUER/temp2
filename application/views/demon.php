<base href="<?php echo site_url()?>">
  <title>首页</title>
<body>
	<style type="text/css" media="screen">
		#three,#bing{
			cursor: pointer;
		}
	</style>
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
				 <li><a href="index.php/user/demon" class="selected1">首页</a></li> 
				 <li><a id="tu">曲线走势</a></li> 
				 <li><a href="index.php/user/specific">温度阈值</a></li> 
				 <li><a id="three">天气预报</a></li> 
				 <li><a id="bing">温度比例</a></li> 
				 <li>环境气象</li> 
				 <li>农业气象</li> 
				 <li>水文地质</li> 
				 <li>数值预报</li> 
			</ul> 
		</div>
		<div class="wrapper">
			<h1 id="h1">Welcome to inquiry system</h1>
			<div id="region1">
			<h2 id="h21">
		  				区间查询
		  			</h2>
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
				</div>
		        <select name="sort" id="sort" value="按温度排序">
			  	    <option  value="nsort">未排序</option>
				 	<option  value="upsort">升序</option>
				 	<option  value="downsort">降序</option>
			    </select>
		   		<button id="button1" name="sub">查询</button>
	   
	   <!-- <div id="result1">
		 <table border="0" cellspacing="5" cellpadding="5">

		 </table>
	   </div> -->
			   <div id="result">
				 <table border="0" cellspacing="5" cellpadding="5">
					
				 </table>
			   </div>
			   <div class="box111">
		  
		       </div>
	   	  </div>
	   	  
	  <div id="region2">
    	            <h2 id="h22">
		  				时间查询
		  			</h2>
	        <div id="box3">
			  <select name="sel11" id="sel11">
			 	<option  value="year">年</option>
			  </select>
			  <select name="sel22" id="sel22">
			    <option value="month">月</option>
			  </select>
			  <select name="sel33" id="sel33">
			 	<option value="day">日</option>
			  </select>
			  <select name="timer3" id="timer3">
			 	<option value="timer3">时</option>
			  </select>
		   </div>
	      
	       <button id="button2">点这里</button>
	       <div id="result1">
				 <table border="0" cellspacing="5" cellpadding="5">	
				 </table>
				 
		   </div>
		   
		</div>    	  
	</div>	
	
    <div class="footer">
        <div class="wrapper">
            <ul>
                <li>Home</li>
                <li>About</li>
                <li>Services</li>
                <li>Work</li>
                <li>Blog</li>
                <li>Contact us</li>
            </ul>
            <a href="">© 2013 BlueBox.  All =Rights Reserved.</a>
            <p>The logos used in the design are the property of their respective owners / copyright holders.</p>

            <div class="share">
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
                <a href=""></a>
            </div>
        </div>
    </div>
 </div>

	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/index.css">
    <script src="assets/js/jquery.min.js"></script>	
	<script src="assets/js/date1.js"></script>
	<script src="assets/js/date2.js"></script>
	<script src="assets/js/date3.js"></script>
<script>
	  // var oResult = document.getElementById("result");
		$(function(){    //文档就绪函数，所有dom节点都解析后开始执行
			$('#button1').click(function(){
				 var sel1=$('#sel1').val();
				 var sel2=$('#sel2').val();
				 var sel3=$('#sel3').val();
				 var sel4=$('#sel4').val();
				 var sel5=$('#sel5').val();
				 var sel6=$('#sel6').val();
				 var timer1=$('#timer1').val();
				 var timer2=$('#timer2').val();
				 var sort=$('#sort').val();
				
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
				 	'sort':sort
				 }
				    
				 //ajax发送
				 //第一个参数传给控制器下的函数，
				 //第二个参数传得是数据，可以传两种类型，一个是字符串，一个是对象，
				 //第三个参数是异步回掉函数，data是php往回传得值，是个字符串
					
					
				    $.post("http://localhost/temp2/index.php/user/do_demon",data,function(data){
				    	$("#result table").empty("");	
					 for(var i=0;i<data.length;i++){
						 var trTD="<tr><td>" + data[i].time +'&nbsp;&nbsp;'+"</td><td>" + data[i].temperature + "</td></tr>";
					 	 $("#result table").append(trTD); 
					 }	 
				 },'json');  //不写默认就是text，即传回的data是字符串
			});
		});
		
		$("#tu").on('click',function(){
					 	 // var time=0;
					 	// for(var i=0;i<data.length;i++){
						 // time+=data[i].time;
// 					 	 
					 // }
				 var sel1=$('#sel1').val();
				 var sel2=$('#sel2').val();
				 var sel3=$('#sel3').val();
				 var sel4=$('#sel4').val();
				 var sel5=$('#sel5').val();
				 var sel6=$('#sel6').val();
				 var timer1=$('#timer1').val();
				 var timer2=$('#timer2').val();
				 var sort=$('#sort').val();
		
		 	$("#tu").attr("href","http://localhost/temp2/index.php/user/change?sel1="+sel1+"&sel2="+sel2+"&sel3="+sel3+"&sel4="+sel4+"&sel5="+sel5+"&sel6="+sel6+"&timer1="+timer1+"&timer2="+timer2+"&sort="+sort);
		  });
		
		$("#bing").on('click',function(){
					 
				 var sel1=$('#sel1').val();
				 var sel2=$('#sel2').val();
				 var sel3=$('#sel3').val();
				 var sel4=$('#sel4').val();
				 var sel5=$('#sel5').val();
				 var sel6=$('#sel6').val();
				 var timer1=$('#timer1').val();
				 var timer2=$('#timer2').val();
				 var sort=$('#sort').val();
		
		 	$("#bing").attr("href","http://localhost/temp2/index.php/user/bing?sel1="+sel1+"&sel2="+sel2+"&sel3="+sel3+"&sel4="+sel4+"&sel5="+sel5+"&sel6="+sel6+"&timer1="+timer1+"&timer2="+timer2+"&sort="+sort);
		  });
		
		$(function(){    //文档就绪函数，所有dom节点都解析后开始执行
			$('#button2').click(function(){ 
				 var sel11=$('#sel11').val();
				 var sel22=$('#sel22').val();
				 var sel33=$('#sel33').val();
				 var timer3=$('#timer3').val();
				 var data={
				 	'sel11':sel11,
				 	'sel22':sel22,
				 	'sel33':sel33,
				 	'timer3':timer3,
				 }
					// console.log(value1);
				    $.post("http://localhost/temp2/index.php/user/doo_demon",data,function(data){
				    	$("#result1 table").empty("");
				    	
				    // json.parse(data);
				    // var obj = eval ("(" + data + ")");
					 // console.info(data);
					 					 					
					 for(var i=0;i<data.length;i++){
						 var trTD1="<tr><td>" + data[i].time +'&nbsp;&nbsp;'+"</td><td>" + data[i].temperature + "</td></tr>";
					 	 $("#result1 table").append(trTD1);
					 }
					 
				 },'json');  //不写默认就是text，即传回的data是字符串
			});
			
			$("#three").on('click',function(){
					 	 // var time=0;
					 	// for(var i=0;i<data.length;i++){
						 // time+=data[i].time;
// 					 	 
					 // }
				 var sel11=$('#sel11').val();
				 var sel22=$('#sel22').val();
				 var sel33=$('#sel33').val();
			
			// console.log(sel333);
				 var timer3=$('#timer3').val();
				
				
		
		 	$("#three").attr("href","http://localhost/temp2/index.php/user/phpinfo?sel11="+sel11+"&sel22="+sel22+"&sel33="+sel33+"&timer3="+timer3);
		  });
		});
	</script>
	</body>
	
		
