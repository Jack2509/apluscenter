<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$pid=(int)$_REQUEST['pid'];

switch($act){
	case "man":
		get_items();
		$template = "comment/items";
		break;
	case "add":
		$template = "comment/item_add";
		break;
	case "edit":
		get_item();
		$template = "comment/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		del_item();
		break;
		
	default:
		$template = "index";
}
// function fns_Rand_digit($min,$max,$num)
// 	{
// 		$result='';
// 		for($i=0;$i<$num;$i++){
// 			$result.=rand($min,$max);
// 		}
// 		return $result;	
// 	}

function get_items(){
	global $d, $items;
	
	##
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_comment where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_comment SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_comment SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	$sql = "select * from #_comment where pid=0";
	$sql.=" order by ngaydang desc";
	
	$d->query($sql);
	$items = $d->result_array();



	$sqlUPDATE_ORDER = "UPDATE table_comment SET view =1 ";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

}

function get_item(){
	global $d, $item;
	
	$id= addslashes($_GET['id']);
	$sql = "select * from #_comment where id=$id";
	$d->query($sql);
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	
	$id= addslashes($_POST['id']);
	$file_name=fns_Rand_digit(0,9,5);
	if($id){
		if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=comment&act=man");
		
		$data['pid'] = (int)$_POST['pid'];
		$data['hoten'] = $_POST['hoten'];
		$data['diachi'] = $_POST['diachi'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['email'] = $_POST['email'];
		$data['noidung'] = $_POST['noidung'];
		
		$data['ngaydang'] = time();
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->reset();
		$d->setTable('comment');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=comment&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=comment&act=man");
	}
	else{
		$data['pid'] = (int)$_POST['pid'];
		$data['hoten'] = $_POST['hoten'];
		$data['diachi'] = $_POST['diachi'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['email'] = $_POST['email'];
		$data['noidung'] = $_POST['noidung'];
		
		$data['ngaydang'] = time();
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('comment');
		if($d->insert($data))
		{			
			redirect("index.php?com=comment&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=comment&act=man");
	}
}

function del_item()
{
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select pid from #_comment where id='$id'";
		$d->query($sql);
		$ck=$d->fetch_array();
		if($ck['pid']>0)
		{
			$d->reset();
			$sql = "delete from #_comment where id='".$id."'";
		}
		else
		{
			$d->reset();
			$sql = "delete from #_comment where id='".$id."' or pid='".$id."'";
		}

		if($d->query($sql))
			redirect("index.php?com=comment&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=comment&act=man");
	}
}
?>