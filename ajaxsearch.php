<?php
 require_once 'includes/db_connection.php';
 require_once 'includes/functions.php';    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Search students</title>
        <meta content='Live Demo: Ajax live data search using PHP and MySQL' name='description' />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">      
        <style>
            .img-box{
                max-height: 300px;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container" style="max-width:800px;margin:0 auto;margin-top:50px;">  
            <div>
                <p><a href="index.php" class="btn btn-primary">Home</a></p>
                <h2 style="margin-bottom:50px;">Search student</h2>
                <div>
                    <div style="margin-bottom:30px;"><input type="text" class="form-control" id="search_param" placeholder="Search"/></div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>FullName</th>
                                <th>Gender</th>
                                <th>City</th>
                                <th>Country</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_body">
                            <?php
                            $sql = mysqli_query($dbc, "SELECT * FROM students ORDER BY studentID LIMIT 20");
                            while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['city']; ?></td>
                                    <td><?php echo $row['country']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).on("keyup", "#search_param", function () {
                var search_param = $("#search_param").val();
                $.ajax({
                    url: 'getData.php',
                    type: 'POST',
                    data: {search_param: search_param},
                    success: function (data) {
                        $("#tbl_body").html(data);
                    }
                });
            });
        </script>      
    </body>
</html>