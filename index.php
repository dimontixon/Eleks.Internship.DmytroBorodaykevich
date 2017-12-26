<?php
    //file with db parameters and connect routine
header('Content-type: text/html; charset=utf-8');
    $db_name="video";
    $db_hostname="127.0.0.1";
    $db_username="root";
    $db_password="";
    $db_connect=mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
    if (!$db_connect) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
     $query=mysqli_query($db_connect,"set names utf8");
     if(isset($_POST['ost100'])){
           $query ="SELECT * FROM about";
 
            $result = mysqli_query($db_connect, $query) or die("Ошибка " . mysqli_error($db_connect)); 
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                echo "<div class='ost100'> <table style='border:2px solid black;'><tr><th>Id</th><th>Назва</th><th>Опис</th><th>Користувач</th><th>Посилання</th><th>Жанр</th><th>Дата завантаження</th></tr>";
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                    echo "<tr>";
                    for ($j = 0 ; $j < 7 ; ++$j) echo "<td>$row[$j]</td>";
                    echo "</tr>";
                }
                echo "</table> </div>";
                // очищаем результат
                mysqli_free_result($result);
            }
            mysqli_close($db_connect);
     }
     
if(isset($_POST['ost100genre'])){
           $query ="SELECT * FROM about where genre = '".$_POST['genre']."'";
 
            $result = mysqli_query($db_connect, $query) or die("Ошибка " . mysqli_error($db_connect)); 
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                
                echo "<div class='ost100'> <table style='border:2px solid black;'<tr><th>Id</th><th>Назва</th><th>Опис</th><th>Користувач</th><th>Посилання</th><th>Жанр</th><th>Дата завантаження</th></tr>";
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                    echo "<tr>";
                    for ($j = 0 ; $j < 7 ; ++$j) {
                            echo "<td>$row[$j]</td>";   
                    }
                    echo "</tr>";
                }
                echo "</table> <br> </div>";
                
                // очищаем результат
                mysqli_free_result($result);
            }
 
            mysqli_close($db_connect);
     }
if(isset($_POST['betweenDate'])){
           $query ="SELECT * FROM about where date between ".$_POST['startDate']." and ".$_POST['endDate']."";
 
            $result = mysqli_query($db_connect, $query) or die("Ошибка " . mysqli_error($db_connect)); 
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                
                echo "<div class='ost100'> <table style='border:2px solid black;'<tr><th>Id</th><th>Назва</th><th>Опис</th><th>Користувач</th><th>Посилання</th><th>Жанр</th><th>Дата завантаження</th></tr>";
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                    echo "<tr>";
                    for ($j = 0 ; $j < 7 ; ++$j) {
                            echo "<td>$row[$j]</td>";   
                    }
                    echo "</tr>";
                }
                echo "</table> <br> </div>";
                
                // очищаем результат
                mysqli_free_result($result);
            }
 
            mysqli_close($db_connect);
     }
     
if(isset($_POST['search'])){
           $query ="SELECT * FROM about where name = '".$_POST[searchByName]."'";
 
            $result = mysqli_query($db_connect, $query) or die("Ошибка " . mysqli_error($db_connect)); 
            if($result)
            {
                $rows = mysqli_num_rows($result); // количество полученных строк
                
                echo "<div class='ost100'> <table style='border:2px solid black;'<tr><th>Id</th><th>Назва</th><th>Опис</th><th>Користувач</th><th>Посилання</th><th>Жанр</th><th>Дата завантаження</th></tr>";
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                    echo "<tr>";
                    for ($j = 0 ; $j < 7 ; ++$j) {
                            echo "<td>$row[$j]</td>";   
                    }
                    echo "</tr>";
                }
                echo "</table> <br> </div>";
                
                // очищаем результат
                mysqli_free_result($result);
            }
 
            mysqli_close($db_connect);
     }

if(isset($_POST['submit'])){
           $query ="insert into 'about' (name,description, user, url, genre,date) values (".$_GET['nameNewVideo'].",".$_POST['descNewVideo'].",".$_POST['userNewVideo'].",".$_POST['urlNewVideo'].",".$_POST['genreNewVideo'].",".date('Y-m-d').")";
 
            $result = mysqli_query($db_connect, $query) or die("Ошибка " . mysqli_error($db_connect)); 
            mysqli_close($db_connect);
     }
    ?>
<html>
 <head>
     <meta charset="utf-8">
     <style>
         button{
             color: white;
             background: black;
             padding: 4px;
             margin:5px;
         }
         body{
             background-color: bisque;
         }
         input{
             margin-bottom: 3px;
             margin-top: 3px;
             margin-right: 3px;
             border:1px solid;
             border-color: cadetblue;
         }
         input:hover{
             border-color: crimson;
         }
         .block{
             border:2px solid black;
             background-color: burlywood;
             padding: 10px;
         }
         .ost100r{
             margin-top: 10px;
             width:400px;
         }
         .ost100genre, .betweenDate{
             width: 350px;
         }
         .search{
              width:370px;
         }
         .inputVideo{
             width: 450px;
         }
     </style>
 </head>
 <body>
   
    <form method="post">
       <div class="block ost100r">
            <span>100 останніх завантажених записів про відеоролики</span>
            <button name="ost100">...GET...</button>
        </div>
        <br>

        <br>
        <div class="block ost100genre">
            <span>100 останніх завантажених записів певного жанру</span>
            <br>
            <input checked type="radio" name="genre" value="Жарти">Жарти
            <br>
            <input type="radio" name="genre" value="Музика">Музика
            <br>
            <input type="radio" name="genre" value="Серіал">Серіал
            <br>
            <button name="ost100genre">GET</button>
        </div>

        <br>
        
        <div class="block betweenDate">
            <span>Записи про відеоролики за певний період часу</span>
            <br>
            <span>Від</span>
            <input type="date" name="startDate">
            <br>
            <span>До</span>
            <input type="date" name="endDate">
            <br>
            <button name="betweenDate">GET</button>
        </div>
        
        <br>
        <div class="block search">
            <span>Пошук по назві</span>
            <input type="text" name="searchByName">
            <button name="search">Search</button>
        </div>
        <br>

        <div class="block inputVideo">
            <span>Введіть назву відеоролика</span>
            <input type="text" name="nameNewVideo">
            <br>
            <span>Введіть опис</span>
            <input type="text" name="descNewVideo">
            <br>
            <span>Користувач, який завантажив ролик</span>
            <input type="text" name="userNewVideo">
            <br>
            <span>Посилання на відео</span>
            <input type="text" name="urlNewVideo">
            <br>
            <span>Жанр</span> 
            <br>
            <input checked type="radio" name="genreNewVideo" value="Жарти">Жарти
            <br>
            <input type="radio" name="genreNewVideo" value="Музика">Музика
            <br>
            <input type="radio" name="genreNewVideo" value="Серіал">Серіал
            <br>
            <br>
            <button type="submit">Завантажити</button>
        </div>
    </form>
    </body>
</html>
