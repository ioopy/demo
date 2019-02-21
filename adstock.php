<?php require_once('Connections/sp.php'); ?>
<?php include("uppicture.php"); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO product (prd_img, prd_name, prd_price, prd_detail) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['prdimg'], "text"),
                       GetSQLValueString($_POST['prdname2'], "text"),
                       GetSQLValueString($_POST['prdcost2'], "text"),
                       GetSQLValueString($_POST['prddetail2'], "text"));

  mysql_select_db($database_sp, $sp);
  $Result1 = mysql_query($insertSQL, $sp) or die(mysql_error());

  $insertGoTo = "adstock.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO product (prd_img, prd_name, prd_price, prd_detail) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString(uppic($_FILES['prdimg']), "text"),
                       GetSQLValueString($_POST['prdname'], "text"),
                       GetSQLValueString($_POST['prdcost'], "text"),
                       GetSQLValueString($_POST['prddetail'], "text"));

  mysql_select_db($database_sp, $sp);
  $Result1 = mysql_query($insertSQL, $sp) or die(mysql_error());

  $insertGoTo = "adstock.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_sp, $sp);
$query_recordinput = "SELECT * FROM product";
$recordinput = mysql_query($query_recordinput, $sp) or die(mysql_error());
$row_recordinput = mysql_fetch_assoc($recordinput);
$totalRows_recordinput = mysql_num_rows($recordinput);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
#box3 #boxdetail #tdet tr td div a {
	font-size: xx-large;
}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Newstock</title>
<link href="img.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">
body {
	background: url(adstock.jpg) no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	margin-left: 10px;
	margin-top: 0px;
	margin-right: 10px;
	margin-bottom: 0px;
}
#box2 {
	background-color: rgba(0, 0, 0, 0.75);
	padding: 1em;
	margin-right: auto;
	margin-left: auto;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	color: #999;
	text-align: left;
}
#box3 {
	margin-right: auto;
	margin-left: auto;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
#header {
	padding: 1em;
	margin-right: auto;
	margin-left: auto;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
#boxinput {
	height: 400px;
	margin-right: auto;
	margin-left: auto;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
#boxdetail {
	height: auto;
	margin-right: auto;
	margin-left: auto;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	background: center;
}
#left1 {
	float: none;
	height: 400px;
	width: 700px;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	text-align: left;
	margin-right: auto;
	margin-left: auto;
}
#right1 {
	float: right;
	height: 400px;
	width: 698px;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
#left2 {
	float: left;
	height: 400px;
	width: 200px;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
#l2 {
	float: left;
	height: 400px;
	width: 150px;
	border: 1px solid #6CF;
	background: rgba(0,0,102,0.85);
	text-align: right;
	color: #FFF;
	padding-right: 1.95pt;
}
#r2 {
	float: left;
	height: 400px;
	width: 150px;
	border: 2px solid #6CF;
	background: #69F;
}
#r2 {
	height: 400px;
	width: 150px;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	background: rgba(0,0,102,0.85);
	text-align: right;
	padding-right: 1.45pt;
	color: #FFF;
}
#l3 {
	float: right;
	height: 400px;
	width: 541px;
	border: 1px solid #FFC;
	background: rgba(206,242,247,0.85);
	text-align: left;
	padding-left: 0.1pt;
}
#r3 {
	float: right;
	height: 400px;
	width: 540px;
	border: 1px solid #FFC;
	background: rgba(206,242,247,0.85);
	text-align: left;
}
.btn {
	background-color: DodgerBlue;
	color: white;
	font-size: 16px;
	cursor: pointer;
	padding-top: 7px;
	padding-right: 5px;
	padding-bottom: 7px;
	padding-left: 5px;
	float: center;
	position: relative;
	width: 100px;
	margin-right: auto;
	margin-left: auto;
	text-align: center;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	left: auto;
	right: auto;
}

