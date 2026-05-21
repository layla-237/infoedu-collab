<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <div class="form-wrapper">
            <h1>Add Table</h1>
            <form action="action.php" method="post">
                <input type="text" name="name" id="name" required placeholder="Name">
                <input type="number" name="age" id="age" required placeholder="Age">
                <input type="text" name="address" id="address" required placeholder="Addres">
                <input type="text" name="phone" id="phone" required placeholder="Phone">
                <input type="email" name="email" id="email" required placeholder="Email">
                <div class="btn-box">
                    <button type="submit" class="btn" name="add">Add</button>
                    <a href="index.php" class="btn">Cancel</a>
                    <input type="hidden" name="action" value="add">

                </div>
            </form>
        </div>
    </div>

</body>

</html>