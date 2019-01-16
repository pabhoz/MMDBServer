<?php

require_once 'libs/Pahoz/MySQLiManager/MySQLiManager.php';
$db = new MySQLiManager('localhost','root','','mmdb');
$table = "Imagen";

if(isset($_GET["exec"])){
	if($_GET["exec"] != null && $_GET["exec"] != ""){
			switch ($_GET["exec"]){
				case "insert":
					if(!isset($_GET["name"]) ||
					!isset($_GET["type"]) ||
					!isset($_GET["size"]) ||
					!isset($_GET["file"])){
						die("DIE!!!!!!");
					}else{
						insert($_GET["name"],$_GET["type"],
						$_GET["size"],$_GET["file"]);
					}
				break;
				case "select":
					if(isset($_GET["id"])){
						select($_GET["id"]);
					}else{
						select();
					}
				break;
				case "delete":
					if(isset($_GET["id"])){
						del($_GET["id"]);
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
 print json_encode($r);
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