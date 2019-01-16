<?php

require_once 'libs/Pahoz/MySQLiManager/MySQLiManager.php';
$db = new MySQLiManager('localhost','root','','mmdb');
$table = "Imagen";

if(isset($_GET["exec"])){
	if($_GET["exec"] != null && $_GET["exec"] != ""){
		if(function_exists($_GET["exec"])){
			switch ($_GET["exec"]){
				case "insert":
					if(!isset($_GET["name"]) ||
					!isset($_GET["type"]) ||
					!isset($_GET["size"]) ||
					!isset($_GET["file"])){
						die("DIE!!!!!!");
					}else{
						$_GET["exec"]($_GET["name"],
						$_GET["type"],
						$_GET["size"],
						$_GET["file"]);
					}
				break;
				default:
					$_GET["exec"]();
				break;
			}
		}else{
			die("La función <b>".$_GET['exec']."</b> no existe");
		}
	}
}

function insert($name,$type,$size,$file){
 $imagen = ["id"=>null,"name"=>$name,"type"=>$type,"size"=>$size,"file"=>$file];
 global $db,$table;
 $r = $db->insert($table,$imagen);
 return $r;
}

function selectAll(){
	global $db,$table;
	$fetch = $db->select("*",$table);
	$fetch = ($fetch == NULL) ? [] : $fetch;

	echo "<pre>";
	foreach($fetch as $key => $registro){
		print_r($registro);	
	}
	echo "</pre>";
}

function holi(){
	echo "Holi";
}