/**
 * Created by Julio Aponte
 * Date 12/07/16.
 */
// unblock when ajax activity stops
$(document).ajaxStop($.unblockUI);

$("#downloadButton").click(function() {

    $("#dialog").dialog({
        width:"390px",
        modal:true,
        buttons: {
            "OK, AGUARDO O E-MAIL!":  function() {
                $.blockUI({ message: '<img src="img/ajax-loader.gif" />' });
                send();
            }
        }
    });
});

function send() {
    $.ajax({
        url: "download-enviar.do",
        type: "POST"
    });
}