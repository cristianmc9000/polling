<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Long Polling</title>
</head>
<body>
	<div id="score"></div>

	<script>
		var last = 0; //última actualización del TIME
		function poll() {
			//form data
			var form = new FormData();
			form.append('last', last);
			fetch('score.php', {method:'post', body:form})
			.then(res => res.json())
			.then(data => {
				console.log(data)
				document.getElementById('score').innerHTML = `[${data[0].time}] ${data[0].home}-${data[0].away}`;
				last = data[0].unix;
				poll(); //loop itself
				// console.log(data);
			})
			.catch(err => {
				console.log('another one');
				poll();
			});
		}
		//GO !
		window.onload = poll;
	</script>
</body>
</html>