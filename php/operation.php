<?php

require_once ("db.php");
require_once ("component.php");

$con = Createdb();

// create button click
if(isset($_POST['create'])){
	createData();
}

if(isset($_POST['update'])){
	UpdateData();
}

if(isset($_POST['delete'])){
	deleteRecord();
}



function createData(){
	$mediname = textboxValue("medi_name");
	$type = textboxValue("type");
	$price = textboxValue("m_price");

	if($mediname && $type && $price){

		$sql = "INSERT INTO medi (medi_name, type, price) 
		VALUES ('$mediname','$type','$price')";

		if(mysqli_query($GLOBALS['con'], $sql)){
			TextNode("success", "Record Successfully Inserted...!");
		}else{
			echo "Error";
		}

	}else{
		TextNode("error", "Provide Data in the Textbox");
	}
}

function textboxValue($value){
	$textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
	if(empty($textbox)){
		return false;
	}else{
		return $textbox;
	}
}


function TextNode($classname, $msg){
	$element = "<h6 class='$classname'>$msg</h6>";
	echo $element;
}



function getData(){
	$sql = "SELECT * FROM medi";

	$result = mysqli_query($GLOBALS['con'], $sql);

	if(mysqli_num_rows($result) > 0){
		return $result;
	}
}


function UpdateData(){
	$mediid = textboxValue("medicine_id");
	$mediname = textboxValue("medi_name");
	$type = textboxValue("type");
	$price = textboxValue("m_price");

	if($mediname && $type && $price){
		$sql = "
		UPDATE medi SET medi_name='$mediname', type = '$type', price = '$price' WHERE id='$mediid';                    
		";

		if(mysqli_query($GLOBALS['con'], $sql)){
			TextNode("success", "Data Successfully Updated");
		}else{
			TextNode("error", "Enable to Update Data");
		}

	}else{
		TextNode("error", "Select Data Using Edit Icon");
	}


}



function deleteRecord(){
	$mediid = (int)textboxValue("medicine_id");

	$sql = "DELETE FROM medi WHERE id=$mediid";

	if(mysqli_query($GLOBALS['con'], $sql)){
		TextNode("success","Record Deleted Successfully...!");
	}else{
		TextNode("error","Enable to Delete Record...!");
	}

}


function setID(){
	$getid = getData();
	$id = 0;
	if($getid){
		while ($row = mysqli_fetch_assoc($getid)){
			$id = $row['id'];
		}
	}
	return ($id + 1);
}