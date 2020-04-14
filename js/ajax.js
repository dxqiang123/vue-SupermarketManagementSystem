;(function(){
	window.ajax = function(option) {
		// 设置默认为 get请求
		option.type = option.type || 'get';
		
		// 设置默认的响应数据为json
		option.dataType = option.dataType || 'json';
		
		var ajax = new XMLHttpRequest();
		ajax.open(option.type, option.url);
		
		// 如果是POST请求，需要设置请求头和发送数据
		if(option.type === 'post') {
			ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			ajax.send(option.data);
		}else{
			ajax.send();
		}
		
		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				var data = ajax.responseText;
				if(option.dataType === 'json') {
					data = JSON.parse(data);
				}
				option.success(data);
			}
		}
	}
})();