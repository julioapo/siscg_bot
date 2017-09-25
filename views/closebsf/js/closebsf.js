/**
 * Created by tecnico on 10/07/16.
 */
$(document).ready(function(){
    var getCountsComp;
    var getBanksComp;
    var getInfo;

    /*
     * Funcion al perder el focus del campo en formulario monto_dls para controlar monto de liquidacion no supere
     * el monto de la colocacion de divisas
     */
    $('#monto_dls').blur(function(){
        if($('#monto_dls').val().trim() != ''){
            $.post('/siscg_bot/closebsf/verificarMontoCol', 'id_cierrediv=' + $('#cierrediv').val() + '&monto_dls=' + $('#monto_dls').val(),function(datos){
                if (!datos.success) {
                    swal("Verifique Monto en Divisas!!!", "El monto a liquidar, excede el monto Colocado...");
                    $('#monto_dls').val(0);
                }
            },'json');
        }
    });
    /*
     * Funcion al perder el focus del campo en formulario tasa_cambio para calcular el monto en bsf segun la
     * tasa de cambio actual para el modulo de liquidacion de divisas
     *
     */
     $('#tasa_cambio').blur(function() {
        if($('#tasa_cambio').val().trim() != ''){
            var $monto_bsf = 0;
            var $monto_dls = $('#monto_dls').val();
            var $tasa = $('#tasa_cambio').val();
            $monto_dls = $monto_dls.replace('.', '');
            $monto_dls = $monto_dls.replace(',', '.');
            $monto_dls = parseFloat($monto_dls);
            $tasa = $tasa.replace('.', '');
            $tasa = $tasa.replace(',', '.');
            $tasa = parseFloat($tasa);
            $monto_bsf = $monto_dls * $tasa;
            $monto_bsf = formatear_moneda($monto_bsf);
            $('#monto_bsf').val($monto_bsf);
        }
     });
    /*
     * Funcion de json y jquery para devolver los id_banco y nombre de bancos segun valor seleccionando en el
     * campo liquidador en el modulo de liquidacion de divisas
     *
     */
    getBanksComp = function(){
       $.post('/siscg_bot/closebsf/getBanksComp', 'id_comprador=' + $('#liquidador').val(),function(datos){
           $('#bankscomp').html('');

           $('#bankscomp').append('<option value=""> - seleccione - </option>');
           for(var i = 0; i < datos.length; i++){
               $('#bankscomp').append('<option value="' + datos[i].id_banco + '">' + datos[i].name_bank + '</option>');
           }

       },'json');
    }
    $('#liquidador').change(function(){
        if(!$('#liquidador').val()){
            $('#bankscomp').html('');
        }
        else{
            getBanksComp();
        }
    });
    /*
     * Funcion de json y jquery para devolver los nro_cuenta seleccionando en el campo bankscomp
     * en el modulo de liquidacion de divisas
     *
     */
    getCountsComp = function(){
        $.post('/siscg_bot/closebsf/getCountsComp', 'id_comprador=' + $('#liquidador').val() + '&id_banco=' + $('#bankscomp').val(),function(datos){
            $('#cuentcomp').html('');

            for(var i = 0; i < datos.length; i++){
                $('#cuentcomp').append('<option value="' + datos[i].nro_cuenta + '">' + datos[i].nro_cuenta + '</option>');
            }

        },'json');
    }
    $('#bankscomp').change(function(){
        if(!$('#bankscomp').val()){
            $('#cuentcomp').html('');
        }
        else{
            getCountsComp();
        }
    });

    /*
     * Funcion para mostrar informacion sobre la liquidacion de divisas en un formulario modal
     * en el modulo de liquidacion de divisas
     *
     */
    getInfo = function(id){
        return $.getJSON( "/siscg_bot/closebsf/getCloseBsF", { "id_cierrebsf" : id });
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
                        output += "<h1>Id Liq. Div: " + value['nro_liqdivbsf'] + "</h1>";
                        output += "<h1>Id Coloc. Div.: " + value['id_operacion'] + "</h1></div>";
                        output += "<div class='row'>";
                        output += "<div class='bio-row'><p><span>Repre Legal </span>: " + value['representante_legal'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Tel. Repre Legal </span>: " + value['telefono_repre'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Banco </span>: " + value['name_bank'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Cuenta Bancaria </span>: " + value['nro_cuenta'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Nro Operacion </span>: " + value['nro_operacion'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Monto Divisas </span>: " + value['monto_dls'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Tasa de Cambio </span>: " + value['tasa_chan'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Monto BsF </span>: " + value['monto_bsf'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Fecha Operacion </span>: " + value['fecha_opera'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Concepto </span>: " + value['concepto'] + "</p></div>";
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
