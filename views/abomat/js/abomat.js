/**
 * Created by tecnico on 10/07/16.
 */
$(document).ready(function(){
    var getCloseMat;
    var getCounts;
    var getBanks;
    getCloseMat = function(){
        $.post('/siscg_bot/abomat/getCierreMat', 'id_mamat=' + $('#id_mamat').val(),function(datos){
           $('#id_closemat').html('');

           $('#id_closemat').append('<option value=""> - seleccione - </option>');
           for(var i = 0; i < datos.length; i++){
               $('#id_closemat').append('<option value="' + datos[i].id_closemat + '">' + datos[i].nro_closemat + '</option>');
           }

        },'json');
        $.post('/siscg_bot/abomat/getCliMat', 'id_mamat=' + $('#id_mamat').val(),function(datos2){
            $('#id_cliente').html('');

            $('#id_cliente').append('<option value=""> - seleccione - </option>');
            for(var i = 0; i < datos2.length; i++){
                $('#id_cliente').append('<option value="' + datos2[i].id_mamat + '">' + datos2[i].nombres_apellidos + '</option>');
            }

        },'json');
    }
    $('#id_mamat').change(function(){
        if(!$('#id_mamat').val()){
            $('#id_closemat').html('');
            $('#id_cliente').html('');
        }
        else{
            getCloseMat();
        }
    });
    getBanks = function(){
        $.post('/siscg_bot/abomat/getBanksCli', 'id_cliente=' + $('#id_cliente').val(),function(datos){
            $('#id_bank').html('');

            $('#id_bank').append('<option value=""> - seleccione - </option>');
            for(var i = 0; i < datos.length; i++){
                $('#id_bank').append('<option value="' + datos[i].id_banco + '">' + datos[i].name_bank + '</option>');
            }

        },'json');
    }
    $('#id_cliente').change(function(){
        if(!$('#id_cliente').val()){
            $('#id_bank').html('');
        }
        else{
            getBanks();
        }
    });
    getCounts = function(){
        $.post('/siscg_bot/abomat/getCountsCli', 'id_cliente=' + $('#id_cliente').val() + '&id_banco=' + $('#id_bank').val(),function(datos){
            $('#cuentcli').html('');

            for(var i = 0; i < datos.length; i++){
                $('#cuentcli').append('<option value="' + datos[i].nro_cuenta + '">' + datos[i].nro_cuenta + '</option>');
            }

        },'json');
    }
    $('#id_bank').change(function(){
        if(!$('#id_bank').val()){
            $('#cuentcli').html('');
        }
        else{
            getCounts();
        }
    });
});
