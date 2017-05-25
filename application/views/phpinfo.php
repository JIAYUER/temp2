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
				 <li><a id="three" class="selected1">天气预报</a></li> 
				 <li><a href="">台风海洋</a></li> 
				 <li>环境气象</li> 
				 <li>农业气象</li> 
				 <li>水文地质</li> 
				 <li>数值预报</li>
			</ul> 
		</div>
	<input type="hidden" value="<?php echo $this->input->get("sel11");?>" id="sel11">
	<input type="hidden" value="<?php echo $this->input->get("sel22");?>" id="sel22">
	<input type="hidden" value="<?php echo $this->input->get("sel33");?>" id="sel33">
	<input type="hidden" value="<?php echo $this->input->get("timer3");?>" id="timer3">

<div id="con1" style=" width:1350px; height:490px;"></div>
<script src="assets/js/echarts.min.js"></script>
<script src="assets/js/jquery.min.js"></script>	
<script type="text/javascript" charset="utf-8">

$(document).ready(function() { 
var chart1 = echarts.init(document.getElementById("con1"));

     var sel11=$('#sel11').val();
	 var sel22=$('#sel22').val();
	 var sel33=$('#sel33').val();
	 
	 var timer3=$('#timer3').val();
	 
	
	    // console.log(sel22);
	 var data={
	 	'sel11':sel11,
	 	'sel22':sel22,
	 	'sel33':sel33,
	 	
	 	'timer3':timer3
	 	
	 };
	 
	 $.post("http://localhost/temp2/index.php/user/do_newdemon",data,function(data){ 
	 	 var times = [];
		 var mintemptures = [];
		 var maxtemptures = [];
		 for(var i = 0;i < data.length; i++ ) {
		 	times.push(data[i].time);
		 	maxtemptures.push(data[i].maxtemperature);
		 	mintemptures.push(data[i].mintemperature);
		 	// console.log(mintemptures);
		 }
	chart1.setOption ({
    title: {
        text: '未来三天气温变化',
        subtext: '纯属虚构'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['最高气温','最低气温']
    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']},
            restore: {},
            saveAsImage: {}
        }
    },
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: times
    },
    yAxis: {
        type: 'value',
        axisLabel: {
            formatter: '{value} °C'
        }
    },
    series: [
        {
            name:'最高气温',
            type:'line',
            data:maxtemptures,
            markPoint: {
                data: [
                    {type: 'max', name: '最大值'},
                    {type: 'min', name: '最小值'}
                ]
            },
            markLine: {
                data: [
                    {type: 'average', name: '平均值'},
                    [{
                        symbol: 'none',
                        x: '90%',
                        yAxis: 'max'
                    }, {
                        symbol: 'circle',
                        label: {
                            normal: {
                                position: 'start',
                                formatter: '最大值'
                            }
                        },
                        type: 'max',
                        name: '最高点'
                    }]
                ]
            }
        },
        {
            name:'最低气温',
            type:'line',
            data:mintemptures,
            markPoint: {
                data: [
                   {type: 'max', name: '最大值'},
                    {type: 'min', name: '最小值'}
                ]
            },
            markLine: {
                data: [
                    {type: 'average', name: '平均值'},
                    [{
                        symbol: 'none',
                        x: '90%',
                        yAxis: 'max'
                    }, {
                        symbol: 'circle',
                        label: {
                            normal: {
                                position: 'start',
                                formatter: '最大值'
                            }
                        },
                        type: 'max',
                        name: '最高点'
                    }]
                ]
            }
        }
    ]
});
 },'json');  //不写默认就是text，即传回的data是字符串
}); 
</script>
</body>