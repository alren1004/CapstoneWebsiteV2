$(function () {
    var dialog, form,
        name = $("#name"),
        password = $("#password"),
        allFields = $([]).add(name).add(password);

    function login() {
        //alert("Test logged in user.");
        dialog.dialog("close");
        form.submit();
    }

    dialog = $("#dialog-form").dialog({
        autoOpen: false,
        height: 275,
        width: 500,
        modal: true,
        buttons: {
            "Login": function () {
                form.submit();
            },
            Cancel: function () {
                dialog.dialog("close");
            }
        },
        close: function () {
            form[0].reset();
            allFields.removeClass("ui-state-error");
        }
    });


    form = dialog.find("form");


    $("#login").button().on("click", function () {
        dialog.dialog("open");
    });
});