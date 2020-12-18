<?php

$dischi = [
    [
        'poster' => 'https://www.onstageweb.com/wp-content/uploads/2018/09/bon-jovi-new-jersey.jpg',
        'title' => 'New Jersey',
        'author' => 'Bon Jovi',
        'genre' => 'Rock',
        'year' => '1988'
    ],
    [
        'poster' => 'https://images-na.ssl-images-amazon.com/images/I/51NrqJ85VXL._AC_SX425_.jpg',
        'title' => 'Live at Wembley 86',
        'author' => 'Queen',
        'genre' => 'Pop',
        'year' => '1992'
    ],
    [
        'poster' => 'https://images-na.ssl-images-amazon.com/images/I/41JD3CW65HL.jpg',
        'title' => 'Ten\'s Summoner\'s Tales',
        'author' => 'Sting',
        'genre' => 'Pop',
        'year' => '1993'
    ],
    [
        'poster' => 'https://cdn2.jazztimes.com/2018/05/SteveGadd-800x723.jpg',
        'title' => 'Steve Gadd Band',
        'author' => 'Steve Gadd Band',
        'genre' => 'Jazz',
        'year' => '2018'
    ],
    [
        'poster' => 'https://images-na.ssl-images-amazon.com/images/I/810nSIQOLiL._SY355_.jpg',
        'title' => 'Brave new World',
        'author' => 'Iron Maiden',
        'genre' => 'Metal',
        'year' => '2000'
    ],
    [
        'poster' => 'https://upload.wikimedia.org/wikipedia/en/9/97/Eric_Clapton_OMCOMR.jpg',
        'title' => 'One more car, one more raider',
        'author' => 'Eric Clapton',
        'genre' => 'Rock',
        'year' => '2002'
    ],
    [
        'poster' => 'https://images-na.ssl-images-amazon.com/images/I/51rggtPgmRL.jpg',
        'title' => 'Made in Japan',
        'author' => 'Deep Purple',
        'genre' => 'Rock',
        'year' => '1972'
    ],
    [
        'poster' => 'https://images-na.ssl-images-amazon.com/images/I/81r3FVfNG3L._SY355_.jpg',
        'title' => 'And Justice for All',
        'author' => 'Metallica',
        'genre' => 'Metal',
        'year' => '1988'
    ],
    [
        'poster' => 'https://img.discogs.com/KOBsqQwKiNKH-q927oHMyVdDzSo=/fit-in/596x596/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-6406665-1418464475-6120.jpeg.jpg',
        'title' => 'Hard Wired',
        'author' => 'Dave Weckl',
        'genre' => 'Jazz',
        'year' => '1994'
    ],
    [
        'poster' => 'https://m.media-amazon.com/images/I/71K9CbNZPsL._SS500_.jpg',
        'title' => 'Bad',
        'author' => 'Michael Jackson',
        'genre' => 'Pop',
        'year' => '1987'
    ]
];

// preparo un array contenente tutti i generi
$genres = [];
foreach ($dischi as $disco) {
    // recupero il genere del disco corrente
    $genre = $disco['genre'];
    if(!in_array($genre, $genres)){
        $genres[] = $genre;
    }
}


if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {

    // verifico se esiste un parametro GET "genre"
    if(!empty($_GET) && !empty($_GET['genre'])) {
        // recupero il parametro GET "genre"
        $genre = $_GET['genre'];

        // predispongo un array che contiene i dischi filtrati
        $dischi_filtrati = [];

        // filtro i dischi in base al genere selezionato
        // ciclo tutti i dischi
        foreach ($dischi as $disco) {
            // per ogni disco, verifico se il genere corrisponde al genere selezionato
            if($disco['genre'] == $genre) {
                // se sì, lo salvo in un array
                $dischi_filtrati[] = $disco;
            }
            // se no, lo scarto
        }
    } else {
        // non c'è alcun parametro nella query string
        // oppure il genere è vuoto
        $dischi_filtrati = $dischi;
    }

    // a questo punto sicuramente $dischi_filtrati è definito
    // e contiene i dischi corrispondenti alla selezione
    header('Content-Type: application/json');
    echo json_encode($dischi_filtrati);
}

?>
