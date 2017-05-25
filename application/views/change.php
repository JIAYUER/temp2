	<base href="<?php echo site_url()?>">
	  <title>曲线走势</title>
	<link rel="stylesheet" href="assets/css/header.css">
	<link rel="stylesheet" href="assets/css/index.css">
	<style type="text/css" media="screen">
	*{
		margin:0;
		padding:0;
	}
	body{
		background:#ff8888;
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
				 <li><a id="tu" class="selected1">曲线走势</a></li> 
				 <li><a href="index.php/user/specific">温度阈值</a></li> 
				 <li><a href="">天气预报</a></li> 
				 <li><a href="">台风海洋</a></li> 
				 <li>环境气象</li> 
				 <li>农业气象</li> 
				 <li>水文地质</li> 
				 <li>数值预报</li> 
			</ul> 
		</div>
	
	

	
	<input type="hidden" value="<?php echo $this->input->get("sel1");?>" id="sel1">
	<input type="hidden" value="<?php echo $this->input->get("sel2");?>" id="sel2">
	<input type="hidden" value="<?php echo $this->input->get("sel3");?>" id="sel3">
	<input type="hidden" value="<?php echo $this->input->get("sel4");?>" id="sel4">
	<input type="hidden" value="<?php echo $this->input->get("sel5");?>" id="sel5">
	<input type="hidden" value="<?php echo $this->input->get("sel6");?>" id="sel6">
	<input type="hidden" value="<?php echo $this->input->get("timer1");?>" id="timer1">
	<input type="hidden" value="<?php echo $this->input->get("timer2");?>" id="timer2">
	<input type="hidden" value="nsort" id="sort">

    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->

    <div id="con1" style=" width:1350px; height:490px;"></div>
    <!-- 引入 echarts.js -->
    <script src="assets/js/echarts.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>	

    <script type="text/javascript"> 
    $(document).ready(function() { 
        
        var chart1 = echarts.init(document.getElementById("con1")); //基于准备好的dom,初始化接口，返回ECharts实例 

	 chart1.showLoading();
	

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
	 };
	// series[i]-line.smooth
	$.post("http://localhost/temp2/index.php/user/do_demon",data,function(data){ 
	chart1.hideLoading();

		 var times = [];
		 var temptures = [];
		 for(var i = 0;i < data.length; i++ ) {
		 	times.push(data[i].time);
		 	temptures.push(data[i].temperature);
		 }
		  // 填入数据
		  // 设置图表实例的配置项以及数据，万能接口，所有参数和数据的修改都可以通过setOption完成
	    chart1.setOption({
	    	title: {
	        text: '您查询的图像为:'
	    },
	   
	    legend: {
	        data:['温度显示']
	    },
	        xAxis: {
	        	boundaryGap: false,
	            data: times
	        },
	        yAxis: {},
	        series: [{
	            // 根据名字对应到相应的系列
	            name: '销量',
	            type: 'line',
	            data: temptures,
	            smooth: true,//平滑曲线
	            itemStyle : {  
                                normal : {  
                                    color:'#00FF00',  //点颜色
                                    lineStyle:{  
                                        color:'#0044bb'  //线颜色
                                    }  
                                }  
                            },
	            markPoint:{  
	            	data:[
	            	{type:'max',name:'最大值'},
	            	{type:'min',name:'最小值'}
	            	]
	            }
	        }]
	    });
	    
	 },'json');  //不写默认就是text，即传回的data是字符串

    }); 
</script>
</body>