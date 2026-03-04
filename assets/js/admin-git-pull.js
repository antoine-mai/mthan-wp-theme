jQuery(document).ready(function ($) {
    $('#mthan-git-pull-btn').on('click', function (e) {
        e.preventDefault();

        var $btn = $(this);
        var $log = $('#mthan-git-pull-log');

        if ($btn.hasClass('updating')) {
            return;
        }

        $btn.addClass('updating').text('Pulling Updates...');
        $log.hide().html('');

        $.ajax({
            url: ajaxurl, // WordPress provided global
            type: 'POST',
            data: {
                action: 'mthan_git_pull',
                // Optional: add a nonce here for better security if needed
            },
            success: function (response) {
                $btn.removeClass('updating').text('Pull Latest Updates');
                $log.show().html('<strong>Success:</strong><br>' + response.data);
            },
            error: function (xhr, status, error) {
                $btn.removeClass('updating').text('Pull Latest Updates');
                var errMsg = "Unknown error occurred.";
                if (xhr.responseJSON && xhr.responseJSON.data) {
                    errMsg = xhr.responseJSON.data;
                }
                $log.show().html('<strong style="color:#ff4444;">Error:</strong><br>' + errMsg);
            }
        });
    });
});
