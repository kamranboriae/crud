<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'crud';
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        // If there is an error with the connection, stop the script and display the error.
        die ('Failed to connect to database!');
    }
}

function template_header($title) {
    echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="assets/css/styles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="assets/fontawsome/css/all.min.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>Crud Opertion</h1>
            <a href="index.php">Home</a>
    		<a href="read.php">Contacts</a>
    	</div>
    </nav>
EOT;
}

function template_footer() {
    echo <<<EOT
    </body>
</html>
EOT;
}
?>