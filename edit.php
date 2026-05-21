<?php
    $pageTitle1='EDIT';
    include '../init1.php';
    global $con;
    $id = $_GET['id'];
    $query = $con->prepare("SELECT * FROM " . DB_PREFIX . "users WHERE UserID = ?");
    $query->execute(array($id));//Execute query
    $user = $query->fetch();// save the data from mysql tabel on array
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <div class="form-wrapper">
            <h1>Edit</h1>
            <form action="action.php" method="post">
                <input type="text" name="name" id="name" required placeholder="Name" value="<?php echo $user['UserName'] ?>">
                <input type="number" name="age" id="age" required placeholder="<?=  $user['Email'] ?>">
                <input type="text" name="address" id="address" required placeholder="<?= $user['Language'] ?>">
                <input type="text" name="phone" id="phone" required placeholder="<?=   $user['FullName'] ?>">
            
                <div class="btn-box">
                    <button type="submit" class="btn" name="update">Update</button>
                    <?php
                    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
                    ?>

                </div>
            </form>
        </div>
    </div>

</body>

</html>