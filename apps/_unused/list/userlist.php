
            <style>
            <?php include 'assets/css/tables.css'; ?>
            </style>


            <?php
                require_once("config.php");

                $ambil=$db->prepare("SELECT * FROM users where username !='fazadmin'");
                $ambil->execute();

                echo "<table id='users' border= 1'>
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

                echo "<tr>";
                echo "<td>" . $row['kd_admin'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                $status = $row['admin'];
                if ($status == 1){
                    $status = "Active";
                    echo "<td>" . $status . "</td>";
                    echo "<td><a href='#'>Delete</a></td>";
                }
                else {
                    $status = "Non-Active";
                    echo "<td>" . $status . "</td>";
                    echo "<td><a href='actions/delete.php?kd_admin=".$row['kd_admin']."'>Delete</a></td>";
                }
                
                
                echo "</tr>";
                }
                echo "</table>";
                $db=null;
            ?>         
