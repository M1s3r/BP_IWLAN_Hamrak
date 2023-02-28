$('input#submit').on('click', function() {
    var code = $('input#code').val();
    if ($.trim(code) != '') {
        $.post('loginTest.php', {code: code}, function(data) {
            $('div#loginstatus').text(data);
            if (data == 1) {
                $('div#loginstatus').text('Logged in');
                $('div#loginform').hide();
            }
        });
    }
});