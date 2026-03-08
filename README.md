# Symulator taryf energii: G12r vs G11

Prosta aplikacja webowa do porównania szacunkowego miesięcznych kosztów energii (brutto) dla taryf **G12r** i **G11** na podstawie stawek wpisanych w kodzie.

![Zrzut ekranu aplikacji](screen.png)

## Co robi projekt

- liczy miesięczny koszt dla G12r i G11 na podstawie zużycia w strefie dziennej i nocnej,
- pokazuje udział procentowy dzień/noc na pasku oraz aktualizuje wynik na żywo,
- rozbija wszystkie pozycje kosztowe w dwóch tabelach (energia, dystrybucja, opłaty dodatkowe),
- wylicza średnią cenę za 1 kWh dla każdej taryfy,
- oznacza tańszą taryfę i pokazuje różnicę kwotową,
- zapamiętuje ostatnio wpisane zużycie w `localStorage`,
- zlicza odwiedziny strony (`licznik.php` + `licznik.txt`).

## Założenia stawek

- stawki G12r i G11 są zapisane bezpośrednio w pliku `index.html`,
- ceny energii i dystrybucji są przeliczane do brutto (VAT 23%),
- akcyza jest liczona jako osobna pozycja,
- obecna konfiguracja odpowiada danym z faktur z 2026 r. (zgodnie z komentarzami w kodzie).

## Struktura plików

- `index.html` - interfejs aplikacji, logika obliczeń i prezentacja wyników,
- `licznik.php` - prosty licznik odwiedzin z blokadą pliku,
- `licznik.txt` - aktualna liczba odwiedzin,
- `README.md` - opis projektu.

## Uruchomienie lokalne

### Opcja 1 (pełna, z licznikiem odwiedzin) - serwer PHP

1. Otwórz terminal w katalogu projektu.
2. Uruchom:

```bash
php -S localhost:8000
```

3. Wejdź w przeglądarce na:

```text
http://localhost:8000
```

### Opcja 2 (sam `index.html`)

Możesz otworzyć `index.html` bezpośrednio w przeglądarce, ale licznik odwiedzin nie będzie działał poprawnie bez PHP.

## Uwagi

Wyniki mają charakter orientacyjny i zależą od przyjętych stawek oraz profilu zużycia. Przed użyciem do realnej decyzji warto zaktualizować stawki w `index.html` do bieżącej faktury/cennika.
