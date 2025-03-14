<?php
/**
 * @param int $brothers
 * @param int $sisters
 * @return int
 */
function sistersAmount($brothers, $sisters)
{
    return $sisters + 1;
}

$result = "";
//обрабатываем POST-запрос, высчитываем ответ
if (isset($_POST['brothers']) && isset($_POST['sisters'])) {
    $brothers = (int)$_POST['brothers'];
    $sisters = (int)$_POST['sisters'];
    $result = "Ответ: ".sistersAmount($brothers, $sisters);
}
