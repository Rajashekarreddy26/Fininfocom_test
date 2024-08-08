// Task Submit funtion.
function taskSubmit() {
	var params = $('#to_do_list_add_form').serializeArray();
	$.post(WEB_ROOT+"ToDoList/taskSubmit", params, function (data) {
		var ar = JSON.parse(data);
		for (var i = 0; i < ar.length; i++) {
			console.log(ar[i].err_code);
			console.log(ar[i].html_code);
			if (ar[i].err_code == 1) {
				$('#to_do_form').html(ar[i].html_code);
			}
			else {
				$('#list_body').html(ar[i].html_code);
			}
		}
	});
}

// Task delete function
function taskDelete(id){
	if(confirm('Are you sure, you want to delete this task from To Do List ?'))
	{
		$.post(WEB_ROOT+"ToDoList/taskDelete",{'id' : id}, function(data) {
			$('#list_body').html(data);
		});
	}
}

// Task edit function
function taskEdit(id) {
	$.post(WEB_ROOT+"ToDoList/taskEdit", {'id' : id}, function (data) {
		$('#to_do_form').html(data);
	});
}

// Task Update function
function taskUpdate() {
	var params = $('#to_do_list_edit_form').serializeArray();
	$.post(WEB_ROOT+"ToDoList/taskUpdate", params, function (data) {
		var ar = JSON.parse(data);
		for (var i = 0; i < ar.length; i++) {
			console.log(ar[i].err_code);
			console.log(ar[i].html_code);
			if (ar[i].err_code == 1) {
				$('#to_do_form').html(ar[i].html_code);
			}
			else {
				$('#list_body').html(ar[i].html_code);
			}
		}
	});
}