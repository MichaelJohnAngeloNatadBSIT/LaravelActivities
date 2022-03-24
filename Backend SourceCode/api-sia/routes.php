<?php 
	require_once("./config/Config.php");
	require_once("./modules/Procedural.php");
	require_once("./modules/Global.php");
	require_once("./modules/Get.php");
	require_once("./modules/Post.php");

	$db = new Connection();
	$pdo = $db->connect();
	$get = new Get($pdo);
	$post = new Post($pdo);

	if (isset($_REQUEST['request'])) {
		$req = explode('/', rtrim($_REQUEST['request'], '/'));
	} else {
		$req = array("errorcatcher");
	}

	switch($_SERVER['REQUEST_METHOD']) {
		case 'POST':
			$d = json_decode(file_get_contents("php://input"));
			switch ($req[0]) {
				case 'getstudents':
					if (sizeof($req)>1) {
						echo json_encode($get->getStudents($req[1]));
					} else {
						echo json_encode($get->getStudents(null));
					}
					
				break;

				case 'addstudent':
					echo json_encode($post->addStudent($d));
				break;

				case 'updatestudent':
					echo json_encode($post->updateStudent($d, $req[1]));
				break;
				
				default:
					echo errmsg(400);
				break;
			}
		break;
		default:
			echo errmsg(403);
	}
?>