window.onload = function () {
	var all = document.getElementById('all');
	var fm = document.getElementsByTagName('form')[0];
	all.onclick = function () {
		//form.elements獲取表單內所有表單
		//checked表示已選
		for (var i=0;i<fm.elements.length;i++) {
			if (fm.elements[i].name!='chkall') { 	//除去全選的那一欄甭算
				fm.elements[i].checked = fm.chkall.checked;
			}
		}
	};
	fm.onsubmit = function () {
		if (confirm('確定要刪除這些訊息？')) {
			return true;
		} 
		return false;
	};
};