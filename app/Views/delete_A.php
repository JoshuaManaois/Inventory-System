<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'system_db');

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM brancha WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:BranchA");
        exit;
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>