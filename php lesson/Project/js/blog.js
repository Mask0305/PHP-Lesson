window.onload = function(){
	var message = document.getElementsByName('message');
	for (var i=0;i<message.length;i++){
		message[i].onclick = function(){
			centerWindow('message.php?id='+this.title,'message',250,500);
		};
	}
};



function centerWindow(url,name,height,width){
	var left = (screen.width - width) / 2;
	var top = (screen.height - height) / 2;
	window.open(url,name,'height='+height+',width='+width+',top='+top+',left='+left);

}