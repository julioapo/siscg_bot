/**
 * Created by tecnico on 10/07/16.
 */
$(document).ready(function(){
    var getCloseMat;
    $('#ley').blur(function(){
        var $puro = 0;
        var $gramos = $('#gramos').val();
        var $ley = $('#ley').val();
        $gramos = $gramos.replace('.','');
        $gramos = $gramos.replace(',','.');
        $gramos = parseFloat($gramos);
        $ley = $ley.replace('.','');
        $ley = $ley.replace(',','.');
        $ley = parseFloat($ley);
        $puro = ($ley * $gramos) / 1000;
        $puro = formatear_moneda($puro);
        $('#puro').val($puro);
    });
    getCloseMat = function(){
       $.post('/siscg_bot/entmat/getCierreMat', 'id_mamat=' + $('#id_mamat').val(),function(datos){
           $('#id_closemat').html('');

           $('#id_closemat').append('<option value=""> - seleccione - </option>');
           for(var i = 0; i < datos.length; i++){
               $('#id_closemat').append('<option value="' + datos[i].id_closemat + '">' + datos[i].nro_closemat + '</option>');
           }

       },'json');
    }
    $('#id_mamat').change(function(){
        if(!$('#id_mamat').val()){
            $('#id_closemat').html('');
        }
        else{
            getCloseMat();
        }
    });
});