/* Darker background on mouse-over */
.btn:hover {
    background-color: RoyalBlue;
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	float: center;
}
.button4 {border-radius: 5px;}
#box3 #boxdetail #tdet tr {
}
#box3 #boxdetail #tdet tr {
	margin: auto;
}
#img{
	background: #0066FF;
	border: 1px solid #00ad2d;
	position: relative;
	color: #fff;
	border-radius: 2px;
	text-align: center;
	float: left;
	cursor: pointer;
	margin-right: auto;
	margin-left: auto;
	padding-top: 5px;
	padding-right: 10px;
	padding-bottom: 5px;
	padding-left: 10px;
	width: 200px;
}
.hide_file {
    position: absolute;
    z-index: 1000;
    opacity: 0;
    cursor: pointer;
    right: 0;
    top: 0;
    height: 100%;
    font-size: 24px;
    width: 100%;
    
}
</style>
</head>

<body >


<div id="box2">
<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-animate-left" style="display:none;z-index:5" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
  <a href="Admin.php" class="w3-bar-item w3-button">Link 1</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div>

<!-- Page Content -->
<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>


  <button class="w3-button w3-white w3-xxlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    
</div>
</div>
<div id="box3">
  <div id="header"></div>
  <div id="boxinput">
    <div id="left1">
      <div id="l3">
        <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form2" id="form2">
          <p><br />
            <label for="prdname"></label>
            <input type="text" name="prdname" id="prdname" />
            <br />
            <br />
            <label for="prdcost"></label>
            <input type="text" name="prdcost" id="prdcost" />
            <br />
            <br />
            <label for="prddetail"></label>
            <textarea name="prddetail" id="prddetail" cols="45" rows="5"></textarea>
            <br />
            <label for="prdimg"></label>
            <label for="prdimg"></label>
            <div id="img">
  Choose File
 <input type="file" name="prdimg" class="hide_file">
 <br />

          </div>
            <p>&nbsp;</p>
            <button class="btn"><i class="fa fa-save"></i> save</button>
            <br />
            <br>
            <br>
<br />
<input type="hidden" name="MM_insert" value="form2" />
</p>
        </form>
      </div>
      <div id="l2">
        <form id="form1" name="form1" method="post" action="">
          <br />
          Name: <br />
          <br />
          Cost: <br />
          <br />
          <br />
          <br />
Detail:<br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
        </form>
      </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <div id="dehead"></div>
</div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <div id="boxdetail">
    <p>&nbsp;</p>
    <table width="1408" height="169" border="0" align="center" id="tdet">
      <tr bgcolor="#CCCCCC">
        <th width="169" height="53" align="center" valign="middle" scope="col">NO.</th>
        <th width="301" scope="col">Product Name</th>
        <th width="201" scope="col">Product image</th>
        <th width="194" scope="col">Product Price</th>
        <th width="329" scope="col">Product detail</th>
        <th width="92" scope="col">Edit</th>
        <th width="92" scope="col">Delete</th>
      </tr>
      <?php do { ?>
        <tr bgcolor="#999999">
          <td align="center"><?php echo $row_recordinput['prd_id']; ?></td>
          <td align="center"><?php echo $row_recordinput['prd_name']; ?></td>
          <td align="center"><p><img src="picture/<?php echo $row_recordinput['prd_img']; ?>" width="63" height="71" /></p></td>
          <td align="center"><?php echo $row_recordinput['prd_price']; ?></td>
          <td align="center"><?php echo $row_recordinput['prd_detail']; ?></td>
          <td ><div align="center"><a href="editinfo.php?edit=<?php echo $row_recordinput['prd_id']; ?>"><i class="fa fa-edit"></i></a></div></td>
          <td><div align="center"><a href="Delete.php?prd_id=<?php echo $row_recordinput['prd_id']; ?>"><i class="fa fa-trash"></i></a></div></td>
        </tr>
        <?php } while ($row_recordinput = mysql_fetch_assoc($recordinput)); ?>
    </table>
    <p>&nbsp;</p>
  </div>
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  
</div>
<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
</body>
</html><?php
mysql_free_result($recordinput);
?>
