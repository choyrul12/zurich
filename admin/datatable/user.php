<?PHP error_reporting(0); ?>
<?php include("../../partial/dbinfo.php"); ?>
<?php
$table = 'tbuser';
$primaryKey = 'Id';

$columns = array(
    array( 'db' => 'Name', 'dt' => 0 ),
    array( 'db' => 'Phone',  'dt' => 1 ),
    array( 'db' => 'Email',  'dt' => 2 ),
    array( 'db' => 'IdAgen',   'dt' => 3 ),
    array(
        'db' => 'WebRegis',
        'dt' => 4,
        'formatter' => function( $d, $row ) {
            if($d == '0'){
                return "No";
            } else {
                return "Yes";
            }
        }
    ),
	array(
        'db' => 'Id',
        'dt' => 5,
        'formatter' => function( $d, $row ) {
			return "<a href = 'user_edit.php?Id=".$d."' target = 'newtab'>Edit</a>".
			"&nbsp;&nbsp;&nbsp;&nbsp;".
			"<a id = 'delbutton".$d."'>Delete</a>".
            "<script>".
            "$( '#delbutton".$d."' ).click(function() {".
                "var r = confirm('Are You Sure?');".
                "if (r == true) { ".
                    "window.open('process.php?action=1&Id=".$d."', '_blank');".
                "} else { ".
            
                "}".
            "});".
            "</script>";
        }
    ),
);

$whereAll = "Status = 'A'";

$sql_details = array(
    'user' => $db['username'],
    'pass' => $db['password'],
    'db'   => $db['db'],
    'host' => $db['host']
);
require( '../../partial/ssp.class.php' );
 
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, $whereAll )
);