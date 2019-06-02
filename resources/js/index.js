

window.onload = function(){


    $('body').on('mouseover', '.author', function(e){
        var tr = $(this)[0].cells[1];
        $.each($(tr).children(), function (i, elem) {
            $(elem).css('visibility', 'visible');
            console.log(elem);
        });

    });

    $('body').on('mouseout', '.author', function(e){
        var tr = $(this)[0].cells[1];
        $.each($(tr).children(), function (i, elem) {
            $(elem).css('visibility', 'hidden');
            console.log(elem);
        });
    });

    $('body').on('mouseover', '.book', function(e){
        var hrefs = $(this).find('a');
        $.each(hrefs, function (i, elem) {
            $(elem).css('visibility', 'visible');
        });

    });

    $('body').on('mouseout', '.book', function(e){
        var hrefs = $(this).find('a');
        $.each(hrefs, function (i, elem) {
            $(elem).css('visibility', 'hidden');
        });
    });

    $('body').on('click', '.delete-author', function (e) {
        e.preventDefault();
        $.ajax({
            url:$(this).attr('href'),
            type:'GET',
            success: function (data) {
                console.log(data);
            },
            error:function (error) {
                console.log(error);
            }
        });
        
    });

    $('#book').on('click', function (e) {
        $(this).addClass('active');
        $('#author').removeClass('active');

        $('.author-create').remove();

        let a = document.createElement('a');
        $(a).attr('href', '/books/create/');
        $(a).addClass('btn btn-primary book-create');

        $.ajax({
            url:'/books',
            type:'GET',
            success: function(data){
                var table = $('#data-information');
                table.find('tr').remove();
                data.forEach(function (elem) {
                    let tr = document.createElement('tr');
                    $(tr).addClass('book');
                    let id = document.createElement('td');
                    let name = document.createElement('td');
                    let editBook = document.createElement('a');
                    let deleteBook = document.createElement('a');
                    let book_edit_delete = document.createElement('td');

                    $(editBook).text("редактировать книгу");
                    $(editBook).attr('href', '/books/edit/' + elem.id);
                    $(editBook).css('visibility', 'hidden');
                    $(editBook).addClass('edit-book');
                    $(deleteBook).text("удалить книгу");
                    $(deleteBook).attr('href', '/books/delete/' + elem.id);
                    $(deleteBook).css('visibility', 'hidden');
                    $(deleteBook).addClass('delete-book');

                    // автор
                    var author_edit_delete = document.createElement('td');
                    for(let j = 0; j < elem.at_name.length; j++){
                        if (elem.author_id[j] !== null){
                            let author_block = document.createElement('div');
                            let editAuthor = document.createElement('a');
                            let deleteAuthor = document.createElement('a');
                            let name_author = document.createElement('p');
                            $(name_author).text(elem.at_name[j]);

                            $(editAuthor).text("добавить автора");
                            $(editAuthor).attr('href', '/book-authors/create/' + elem.id);
                            $(editAuthor).css('visibility', 'hidden');
                                $(editAuthor).addClass('edit-author-book');
                            $(deleteAuthor).text("удалить автора");
                            $(deleteAuthor).attr('href', '/book-authors/' + elem.id + '/delete-author/' + elem.author_id[j]);
                            $(deleteAuthor).css('visibility', 'hidden');
                            $(deleteAuthor).addClass('delete-author-book');
                            $(author_block).append(name_author);
                            $(author_block).append(editAuthor);
                            $(author_block).append(deleteAuthor);
                            author_edit_delete.append(author_block);
                        }
                    }

                    $(id).text(elem.id);
                    $(id).addClass('scope');
                    $(name).text(elem.name);
                    $(name).innerText = elem.name;
                    book_edit_delete.append(editBook);
                    book_edit_delete.append(deleteBook);
                    tr.append(id);
                    tr.append(author_edit_delete);
                    tr.append(book_edit_delete);
                    tr.append(name);
                    table.append(tr);
                });

            }
        })
    });

    $('#author').on('click', function (e) {
        $('#book').removeClass('active');
        // <a class="btn btn-primary" href="/authors/create/" role="button">Добавить автора</a>
        let a = document.createElement('a');
        $(a).attr('href', '/authors/create/');
        $(a).addClass('btn btn-primary author-create');

        $('.book-create').remove();

        $(a).text('Добавить автора');
        $('main').append(a);
        $(this).addClass('active');
        $.ajax({
            url:'/authors',
            type:'GET',
            success: function(data){
                var table = $('#data-information');
                table.find('tr').remove();

                for(let i = 0; i < data.length; i++){
                    let tr = document.createElement('tr');
                    $(tr).addClass('author');
                    let author_edit_delete = document.createElement('td');

                    let id = document.createElement('td');
                    let name = document.createElement('td');
                    let editAuthor = document.createElement('a');
                    let deleteAuthor = document.createElement('a');
                    $(editAuthor).text("редактировать автора");
                    $(editAuthor).attr('href', '/authors/edit/' + data[i].id);
                    $(editAuthor).css('visibility', 'hidden');
                    $(editAuthor).addClass('edit-author');
                    $(deleteAuthor).text("удалить автора");
                    $(deleteAuthor).attr('href', '/authors/delete/' + data[i].id);
                    $(deleteAuthor).css('visibility', 'hidden');
                    $(deleteAuthor).addClass('delete-author');

                    $(id).text(data[i].id);
                    $(id).addClass('scope');
                    $(name).text(data[i].name);
                    $(name).innerText = data[i].name;
                    author_edit_delete.append(editAuthor);
                    author_edit_delete.append(deleteAuthor);
                    tr.append(id);
                    tr.append(author_edit_delete);
                    tr.append(name);
                    table.append(tr);
                }

            }
        })
    })

};



