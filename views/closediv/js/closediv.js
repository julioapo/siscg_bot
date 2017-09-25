/**
 * Created by tecnico on 10/07/16.
 */
$(document).ready(function(){
    var getCounts;
    var getBanks;
    var getInfo;
    getBanks = function(){
       $.post('/siscg_bot/closediv/getBanksLiq', 'id_liquidador=' + $('#liquidador').val(),function(datos){
           $('#banksliq').html('');

           $('#banksliq').append('<option value=""> - seleccione - </option>');
           for(var i = 0; i < datos.length; i++){
               $('#banksliq').append('<option value="' + datos[i].id_banco + '">' + datos[i].name_bank + '</option>');
           }

       },'json');
    }
    $('#liquidador').change(function(){
        if(!$('#liquidador').val()){
            $('#banksliq').html('');
        }
        else{
            getBanks();
        }
    });
    getCounts = function(){
        $.post('/siscg_bot/closediv/getCountsLiq', 'id_liquidador=' + $('#liquidador').val() + '&id_banco=' + $('#banksliq').val(),function(datos){
            $('#cuentliq').html('');

            for(var i = 0; i < datos.length; i++){
                $('#cuentliq').append('<option value="' + datos[i].nro_cuenta + '">' + datos[i].nro_cuenta + '</option>');
            }

        },'json');
    }
    $('#banksliq').change(function(){
        if(!$('#banksliq').val()){
            $('#cuentliq').html('');
        }
        else{
            getCounts();
        }
    });

    getInfo = function(id){
        return $.getJSON( "/siscg_bot/closediv/getCloseDiv", { "id_cierrediv" : id });
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
                        output += "<div class='panel-body bio-graph-info'><h2>" + value['empresa'] + "</h2>";
                        output += "<h1>Id Operacion: " + value['id_operacion'] + "</h1></div>";
                        output += "<div class='row'>";
                        output += "<div class='bio-row'><p><span>Repre Legal </span>: " + value['representante_legal'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Tel. Repre Legal </span>: " + value['telefono_repre'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Pais </span>: " + value['name_country'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Banco </span>: " + value['name_bank'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Cuenta Bancaria </span>: " + value['nro_cuenta'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Nro Operacion </span>: " + value['nro_operacion'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Monto Operacion </span>: " + value['monto_operacion'] + "</p></div>";
                        output += "<div class='bio-row'><p><span>Fecha Operacion </span>: " + value['fecha_operacion'] + "</p></div>";
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
