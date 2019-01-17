<?php

require_once './headers.php';
require_once 'libs/Pahoz/MySQLiManager/MySQLiManager.php';
$db = new MySQLiManager('localhost','root','','mmdb');
$table = "Video";

if(isset($_GET["exec"])){
	if($_GET["exec"] != null && $_GET["exec"] != ""){
			switch ($_GET["exec"]){
				case "insert":
					if(!isset($_POST["name"]) ||
					!isset($_POST["type"]) ||
					!isset($_POST["size"]) ||
					!isset($_POST["file"])){
						die("DIE!!!!!!");
					}else{
						insert($_POST["name"],$_POST["type"],
						$_POST["size"],$_POST["file"]);
						
					}
				break;
				case "select":
					if(isset($_POST["id"])){
						select($_POST["id"]);
					}else{
						select();
					}
				break;
				case "delete":
					if(isset($_POST["id"])){
						del($_POST["id"]);
					}else{
						die("Falta el id a borrar");
					}
			}
		}else{
			die("La función <b>".$_GET['exec']."</b> no existe");
		}
}

function insert($name,$type,$size,$file){
	$imagen = ["id"=>null,"name"=>$name,"type"=>$type,"size"=>$size,"file"=>$file];
	global $db,$table;
	$r = $db->insert($table,$imagen);
	$respuesta = [
		"msj" => ($r) ? "Guardado correctamente" : "Error",
		"status" => ($r) ? 1 : 0
	];
	print(json_encode($respuesta));
}
function select($id = null){
	global $db,$table;
	$where = ($id != null) ? "`id` = $id":"";
	$fetch = $db->select("*",$table,$where);
	$fetch = ($fetch == NULL) ? [] : $fetch;
	print json_encode($fetch);	
}
function del($id){
	global $db, $table;
	$r = $db->delete($table,["id"=>$id]);
	print json_encode($r);	
}