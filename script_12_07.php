<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>View My Blog</title>
</head>
<body>
<?php // Script 12.7 - view_blog.php 
/* This script retrieves blog entries from the database. */
// Login here
?>


<?php
// Connect and select:
$dbc = mysql_connect('localhost','root', "");
mysql_select_db('myblog');
	
// Define the query:
$query = 'SELECT * FROM entries ORDER BY date_entered DESC';
	
if ($r = mysql_query($query)) { // Run the query.

	// Retrieve and print every record:
	while ($row = mysql_fetch_array($r)) {
		print "<p> Date originally entered:{$row ['date_entered']} Entry ID is: {$row [entry_id]} <h3>{$row['title']}</h3> 
		
		{$row['entry']}  <br />
		<a href=\"script_12_09.php?id={$row['entry_id']}\">Edit</a>
		<a href=\"script_12_08.php?id={$row['entry_id']}\">Delete</a>
		<a href=\"script_12_06.php?id={$row['entry_id']}\">New Entry</a>
		</p><hr />\n";
	}

} else { // Query didn't run.
	print '<p style="color: red;">Could not retrieve the data because:<br />' . mysql_error() . '.</p><p>The query being run was: ' . $query . '</p>';
} // End of query IF.

mysql_close(); // Close the database connection.

?>
</body>
</html>