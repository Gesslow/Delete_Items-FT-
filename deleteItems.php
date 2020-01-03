<body>
<div class="wrapper">
    <center>
        <form action="" method="POST">
            <h3>
                Введите артикул товаров для удаления:
            </h3>
            <textarea name="input_artikul" cols="55" rows="10"></textarea>
            <hr />
            <br /><br />
        <button name="delete_button">УДАЛИТЬ ТОВАРЫ !</button>
        </form>
    </center>
</div>


<?php
ini_set("display_errors","1");
ini_set("display_startup_errors","1");
ini_set('error_reporting', E_ALL);


// подключаемся к базе
const HOST = 'localhost';
const DATABASE = 'mdgsi96_test';
const USER = 'mdgsi96_test';
const PASS = 'hfsmQpHAmT5X7';

$connect = mysqli_connect(HOST, USER, PASS, DATABASE);
if($connect){
    echo "Соединение установлено ! <br />";
}

// получаем массив значений
$inform_artikul = ($_POST['input_artikul']);
$artikul_array = explode(" ", $inform_artikul);

foreach ($artikul_array as $k => $v)
{
    $artikul_array[$k] = '"' . mysqli_real_escape_string($connect, $v) . '"';
    echo $v;

}

$query = 'DELETE FROM gdlaj_virtuemart_products WHERE product_sku IN ('  . implode(',', $artikul_array) .  ')';

if (mysqli_query($connect, $query))
    echo "<h1>ТОВАР УСПЕШНО УДАЛЁН !!!</h1>";
else
    echo "К СОЖАЛЕНИЮ УДАЛИТЬ ТОВАР НЕ УДАЛОСЬ (((" . mysqli_error();

mysqli_close( $connect );

?>
