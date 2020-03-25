var url = 'http://localhost:8000/'

window.addEventListener("load", function() {

    function like() {
        $('.dislike').unbind('click').click(function() {
            $(this).addClass('like').removeClass('dislike')
            $(this).attr('src', `${url}img/heart-color.svg`)
            var counter = $(this).parent('.btn-like').children('span')

            $.ajax({
                url: `${url}like/${$(this).data('id')}`,
                type: 'GET',
                success: function(response) {
                    if (response.like) {
                        var num_likes = parseInt(counter.text())
                        counter.text(++num_likes)
                    }
                }
            })

            dislike()
        })
    }


    function dislike() {
        $('.like').unbind('click').click(function() {
            $(this).addClass('dislike').removeClass('like')
            $(this).attr('src', `${url}img/heart.svg`)
            var counter = $(this).parent('.btn-like').children('span')

            $.ajax({
                url: `${url}dislike/${$(this).data('id')}`,
                type: 'GET',
                success: function(response) {
                    if (response.like) {
                        var num_likes = parseInt(counter.text())
                        counter.text(--num_likes)
                    }
                }
            })

            like()
        })
    }

    like()
    dislike()

    $("#finder").submit(function(e) {
        $(this).attr('action', `${url}people-list/${$('#finder #search').val()}`)
    })
})
