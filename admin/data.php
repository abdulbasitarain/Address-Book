
<?php
define('db_server', 'localhost');
define('db_user', 'root');
define('db_pass', '');
define('db_name', 'address_book');


$con = mysqli_connect(db_server, db_user, db_pass, db_name);

if ($con === false) {
     die(mysqli_connect_error());
} else {
     //   echo "Connection Success";
}
?>
