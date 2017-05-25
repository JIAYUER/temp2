
	
		var oSel4 = document.getElementById("sel4");
		var oSel5 = document.getElementById("sel5");
		var oSel6 = document.getElementById("sel6");
		var oTimer2 = document.getElementById("timer2");
       function creatDate(){
		//生成1900年-2100年
		for(var i = 1900; i<=1910;i++){
		 var option = document.createElement('option');
		 option.setAttribute('value',i);
		 option.innerHTML = i;
		 oSel4.appendChild(option);
		}
		//生成1月-12月
		for(var i = 1; i <=12; i++){
		 var option = document.createElement('option');
		 option.setAttribute('value',i);
		 option.innerHTML = i;
		 oSel5.appendChild(option); 
		}
	 //生成1日—31日
		 for(var i = 1; i <=31; i++){
		  var option = document.createElement('option');
		  option.setAttribute('value',i);
		  option.innerHTML = i;
		 oSel6.appendChild(option); 
		 }	
		 
		 for(var i = 1; i <=24; i++){
		 var option = document.createElement('option');
		 option.setAttribute('value',i);
		 option.innerHTML = i;
		 oTimer2.appendChild(option); 
		}
}
	
	creatDate();
	//保存某年某月的天数
	var days;
	//年份点击
	oSel4.onclick = function(){//实现必须从年开始选择---------
		//月份显示默认值
		
		oSel5.options[0].selected = true;
		//天数显示默认值
		oSel6.options[0].selected = true;
	};
	//月份点击
	oSel5.onclick = function(){
		//天数显示默认值
		oSel6.options[0].selected = true;
		//计算天数的显示范围
		
		//如果是2月
		if(oSel5.value == 2){
		    //如果是闰年
		    if((oSel4.value % 4 === 0 && oSel4.value % 100 !== 0)  || oSel4.value % 400 === 0){
		        days = 29;
		    //如果是平年
		    }else{
		        days = 28;
		    }
		//如果是第4、6、9、11月
		}else if(oSel5.value == 4 || oSel5.value == 6 ||oSel5.value == 9 ||oSel5.value == 11){
		    days = 30;
		}else{
		    days = 31;
		}
		//增加或删除天数
		//如果是28天，则删除29、30、31天(即使他们不存在也不报错)
		if(days == 28){
			oSel6.remove(31);
			oSel6.remove(30);
			oSel6.remove(29);
		}
		//如果是29天
		if(days == 29){
			oSel6.remove(31);
			oSel6.remove(30);
			//如果第29天不存在，则添加第29天
			if(!oSel6.options[29]){
				oSel6.add(new Option('29','29'),undefined);//Option(文本,value)
			}
		}
		//如果是30天
		if(days == 30){
			oSel6.remove(31);
			//如果第29天不存在，则添加第29天
			if(!oSel6.options[29]){
				oSel6.add(new Option('29','29'),undefined);
			}
			//如果第30天不存在，则添加第30天
			if(!oSel6.options[30]){
				oSel6.add(new Option('30','30'),undefined);
			}
		}
		//如果是31天
		if(days == 31){
			//如果第29天不存在，则添加第29天
			if(!oSel6.options[29]){
				oSel6.add(new Option('29','29'),undefined);
			}
			//如果第30天不存在，则添加第30天
			if(!oSel6.options[30]){
				oSel6.add(new Option('30','30'),undefined);
			}
			//如果第31天不存在，则添加第31天
			if(!oSel6.options[31]){
				oSel6.add(new Option('31','31'),undefined);
			}
		}
	};
	

