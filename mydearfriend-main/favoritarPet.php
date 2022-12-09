<?php include "sessionStart.php"?>

<?php 

	$uploadOk = 0;

    include_once('config.php');

    $sql = "SELECT * FROM adocao where id_Cliente = '{$_SESSION["id"]}' and id_Animal = '{$_GET['id']}'" ;

    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);

    $idInserido = isset($row['id_Adocao']) ? $row['id_Adocao'] : '';

    if($idInserido == ''){

		mysqli_query($link, "INSERT INTO adocao(id_Cliente,id_Animal) 
            VALUES ('{$_SESSION["id"]}','{$_GET['id']}')");

		$uploadOk = 1;

	}else{
		mysqli_query($link, "DELETE FROM adocao where id_Cliente = '{$_SESSION["id"]}' and id_Animal = '{$_GET['id']}'");
		$uploadOk = 2;
	}

	$data = [ 'sucesso' => $uploadOk ];
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode($data);
?>