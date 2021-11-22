
            <style>
            <?php include 'css/tables.css'; ?>
            </style>


            <?php
                require_once("config.php");

                $ambil=$db->prepare("SELECT * FROM users");
                $ambil->execute();

                echo "<table id='users' border= 1'>
                <h4> DATA PEMBELIAN </h4>
                <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
                </tr>";

                while($row=$ambil->fetch())
                {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a href='delete.php?id=".$row['id']."'>Delete</a></td>";
                echo "</tr>";
                }
                echo "</table>";
                $db=null;
            ?>         
