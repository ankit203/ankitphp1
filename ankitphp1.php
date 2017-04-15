<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php
function OpenCon()
 {
echo "<b>Inside Openconn ". date("Y") ."</b>";
 $dbhost = "bluemix-sandbox-dal-9-portal.8.dblayer.com";
 $dbuser = "admin";
 $dbpass = "";
 $db = "bmix-dal-yp-d5d8d46f-6694-41db-8193-ddf5bdec3682";

  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }

$conn = OpenCon();

echo "<br>"."Connected Successfully to mysql";

$sql = "SELECT id,sal, fname, lname FROM employee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>"."id:".$row["id"]." - sal: " . $row["sal"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
    }
} else {
    echo "0 results";
}

CloseCon($conn);

?>
<br>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload (max sie 500kb - Only jpg,jpeg,png permitted):
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php
echo "<br>";
echo "<br>";
$_SESSION["favcolor"] = "yellow";
print_r($_SESSION);echo "<br>";
echo $_SERVER['SERVER_NAME'];echo "<br>";
echo $_SERVER['HTTP_HOST'];echo "<br>";
echo $_SERVER['SCRIPT_NAME'];echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];echo "<br>";
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>

</body>
</html>
