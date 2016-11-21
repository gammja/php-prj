$host="127.0.0.1";
$port=60000;
$socket="";
$user="sprudnikov";
$password="";
$dbname="php-prj";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();
