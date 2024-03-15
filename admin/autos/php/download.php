<?php

	 $codigo=$_GET['ruta'];
$root = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/assets/doc/$codigo/";
$file = basename($_GET['file']);
$path = $root.$file;
$type = '';
	
    if(!empty($file) && file_exists($path)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file");
        header("Content-Type: application/force-download");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($path);
        exit;
    }else{
        	print( '<script>alert("Este documento no ha sido cargado "  )
  </script> ');
   echo "<script>window.history.go(-1)</script>";
	
    }

?>
?>