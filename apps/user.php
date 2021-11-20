

            <?php
                require_once("config.php");

                $ambil=$db->prepare("SELECT * FROM users");
                $ambil->execute();

                echo "<table border='1'>
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
                echo "<td><a href='update.php?id=".$row['id']."'>Update</a></td>";
                echo "</tr>";
                }
                echo "</table>";
                $db=null;
            ?>         

