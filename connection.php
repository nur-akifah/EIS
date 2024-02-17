<?php
//koneksi ke database
$serverName = "YY310001\GL_DATABASE";
$connectionInfo = array(
    "Database" => "GL6",
    "UID" => "sa",
    "pwd" => "ServicE@philips"
);
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (!$conn) {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}

// $serverName = "YY300596\SQLEXPRESS";
// $database = "Database_GL6";
// $uid = "";
// $pwd = "";
// $connectionInfo = array(
//     "UID" => $uid,
//     "PWD" => $pwd,

//     "Database" => $database,

//     "CharacterSet" => "UTF-8"
// );

// $connsqlserver = sqlsrv_connect($serverName, $connectionInfo);
// $params  = array();
// $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);


// if (!$connsqlserver) {
//     die(sqlsrv_errors("Error" + $connsqlserver));
// }

// if( $connsqlserver ) {

//     echo "Connection established.<br />";

// }else{

//     echo "Connection could not be established.<br />";

//     die( print_r( sqlsrv_errors(), true));
// }
