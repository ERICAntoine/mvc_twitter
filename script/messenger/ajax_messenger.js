

var send = function() {

	var dest = $('#dest')[0].value;
	var msg = $('#inputMsg')[0].value;
	var id = $('#sendMsg')[0].value;
	var req = 'dest='+dest+'&content='+msg+'&id_sender='+id;
	console.log('send');

	$.ajax({

		url: 'script/messenger/send.php',
		type: 'POST',
		data: req,
		success: function(result) {
			console.log(1);
			$('#messengerBox').html(result)
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("Status: " + textStatus); alert("Error: " + errorThrown);
		}
	});

};

var conv = function() {

	var dest = $('#dest')[0].value;
	var id = $('#sendMsg')[0].value;
	var req = 'dest='+dest+'&id_sender='+id;

	$.ajax({

		url: 'script/messenger/printConv.php',
		type: 'POST',
		data: req,
		success: function(result) {
			$('#messengerBox').html(result)
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			alert("Status: " + textStatus); alert("Error: " + errorThrown);
		}
	});
};

window.onload = function() {
	console.log('send');


	conv();

	$('#sendMsg').click(function() {
		send();
		conv();
		contact();
	});

	$('#dest')[0].onkeyup = function() {
		conv();
	}

	var timer = setInterval(function () {conv();},30000);
	var timer2 = setInterval(function () {conv();},1000);

};
