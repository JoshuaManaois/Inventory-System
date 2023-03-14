<?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'system_db');

                $query = "SELECT * FROM branchb";
                $query_run = mysqli_query($connection, $query);
            ?>