$(document).ready(function() { 

    $('.add-to-cart').click(function(event) {

        var $imageId = $(".img-id").val();

        $.ajax({
            url: 'cart/add',
            method: 'POST',
            data: {
                image_id: $imageId,
            },
        });
    });
});