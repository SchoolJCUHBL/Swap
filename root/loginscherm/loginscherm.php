<?php
require_once($_SERVER['DOCUMENT_ROOT']."/global/HTMLtools.php");
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<link rel="stylesheet" type="text/css" href="/global/style.css">
<link rel="stylesheet" type="text/css" href="loginscherm.css">
<!--[if lt IE 9]>
<script
src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
<meta charset="utf-8">
<title>Informatica</title>

</head>
<body>
<br>
<div id="wrap">
<form name="login" method="post" action="login.php">
<table cellpadding="4" border="0">
   <tr>
      <td align="center" height="24" width="282">Gebruiker:</td>
      <td align="left" height="24" width="170">
 
       <input name="leerlingnummer" type="text"  type="hidden" value="">
 
     <tr>
          <td align="center" height="24" width="84">Inlogcode:</td>
          <td align="left" height="24" width="170">
            <input name="password" type="password" size="10">            </td>
        </tr>
        <tr>
          <td align="center"  width="84">           
                 </td>
          <td align="left" width="170"> <input type="submit" value="Login">      
</td>
    </tr>
  </table>
<br>
<br>
</form>
</div>
</body>
</html>