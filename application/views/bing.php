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
				 <li><a id="tu">曲线走势</a></li> 
				 <li><a href="index.php/user/specific">温度阈值</a></li> 
				 <li><a href="">天气预报</a></li> 
				 <li><a class="selected1">温度比例</a></li> 
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
	 $.post("http://localhost/temp2/index.php/user/do_bing",data,function(data){ 
	chart1.hideLoading();
           var a=0;
           var b=0;
           var c=0;
           var d=0;
           var e=0;
           var f=0;
		 for(var i=0;i<data.length;i++){
						 
			  if(parseInt(data[i].temperature)<parseInt(-200)){
			  	
				 a=a+1;
			 /*$("tr td:nth-child(2):contains('"+data[i].temperature+"')").parent().css("background","red");*/
			 }else if(parseInt(data[i].temperature)<parseInt(-100) && parseInt(data[i].temperature)>parseInt(-200)) {
			     b=b+1;
			 }else if(parseInt(data[i].temperature)<parseInt(0) && parseInt(data[i].temperature)>parseInt(-100)) {
			     c=c+1;
			 }else if(parseInt(data[i].temperature)<parseInt(100) && parseInt(data[i].temperature)>parseInt(0)) {
			     d=d+1;
			 }else if(parseInt(data[i].temperature)<parseInt(200) && parseInt(data[i].temperature)>parseInt(100)) {
			     e=e+1;
			 }
			 else if(parseInt(data[i].temperature)>parseInt(200)) {
			     f=f+1;
			 }
			 
		 
		 } 
	    chart1.setOption({
	    	 title : {
        text: '温度比例显示',
        subtext: '纯属虚构',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['温度小于-200','温度在-200到-100','温度在-100到0','温度在100到200','温度大于200']
    },
    series : [
        {
            name: '访问来源',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:[
                {value:a, name:'温度小于-200'},
                {value:b, name:'温度在-200到-100'},
                {value:c, name:'温度在-100到0'},
                {value:d, name:'温度在0到100'},
                {value:e, name:'温度在100到200'},
                {value:f, name:'温度大于200'}
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]

    }); 
  },'json');
 });
</script>
</body>