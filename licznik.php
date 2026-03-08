<?php
// Wspólne zliczanie w pliku tekstowym z bezpieczną blokadą
header('Content-Type: text/plain; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

session_start();
// Opcjonalnie: licz tylko raz na sesję przeglądarki.
// Zakomentuj kolejne 3 linie, jeśli MA zliczać każdy reload.
if (!isset($_SESSION['counted'])) {
  $_SESSION['counted'] = 0;
}
$licz_teraz = ($_SESSION['counted'] == 0);

$plik = __DIR__ . '/licznik.txt';
$fp = fopen($plik, 'c+');               // utwórz jeśli brak
if ($fp === false) { http_response_code(500); exit('0'); }

flock($fp, LOCK_EX);                    // blokada
rewind($fp);
$buf = stream_get_contents($fp);
$liczba = (int)$buf;

if ($licz_teraz) {
  $liczba++;
  rewind($fp);
  ftruncate($fp, 0);
  fwrite($fp, (string)$liczba);
  fflush($fp);
  $_SESSION['counted'] = 1;
}

flock($fp, LOCK_UN);
fclose($fp);

echo $liczba;