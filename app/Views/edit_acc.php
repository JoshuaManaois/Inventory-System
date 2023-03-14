<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'system_db');

if(isset($_POST['update_acc']))
    {   
        $id = $_POST['id'];
        
        $firstname = $_POST['firstname'];
        $midlename = $_POST['midlename'];
        $lastname = $_POST['lastname'];
        $user_name = $_POST['user_name'];
        $passw = $_POST['passw'];
        $branch = $_POST['branch'];
    

        $query = "UPDATE accounts SET firstname='" . trim($firstname) . "', midlename='" . trim($midlename) . "', lastname='" . trim($lastname) . "', user_name='" . trim($user_name) . "', passw='" . trim($passw) . "', branch='" . trim($branch) . "' WHERE id='$id' ";

        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location: Accounts");
            exit;
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>