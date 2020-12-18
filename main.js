$(document).ready(function() {

    const source = $("#card-template").html();
    const template = Handlebars.compile(source);

    if($("#versione-ajax").length) {
        // l'id "versione-ajax" esiste solo nel <body> del file index.html
        // cioè solo nella versione ajax
        $.ajax({
            url: '../dischi.php',
            method: 'GET',
            success: function(data) {
                console.log(data);
                // predispongo un array per i generi
                var genres = [];
                for (var i = 0; i < data.length; i++) {
                    var context = {
                        'poster': data[i].poster,
                        'title': data[i].title,
                        'author': data[i].author,
                        'year': data[i].year
                    };
                    var html = template(context);
                    $('.card-container').append(html);
                    // recupero il genere del disco corrente
                    var current_genre = data[i].genre;
                    // verifico se questo genere non è gia prensente nelarray dei generi
                    if(!genres.includes(current_genre)) {
                        genres.push(current_genre);
                    }
                } // chiudo il ciclo for che scorre i data (dischi)
                // a questo punto ho l'array dei generi completo
                for (var i = 0; i < genres.length; i++) {
                    // per ogni genere, appendo una option nella select
                    $('#genre-filter').append(`
                        <option value="${genres[i]}">
                            ${genres[i]}
                        </option>`);
                }

            },
            error: function() {
                console.log('errroe');
            }
        });
    }


    // intercetto il cambio di genere nella select
    $('#genre-filter').change(function() {

        // svuoto il contenitore
        $('.card-container').empty();

        // recupero il value del genere selezionato
        var selected_genre = $(this).val();

        // faccio una chiamata ajax inviando al server il genere selezionato
        $.ajax({
            url: '../dischi.php',
            method: 'GET',
            data: {
                genre: selected_genre
            },
            success: function(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    var context = {
                        'poster': data[i].poster,
                        'title': data[i].title,
                        'author': data[i].author,
                        'year': data[i].year
                    };
                    var html = template(context);
                    $('.card-container').append(html);
                }
            },
            error: function() {
                console.log('errroe');
            }
        });
    });
});
