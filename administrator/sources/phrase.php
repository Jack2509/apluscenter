<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "phrase/items";
		break;
	case "add":
		$template = "phrase/item_add";
		break;
	case "edit":
		get_item();
		$template = "phrase/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
		
	default:
		$template = "index";
}


function get_items(){
	global $d, $items, $totalRows,$pageSize,$url_link,$offset;
	
	if(!empty($_POST)){
		$multi=$_REQUEST['multi'];
		$id_array=$_POST['iddel'];
		$count=count($id_array);
		
		if($multi=='del'){
			for($i=0;$i<$count;$i++){							
				$sql = "delete from table_phrase where id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");
			}
			redirect("index.php?com=phrase&act=man");			
		}				
	}
	
	
	$sql="SELECT count(id) AS numrows FROM #_phrase";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=30;
	$offset=5;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_phrase order by id desc limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();	
	$url_link='index.php?com=phrase&act=man';		
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=phrase&act=man");
	
	$sql = "select * from #_phrase where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=phrase&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d,$config;
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=phrase&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		$id =  themdau($_POST['id']);

		$data_lang = array();
		foreach($_POST['phrase_mean'] as $k=>$v){
			foreach($v as $k2=>$v2){
				$data_lang[$k2][$k] = ($v2);
			}
		}
		foreach($data_lang as $k=>$v){
			$data[$k] = mysql_real_escape_string(json_encode($v));
		}
		$data['phrase'] = $_POST['phrase'];	

		$d->setTable('phrase');
		$d->setWhere('id', $id);
		if($d->update($data)){
			header("Location:index.php?com=phrase&act=man");
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=phrase&act=man");
	}else{ // them moi
		$data_lang = array();
		foreach($_POST['phrase_mean'] as $k=>$v){
			foreach($v as $k2=>$v2){
				$data_lang[$k2][$k] = ($v2);
			}
		}
		foreach($data_lang as $k=>$v){
			$data[$k] = mysql_real_escape_string(json_encode($v));
		}
		$data['phrase'] = $_POST['phrase'];

		$d->setTable('phrase');
		if($d->insert($data)){
			redirect("index.php?com=phrase&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=phrase&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		// xoa item
		$sql = "delete from #_phrase where id='".$id."'";
		if($d->query($sql))
			header("Location:index.php?com=phrase&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=phrase&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=phrase&act=man");
}


?>