<?php

require_once 'includes/db_connection.php';

if (isset($_POST['search_param'])) {
    $search_param = mysqli_real_escape_string($dbc, $_POST['search_param']);
    $query = mysqli_query($dbc, "SELECT * FROM students where fullname like '%$search_param%' or gender like '%$search_param%' or country like '%$search_param%' or city like '%$search_param%' order by studentID limit 20");
    $output = '';
    if ($query->num_rows > 0) {
        while ($row = mysqli_fetch_array($query)) {
            $output .= '<tr>
    <td>' . $row['fullname'] . '</td>
    <td>' . $row['gender'] . '</td>
    <td>' . $row['city'] . '</td>
    <td>' . $row['country'] . '</td>
  </tr>';
        }
    } else {
        $output = '
  <tr>
    <td colspan="4"> No result found. </td>   
  </tr>';
    }
    echo $output;
}
?>