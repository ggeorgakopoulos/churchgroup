$(document).ready(function () {
    $("#submit").on("click", function() {
        $(this).attr("disabled", "disabled");
        doWork(); //this method contains your logic
    });
});

function doWork() {
    setTimeout('$("#submit").removeAttr("disabled")', 3000);
}