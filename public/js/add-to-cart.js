$(document).ready(function() { 

    $('.add-to-cart').click(function(event) {

        var $parent = $(event.target).closest('.col-md-1'),
            imageId = $parent.find('.img-id').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'cart/add',
            method: 'POST',
            data: {
                image_id: imageId,
            },
        });
    });
});