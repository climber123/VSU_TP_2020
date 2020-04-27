<?php
    session_start();
    if (!isset($_SESSION['user_id']))
    {
        header('HTTP/1.0 500 Forbidden');
        die('');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>SmartExpenses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
<?php include 'menu_bar.php' ?>
<div class="w3-main " style="margin-left:340px;margin-right:40px">
    <div class="w3-container w3-animate-right"  >
        <div class="w3-row w3-margin-left ">
            <form action="add_date.php" method="post">
                <button  class="w3-button w3-purple w3-large" type="submit" name="cmd" value="Добавить"><i class="fa fa-plus"></i> Добавить</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>