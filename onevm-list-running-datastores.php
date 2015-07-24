<?php

/*
	Script by sgregori - PODEMOS

	written for datastore listing of current running vm's

	requires one vm - open nebula

*/

exec('onevm list --csv |grep runn',$lines);

foreach ($lines as $line){

	$partes = explode(',' , $line);

	if($partes[0]>=1){

	echo "VM ID: ".$partes[0]." | NAME: ".$partes[3]." | DATASTORE_NAME: ";

	$datastore = exec("onevm show ".$partes[0]." --xml |grep DATASTORE\>" );

	$datastore = trim($datastore);

	$datastore = str_replace("<DATASTORE><![CDATA[","",$datastore);
	
	$datastore = str_replace("]]></DATASTORE>","",$datastore);

	echo $datastore."\n\n";

	}

}


?>

