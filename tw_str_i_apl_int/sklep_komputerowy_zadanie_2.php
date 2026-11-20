<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep komputerowy – tablice asocjacyjne PHP</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f8ff; margin: 0; color: #222; }
        header, footer { background: #205782; color: white; text-align: center; padding: 20px; }
        nav { background: #3278a8; padding: 12px; text-align: center; }
        nav a { color: white; margin: 8px; }
        main { max-width: 900px; margin: 20px auto; padding: 0 15px; }
        section { background: white; padding: 18px; margin-bottom: 16px; border: 1px solid #ddd; }
        h2 { color: #205782; }
        .wynik { background: #eef6fc; padding: 12px; line-height: 1.7; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { border: 1px solid gray; padding: 8px; text-align: left; }
        th { background: #3278a8; color: white; }
    </style>
</head>
<body>
<header>
    <h1>Sklep komputerowy</h1>
    <p>Ćwiczenia z tablic asocjacyjnych w PHP – zadania z rozwiązaniami</p>
</header>
<nav>
    <a href="#zadanie1">Zadanie 1</a>
    <a href="#zadanie2">Zadanie 2</a>
    <a href="#zadanie3">Zadanie 3</a>
    <a href="#zadanie4">Zadanie 4</a>
    <a href="#zadanie5">Zadanie 5</a>
    <a href="#zadanie6">Zadanie 6</a>
    <a href="#zadanie7">Zadanie 7</a>
</nav>
<main>
    <!--
    ZADANIE 1. Tworzenie tablicy i bezpośredni odczyt
    Utwórz tablicę asocjacyjną $produkt:
       nazwa => Klawiatura
       producent => Logitech
       cena => 120
       dostepnosc => Dostępny
    Wyświetl nazwę i cenę, odwołując się bezpośrednio do kluczy.
    Każdą informację wyświetl w oddzielnym wierszu za pomocą <br>.
    -->
    <section id="zadanie1">
        <h2>Zadanie 1 – Dane produktu</h2>
        <div class="wynik">
            <?php
                $produkt = [
                    "nazwa" => "Klawiatura",
                    "producent" => "Logitech",
                    "cena" => 120,
                    "dostepnosc" => "Dostępny"
                ];

                echo "Nazwa: " . $produkt["nazwa"] . "<br>";
                echo "Cena: " . $produkt["cena"] . "<br>";
            ?>
        </div>
    </section>

    <!--
    ZADANIE 2. Dodawanie elementów do tablicy
    Wykorzystaj tablicę $produkt z zadania 1.
    Dodaj dwa nowe elementy:
       kolor => Czarny
       gwarancja => 24 miesiące
    Wyświetl dodane elementy, odwołując się bezpośrednio do ich kluczy.
    -->
    <section id="zadanie2">
        <h2>Zadanie 2 – Dodawanie elementów</h2>
        <div class="wynik">
            <?php
                $produkt["kolor"] = "Czarny";
                $produkt["gwarancja"] = "24 miesiące";

                echo "Kolor: " . $produkt["kolor"] . "<br>";
                echo "Gwarancja: " . $produkt["gwarancja"] . "<br>";
            ?>
        </div>
    </section>

    <!--
    ZADANIE 3. Edytowanie elementów tablicy
    Wykorzystaj tablicę $produkt z poprzednich zadań.
    Zmień cenę na 99 i dostępność na "Ostatnie sztuki".
    Wyświetl wszystkie klucze i wartości tablicy za pomocą foreach,
    w formacie klucz: wartość. Każdy element w osobnym wierszu (<br>).
    -->
    <section id="zadanie3">
        <h2>Zadanie 3 – Edycja i pętla foreach</h2>
        <div class="wynik">
            <?php
                $produkt["cena"] = 99;
                $produkt["dostepnosc"] = "Ostatnie sztuki";

                foreach($produkt as $klucz => $wartosc) {
                    echo $klucz . ": " . $wartosc . "<br>";
                }
            ?>
        </div>
    </section>

    <!--
    ZADANIE 4. Usuwanie elementu tablicy
    Wykorzystaj tablicę $produkt z poprzednich zadań.
    Usuń element o kluczu gwarancja 
    Następnie wyświetl całą tablicę za pomocą print_r() wewnątrz <pre>.
    -->
    <section id="zadanie4">
        <h2>Zadanie 4 – Usuwanie i print_r</h2>
        <div class="wynik">
            <?php
                unset($produkt["gwarancja"]);
                echo "<pre>";
                print_r($produkt);
                echo "</pre>";
            ?>
        </div>
    </section>

    <!--
    ZADANIE 5. Klucze i wartości w tabeli HTML
    Wykorzystaj tablicę $produkt z zadania 4.
    Przygotowana tabela ma nagłówki: Pole oraz Wartość.
    Użyj foreach, aby każdą parę klucz–wartość wyświetlić w osobnym
    wierszu <tr> i w dwóch komórkach <td>.
    Wiersze i komórki wygeneruj za pomocą echo.
    -->
    <section id="zadanie5">
        <h2>Zadanie 5 – Tabela z kluczami i wartościami</h2>
        <div class="wynik">
            <table>
                <tr><th>Pole</th><th>Wartość</th></tr>
                <?php
                    foreach($produkt as $klucz => $wartosc) {
                        echo "<tr>" . "<td>" . $klucz . "</td>" . "<td>" . $wartosc . "</td>" . "</tr>";
                    }
                ?>
            </table>
        </div>
    </section>

    <!--
    ZADANIE 6. Tablica wielowymiarowa – katalog produktów
    Utwórz tablicę $produkty zawierającą trzy tablice asocjacyjne.
    Każda ma klucze: nazwa, producent, cena.
    Dane produktów:
       Klawiatura, Logitech, 99
       Mysz, Genesis, 70
       Monitor, Samsung, 650
    Dodaj do drugiego produktu klucz promocja z wartością "Tak".
    Zmień cenę monitora na 599.
    Usuń z drugiego produktu klucz promocja za pomocą unset().
    Wyświetl wszystkie trzy produkty w tabeli z nagłówkami
    Nazwa, Producent, Cena. Użyj foreach i echo do tworzenia wierszy.
    -->
    <section id="zadanie6">
        <h2>Zadanie 6 – Katalog trzech produktów</h2>
        <div class="wynik">
            <?php
           
            ?>
            <table>
                <tr><th>Nazwa</th><th>Producent</th><th>Cena</th></tr>
                <?php
                    $produkty = [
                        [
                            "nazwa" => "Klawiatura",
                            "producent" => "Logitech",
                            "cena" => 99
                        ],
                        [
                            "nazwa" => "Mysz",
                            "producent" => "Genesis",
                            "cena" => 70
                        ],
                        [
                            "nazwa" => "Monitor",
                            "producent" => "Samsung",
                            "cena" => 650
                        ]
                    ];

                    $produkty[1]["promocja"] = "Tak";
                    $produkty[2]["cena"] = 599;
                    unset($produkty[1]["promocja"]);

                    foreach($produkty as $produkt) {
                        echo "<tr>";
                        foreach($produkt as $wartosc) {
                            echo "<td>" . $wartosc . "</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </section>

	<!--
	ZADANIE 7. Dodawanie kluczy do tablicy wielowymiarowej

	Utwórz tablicę $uczniowie zawierającą trzy tablice asocjacyjne.

	Każda tablica ma klucze: imie, klasa, wiek.

	Dane uczniów:
		Anna, 3TI, 18
		Kamil, 2TI, 17
		Natalia, 4TI, 19

	Wykonaj polecenia:
	1. Dodaj drugiemu uczniowi klucz miasto z wartością "Warszawa".
	2. Dodaj wszystkim uczniom klucz status z wartością "Aktywny".
	3. Wyświetl wszystkich uczniów w tabeli HTML.

	Nagłówki tabeli:
	Imię, Klasa, Wiek, Miasto, Status.

	Użyj pętli foreach i instrukcji echo do generowania wierszy.
	-->

	<section id="zadanie7">
		<h2>Zadanie 7 – Dodawanie kluczy</h2>

		<div class="wynik">
			<table>
				<tr>
					<th>Imię</th>
					<th>Klasa</th>
					<th>Wiek</th>
					<th>Miasto</th>
					<th>Status</th>
				</tr>

				
			<?php
                $uczniowie = [
                    [
                        "imie" => "Anna",
                        "klasa" => "3TI",
                        "wiek" => 18
                    ],
                    [
                        "imie" => "Kamil",
                        "klasa" => "2TI",
                        "wiek" => 17
                    ],
                    [
                        "imie" => "Natalia",
                        "klasa" => "4TI",
                        "wiek" => 19
                    ]
                ];

                $uczniowie[1]["miasto"] = "Warszawa";

                foreach($uczniowie as $uczen) {
                    $uczen["status"] = "Aktywny";
                }

                foreach($uczniowie as $uczen) {
                    echo "<tr>";
                    foreach($uczen as $wartosc) {
                        echo "<td>" . $wartosc . "</td>";
                    }
                    echo "</tr>";
                }
			?>
			</table>
		</div>
	</section>

</main>
<footer>PHP – Tablice asocjacyjne | Ćwiczenia praktyczne</footer>
</body>
</html>
