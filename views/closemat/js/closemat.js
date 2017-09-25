/**
 * Created by tecnico on 10/07/16.
 */
$(document).ready(function(){
    var getInfo;

    $('#monto_total_close').focus(function(){
        if($('#precio_gramas').val().trim() != ''){
            $.post('/siscg_bot/closemat/verificarTotCie', 'id_liqdivbsf=' + $('#id_liqdivbsf').val() + '&monto_totcie=' + $('#monto_total_close').val(),function(datos){
                if (!datos.success) {
                    swal("Verifique Monto en Cierre!!!", "El monto Cierre de Material, excede al monto Liquidado en Divisas...");
                    $('#monto_total_close').val(0);
                }
            },'json');
        }
    });

    $('#precio_gramas').blur(function(){
        if($('#precio_gramas').val().trim() != '') {
            var $monto_bsf = 0;
            var $gramas = $('#gramas_close').val();
            var $precio = $('#precio_gramas').val();
            $precio = $precio.replace('.', '');
            $precio = $precio.replace(',', '.');
            $precio = parseFloat($precio);
            $gramas = $gramas.replace('.', '');
            $gramas = $gramas.replace(',', '.');
            $gramas = parseFloat($gramas);
            $monto_bsf = $precio * $gramas;
            $monto_bsf = formatear_moneda($monto_bsf);
            $('#monto_total_close').val($monto_bsf);
        }
    });

    getInfo = function(id){
        return $.getJSON( "/siscg_bot/closemat/getCloseMat", { "id_cierremat" : id });
    }
    $('[data-user]').click(function(e){
        e.preventDefault();

        $("#response-container").html("<p>Buscando....<img src='/siscg_bot/public/img/loader.gif'></p>");

        getInfo($(this).data('user'))
            .done( function( response ) {
                //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
                if( response.success ) {

                    var output = "<section class='panel'>";

                    //recorremos cada usuario
                    $.each(response.data.users, function( key, value ) {
                        output += "<div class='panel-body bio-graph-info'><h2>" + value['nombre'] + "</h2>";
                        output += "<h1>Id Cierre: " + value['nro_closemat'] + "</h1>";
                        output += "<h1>Id Coloc. Div.: " + value['nro_liqdivbsf'] + "</h1></div>";
                        output += "<div class='row'>";
                        output += "<div class='bio-row'><p><span>Contacto </span>: " + value['contacto'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Tel. Contacto </span>: " + value['telefono_contacto'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Fecha </span>: " + value['fecha_close'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Gramas </span>: " + value['gramas_cierre'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Costo Grama </span>: " + value['precio_gramas'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Monto Operación BsF </span>: " + value['monto_total_close'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Observación </span>: " + value['observacion'] + "</p></div>";
                        output += "</div>";
                        output += "</section>";
                        //recorremos los valores de cada usuario
                    });
                    //Actualizamos el HTML del elemento con id="#response-container"
                    $("#response-container").html(output);

                } else {
                    //response.success no es true
                    $("#response-container").html('No ha habido suerte: ' + response.data.message);
                }
            });
        $('#dataUpdate').modal();
    });
});
