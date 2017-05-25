		var oSel11 = document.getElementById("sel11");
		var oSel22 = document.getElementById("sel22");
		var oSel33 = document.getElementById("sel33");
		var oTimer3 = document.getElementById("timer3");
       function creatDate(){
		//生成1900年-2100年
		for(var i = 1900; i<=1910;i++){
		 var option = document.createElement('option');
		 option.setAttribute('value',i);
		 option.innerHTML = i;
		 oSel11.appendChild(option);
		}
		//生成1月-12月
		for(var i = 1; i <=12; i++){
		 var option = document.createElement('option');
		 option.setAttribute('value',i);
		 option.innerHTML = i;
		 oSel22.appendChild(option); 
		}
	 //生成1日—31日
		 for(var i = 1; i <=31; i++){
		  var option = document.createElement('option');
		  option.setAttribute('value',i);
		  option.innerHTML = i;
		 oSel33.appendChild(option); 
		 }	
		 
		 for(var i = 1; i <=24; i++){
		 var option = document.createElement('option');
		 option.setAttribute('value',i);
		 option.innerHTML = i;
		 oTimer3.appendChild(option); 
		}
}
	
	creatDate();
	//保存某年某月的天数
	var days;
	//年份点击
	oSel11.onclick = function(){//实现必须从年开始选择---------
		//月份显示默认值
		
		oSel22.options[0].selected = true;
		//天数显示默认值
		oSel33.options[0].selected = true;
	};
	//月份点击
	oSel22.onclick = function(){
		//天数显示默认值
		oSel33.options[0].selected = true;
		//计算天数的显示范围
		
		//如果是2月
		if(oSel22.value == 2){
		    //如果是闰年
		    if((oSel11.value % 4 === 0 && oSel11.value % 100 !== 0)  || oSel11.value % 400 === 0){
		        days = 29;
		    //如果是平年
		    }else{
		        days = 28;
		    }
		//如果是第4、6、9、11月
		}else if(oSel22.value == 4 || oSel22.value == 6 ||oSel22.value == 9 ||oSel22.value == 11){
		    days = 30;
		}else{
		    days = 31;
		}
		//增加或删除天数
		//如果是28天，则删除29、30、31天(即使他们不存在也不报错)
		if(days == 28){
			oSel33.remove(31);
			oSel33.remove(30);
			oSel33.remove(29);
		}
		//如果是29天
		if(days == 29){
			oSel33.remove(31);
			oSel33.remove(30);
			//如果第29天不存在，则添加第29天
			if(!oSel33.options[29]){
				oSel33.add(new Option('29','29'),undefined);//Option(文本,value)
			}
		}
		//如果是30天
		if(days == 30){
			oSel33.remove(31);
			//如果第29天不存在，则添加第29天
			if(!oSel33.options[29]){
				oSel33.add(new Option('29','29'),undefined);
			}
			//如果第30天不存在，则添加第30天
			if(!oSel33.options[30]){
				oSel33.add(new Option('30','30'),undefined);
			}
		}
		//如果是31天
		if(days == 31){
			//如果第29天不存在，则添加第29天
			if(!oSel33.options[29]){
				oSel33.add(new Option('29','29'),undefined);
			}
			//如果第30天不存在，则添加第30天
			if(!oSel33.options[30]){
				oSel33.add(new Option('30','30'),undefined);
			}
			//如果第31天不存在，则添加第31天
			if(!oSel33.options[31]){
				oSel33.add(new Option('31','31'),undefined);
			}
		}
	};