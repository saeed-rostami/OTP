$(document).ready(function () {
    $("#select2-tags").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });
    $("#select2-categories").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });


    $('.showDescription').click(function(){

        let requestID = $(this).attr('data-id');

        // AJAX request
        $.ajax({
            url: 'http://127.0.0.1:8000/admin-request/' + requestID,
            type: 'GET',
            data: {requestID: requestID},
            success: function(data){
                console.log(data.data);
                // Add response in Modal body
                $('#modal-desc').html(data.data);
                //
            }
        });
    });
});



