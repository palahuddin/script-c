
            <style>
            <?php include 'assets/css/tables.css'; ?>
            </style>
<h3>LIST ALL USERS</h3>            
  <br>
  <form action='/superadmin.php?page=importuser' method='post'> 
  <input  type='submit' name='submit' value='+ Import User'>
  </form>
  <br>

            <?php
                require_once("config.php");

                $ambil=$db->prepare("SELECT * FROM tblogin where username !='fazadmin'");
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
                    echo "<td><form method='post' action='/superadmin.php?page=edituser' style='display:inline-block'>
                    <input type='submit' name='edit' value='Edit' />
                    <input type='hidden' name='kd_admin' value=".$row['kd_admin']." />
                    </form>
                    <form method='post' action='/superadmin.php?page=deleteuser' style='display:inline-block'>
                    <input type='submit' name='delete' value='Delete' />
                    <input type='hidden' name='kd_admin' value=".$row['kd_admin']." />
                    </form ></td>"
                    
                    ;

                }
                else {
                    $status = "Non-Active";
                    echo "<td>" . $status . "</td>";
                    echo "<td><form method='post' action='/superadmin.php?page=edituser' style='display:inline-block'>
                    <input type='submit' name='edit' value='Edit' />
                    <input type='hidden' name='kd_admin' value=".$row['kd_admin']." />
                    </form>
                    <form method='post' action='/superadmin.php?page=deleteuser' style='display:inline-block'>
                    <input type='submit' name='delete' value='Delete' />
                    <input type='hidden' name='kd_admin' value=".$row['kd_admin']." />
                    </form ></td>"
                    
                    ;

                }
                
                
                echo "</tr>";
                }
                echo "</table>";
                $db=null;
            ?>         