<?php
$text = <<<TXT
<p class="big">
	Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
</p>
<p class="float">
	<img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">
	<span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
</p>
<p>
	<i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
</p>
TXT;

function Truncate($doc, $amount)
{
	$dom = new DOMDocument();
	$dom->loadHTML("<?xml encoding=\"UTF-8\">$doc");
	$xpath = new DOMXpath($dom);
	$textNodes = $xpath->query("//text()");
	$generalCounter = 0;

	//обходим каждую текстовую ноду, подсчитывая количество слов
	foreach ($textNodes as $textNode) {
		$innerCounter = 0;
		$words = preg_split("/[\s]+/", trim($textNode->nodeValue), 0, PREG_SPLIT_NO_EMPTY);

		foreach ($words as $word) {
			if (preg_match("/[А-Яа-яЁёA-Za-z]/", $word)) {
				$generalCounter++;
				$innerCounter++;
				
				//достигнув нужного количества, обрезаем текст и рекурсивно удаляем все следующие ноды
				if ($generalCounter == $amount) {
					$textNode->nodeValue = implode(" ", array_slice($words, 0, $innerCounter)) . "...";
					$curNode = $textNode->nextSibling;
					$parNode = $textNode->parentNode;
					while ($curNode) {
						$nextNode = $curNode->nextSibling;
						$curNode->parentNode->removeChild($curNode);
						$curNode = $nextNode;
					}
					while ($parNode) {
						$curNode = $parNode->nextSibling;
						while ($curNode) {
							$nextNode = $curNode->nextSibling;
							$curNode->parentNode->removeChild($curNode);
							$curNode = $nextNode;
						}
						$parNode = $parNode->parentNode;
					}
					break 2;
				}
			}
		}
	}

	return $dom->saveHTML();
};
echo Truncate($text, 29);
