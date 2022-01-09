<?php require_once("auth.php"); ?>

            <style>
            <?php include 'assets/css/tables.css'; ?>
            </style>

<h3>LIST REQUEST ACCESS USERS</h3>      
            <?php
                
                require_once("config.php");

                $ambil=$db->prepare("SELECT * FROM approve where username !=  'fazadmin'");
                $ambil->execute();

                echo "<table id='users' border= 1' align=center >
                <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
                </tr>";
                
                

                while($row=$ambil->fetch())
                {
                    $status = $row['admin'];
                    if ($status == 1){
                        $status = "approved";
                    }
                    else {
                        $status = "pending";
                    }
                echo "<tr>";
                echo "<td>" . $row['kd_admin'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $status . "</td>";
                echo "<td><a href='../actions/approve.php?kd_admin=".$row['kd_admin']."'>Approve</a> |
                      <a href='../actions/reject.php?kd_admin=".$row['kd_admin']."'>Reject</a> </td> ";
                echo "</tr>";
                }
                echo "</table>";
                $db=null;
            ?>         
