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

    <button onclick = " document.getElementById('id01').style.display='block'"
            class="w3-button w3-purple w3-large" ><i class="fa fa-plus"></i> Добавить</button>

    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>

            </div>

            <form method="post" class="w3-container" action="categories_page.php">
                <div class="w3-section">
                    <label><b>Введите сумму расхода</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" autofocus="true" type="text" placeholder="Сумма"  required>

                    <button onclick="" class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Добавить</button>


                </div>
            </form>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Закрыть</button>

            </div>

        </div>
    </div>
</div>
</div>
</div>
</body>
</html>