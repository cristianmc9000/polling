<?php 
	

	function getScore (){
		require('conexion.php');
		$result = $conexion->query('SELECT *, UNIX_TIMESTAMP(`time`) AS `unix` FROM polling WHERE 1 ORDER BY time DESC LIMIT 1');
		$result = $result->fetch_all(MYSQLI_ASSOC);
		// echo json_encode($result);
		return $result;
	}
	

	//echo json_encode($result);
	if (isset($_POST['last'])) {
		set_time_limit(20); //Tiempo limite apropiado
		ignore_user_abort(false);
		//LOOP INFINITO
		while (true) {
			$score = getScore();
			// echo $score[0]['time'];
			if(isset($score[0]['unix']) && $score[0]['unix'] > $_POST['last']) {
				echo json_encode($score);
				break;
			}
			sleep(2); // para prevenir el flooding
		}
	}
	
?>