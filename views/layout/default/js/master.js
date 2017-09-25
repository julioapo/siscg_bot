/**
 * master.js
 *
 * Resumen:
 *
 * Set de funciones o Plugins predefinidas por el desarrollador
 *
 * Autor:
 *
 * Julio Aponte - apontejuliocesar@gmail.com
 *
 * Revision:
 *
 * 04/07/2016
 */

var cuenta = 0;

function pregunta() {
    if(confirm('Estas seguro de eliminar el registro?'))
        return true;
    else
        return false;

}

function formato_moneda(fld, milSep, decSep, e) {
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true;                         // Enter
    if (whichCode == 8) return true;                             // Enter
    if (whichCode == 46) return true;                        // Enter
    if (whichCode == 0) return true;                             // Tab
    key = String.fromCharCode(whichCode);                 // Consigue el valor del codigo de tecla...
    if (strCheck.indexOf(key) == -1) return false;     // no es una tecla valida
    len = fld.value.length;
    for(i = 0; i < len; i++)
        if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep)) break;
    aux = '';
    for(; i < len; i++)
        if (strCheck.indexOf(fld.value.charAt(i))!=-1) aux += fld.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) fld.value = '';
    if (len == 1) fld.value = '0'+ decSep + '0' + aux;
    if (len == 2) fld.value = '0'+ decSep + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += milSep;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        fld.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
            fld.value += aux2.charAt(i);
        fld.value += decSep + aux.substr(len - 2, len);
    }
    return false;
}
function formatear_moneda(valor,prefix){
    prefix = prefix || '';
    valor += '';
    var splitStr = valor.split('.');
    var splitLeft = splitStr[0];
    var splitRight = splitStr.length > 1 ? ',' + splitStr[1] : ',00';
    var regx = /(\d+)(\d{3})/;
    while (regx.test(splitLeft)) {
        splitLeft = splitLeft.replace(regx, '$1' + '.' + '$2');
    }
    return prefix + splitLeft + splitRight;
}

function convierte_numero(valor){
    new_number = valor;
    while(new_number.indexOf('.')!=-1)new_number=new_number.replace('.','')
    new_number = new_number.replace(',','.');
    new_number = Number(new_number);
    return(new_number);
}
