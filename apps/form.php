<?php require_once("auth.php"); ?>
<body>
    <form action="import.php" method="post" enctype="multipart/form-data">
        Pilih file: <input type="file" name="berkas" />
        <input type="submit" name="upload" value="upload" />
    </form> 
</body>