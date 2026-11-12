<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog filmowy – tablice asocjacyjne PHP</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background-color: #f1f5f9; color: #243447; }
        header, footer { background-color: #205782; color: white; text-align: center; padding: 22px; }
        header h1 { margin: 0 0 8px; }
        header p { margin: 0; }
        nav { background-color: #3278a8; padding: 14px; text-align: center; }
        nav a { color: white; text-decoration: none; margin: 12px; font-weight: bold; }
        main { max-width: 900px; margin: 24px auto; padding: 0 16px; }
        section { background-color: white; border: 1px solid #dbe3eb; border-radius: 8px; padding: 22px; margin-bottom: 20px; }
        h2 { color: #205782; margin-top: 0; }
        .wynik { background-color: #edf5fb; border-left: 4px solid #3278a8; padding: 15px; min-height: 65px; line-height: 1.8; }
    </style>
</head>
<body>
    <header>
        <h1>Katalog filmowy</h1>
        <p>Tablice asocjacyjne w PHP</p>
    </header>

    <nav>
        <a href="#zadanie1">Zadanie 1</a>
        <a href="#zadanie2">Zadanie 2</a>
        <a href="#zadanie3">Zadanie 3</a>
        <a href="#zadanie4">Zadanie 4</a>
        <a href="#zadanie5">Zadanie 5</a>
    </nav>

    <main>
        <!--
        ZADANIE 1. Utworzenie tablicy asocjacyjnej
		
        Utwórz tablicę asocjacyjną $film o kluczach i wartościach:
			tytul => Interstellar
			rezyser => Christopher Nolan
			rok => 2014
			gatunek => Science fiction
			
        Wyświetl wyłącznie tytuł filmu, odwołując się bezpośrednio do klucza.
        -->
        <section id="zadanie1">
            <h2>Zadanie 1 – Tytuł filmu</h2>
            <div class="wynik">
                <?php
                    $film = [
                        "tytul"   => "Interstellar",
                        "rezyser" => "Christopher Nolan",
                        "rok"     => 2014,
                        "gatunek" => "Science fiction"
                    ];
                    
                    echo $film["tytul"];
                ?>
            </div>
        </section>

        <!--
        ZADANIE 2. Wyświetlanie tablicy pętlą foreach
		
        Wykorzystaj tablicę $film z zadania 1.
        Za pomocą pętli foreach wyświetl wszystkie klucze i wartości w formacie: klucz: wartość.
        Każdy element wyświetl w osobnym wierszu, używając znacznika <br>.
        -->
        <section id="zadanie2">
            <h2>Zadanie 2 – Dane filmu</h2>
            <div class="wynik">
                <?php
                    foreach($film as $klucz => $wartosc) {
                        echo $klucz . ": " . $wartosc . "<br>";
                    }
                ?>
            </div>
        </section>

        <!--
        ZADANIE 3. Modyfikowanie wartości tablicy
		
        Utwórz tablicę asocjacyjną $seans:
			sala => Sala A
			godzina => 16:00
			liczba_miejsc => 50
			
        Zmień wartość klucza godzina na 18:00, a wartość klucza liczba_miejsc na 40.
		
        Wyświetl wszystkie trzy wartości, odwołując się bezpośrednio do kluczy.
        Każdą wartość umieść w osobnym wierszu.
        -->
        <section id="zadanie3">
            <h2>Zadanie 3 – Informacje o seansie</h2>
            <div class="wynik">
                <?php
                    $seans = [
                        "sala" => "Sala A",
                        "godzina" => "16:00",
                        "liczba_miejsc" => 50
                    ];

                    $seans["godzina"] = "18:00";
                    $seans["liczba_miejsc"] = 40;

                    echo "sala" . ": " . $seans["sala"] . "<br>";
                    echo "godzina" . ": " . $seans["godzina"] . "<br>";
                    echo "liczba_miejsc" . ": " . $seans["liczba_miejsc"] . "<br>";
                ?>
            </div>
        </section>

        <!--
        ZADANIE 4. Usuwanie elementu tablicy
		
        Utwórz tablicę asocjacyjną $bilet:
			numer => 125
			cena => 25
			rzad => 4
			miejsce => 12
        Za pomocą funkcji unset() usuń element o kluczu rzad. 
        -->
        <section id="zadanie4">
            <h2>Zadanie 4 – Dane biletu</h2>
            <div class="wynik">
                <?php
                    $bilet = [
                        "numer" => 125,
                        "cena" => 25,
                        "rzad" => 4,
                        "miejsce" => 12
                    ];

                    unset($bilet["rzad"]);

                    foreach($bilet as $klucz => $wartosc) {
                        echo $klucz . ": " . $wartosc . "<br>";
                    }
                ?>
            </div>
        </section>
 
    </main>

    <footer>PHP – Tablice asocjacyjne | Zadanie praktyczne</footer>
</body>
</html>
