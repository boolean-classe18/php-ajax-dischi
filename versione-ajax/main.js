$(document).ready(function() {

    const source = $("#card-template").html();
    const template = Handlebars.compile(source);

    $.ajax({
        url: 'dischi.php',
        method: 'GET',
        success: function(data) {
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
