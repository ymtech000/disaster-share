$('.submit_button').click(function() {
    $(".submit_button").prop("disabled", true);
});

$("form").submit(function() {
    var self = this;
    $("input[type='submit']", self).prop("disabled", true);
    setTimeout(function() {
        $("input[type='submit']", self).prop("disabled", false);
    }, 3000);
});