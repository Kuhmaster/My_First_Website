<DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кухмазов Э.Р.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container nav_bar">
        <div class="row">
            <div class="row">
                <div class="col-12 logo"> </div> 
                    <div class="col-4"> </div>
                        <div class="nav_text"> Do you wanna know my secret </div>
                        <div class="nav_text"> This is incredible </div>
                    
                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12"> 
                <h3>Alright, i tell you a story about the most powerful person in Tyumen. But first i must know that you the one who can be trusted.</h3>
            </div>
        </div>
        
    </div>

    <div class="container">
        <div class="row">
            <div class="col-7"> 
                <h2> Here's my secret </h2>
                <button>Go ahead</button>
            </div>
            <div class="col-3">  
                <div class="row vin"></div> 
                <div class="row"> <p class="title_photo">Kuhmazov Emil Rifetovich</p></div>
                <div class="row"> <p class="title_photo">Главный семьянин и мой друг.</p></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hello">
                    Привет, <?php echo $_COOKIE['User']; ?>
                </h1>
            </div>
            <div class="col-12">
                <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <input type="text" class="form" type="text" name="title" placeholder="Заголовок вашего постa">
                    <textarea name="text" cols="30" rows="10" placeholder="Введите тескт вашего поста ..."></textarea>
                    <input type="file" name="file" /><br>
                    <button type="submit" class="btn_red" name="submit">Сохранить пост!</button>
                </form>
            </div>     
        </div>
    </div>
</body>
</html>

<?php
require_once('bd.php');

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");

    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg") || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg") || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png")) && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }

}

?>