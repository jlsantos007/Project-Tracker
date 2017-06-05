<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$db_name    = "orangeapps_issue_ticketing_db";

$output  = '';
$conn    = mysqli_connect($servername, $username, $password, $db_name);
$query   = "SELECT * FROM issue_tbl WHERE id = '".$_POST['id']."'";
$result  = mysqli_query($conn, $query);
$output .= '
  <div class="table_responsive">
    <table class="table table-bordered">';
while ($row = mysqli_fetch_array($result)) {
    $output .= '
      <tr>
        <td><label>Description</label></td>
        <td>'.$row["issue_desc"].'</td>
      </tr>
      <tr>
        <td width=300px colspan="2"><img id="myImage" src="uploads/'.$row["image"].'" alt="sample" width=445 height=300></td>
      </tr>
      ';
}
$output .= "</table></div>";
echo $output;
?>
