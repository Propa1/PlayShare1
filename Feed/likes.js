$(document).ready(function() {
    $('.like-btn').click(function() {
        var pub_id = $(this).data('pub-id');

        $.ajax({
            url: 'like.php', // Replace with the actual PHP script that handles the like action
            method: 'POST',
            data: { pub_id: pub_id },
            success: function(response) {
                // Update the likes count
                $('.likes').html('<i class="ri-thumb-up-line like-btn" data-pub-id="' + pub_id + '"></i>' + response);
            }
        });
    });
});