<?php
$data = [
	['Иванов', 'Математика', 5],
	['Иванов', 'Математика', 4],
	['Иванов', 'Математика', 5],
	['Петров', 'Математика', 5],
	['Сидоров', 'Физика', 4],
	['Иванов', 'Физика', 4],
	['Петров', 'ОБЖ', 4],
];

//создаем матрицу вида баллы[ученик][предмет]
//суммируем баллы
$resultData = [];
foreach ($data as $row) {
	if (!isset($resultData[$row[0]][$row[1]])) {
		$resultData[$row[0]][$row[1]] = $row[2];
	} else {
		$resultData[$row[0]][$row[1]] += $row[2];
	}
}

//получаем список учеников и список предметов
//сортируем оба списка
$subjects = array_unique(array_column($data, 1));
sort($subjects);
$students = array_unique(array_column($data, 0));
sort($students);

//отрисовываем таблицу
echo ('<table class="table table-bordered border-primary w-auto table-hover m-3">');
echo ("<tr><td></td><td>" . implode(" </td><td>", $subjects) . "</td></tr>");
foreach ($students as $student) {
	echo ("<tr><td>" . $student . "</td>");
	foreach ($subjects as $subject) {
		echo ("<td>" . ($resultData[$student][$subject] ?? "-") . "</td>");
	}
	echo ("</td></tr>");
}
