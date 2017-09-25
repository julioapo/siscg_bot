<?php
/* Smarty version 3.1.29, created on 2016-07-18 22:03:14
  from "/var/www/html/siscg_bot/views/layout/default/scripts.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578d8a6206c1a2_18598788',
  'file_dependency' => 
  array (
    '79b5fa5984533e05eede8afb7befd2f912e05006' => 
    array (
      0 => '/var/www/html/siscg_bot/views/layout/default/scripts.tpl',
      1 => 1467933184,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578d8a6206c1a2_18598788 ($_smarty_tpl) {
?>
function logout() {
    swal({
        title: "¿Seguro que deseas Salir?",
        text: "No podrás deshacer este paso...",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Nop",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "¡Salir!",
        closeOnConfirm: false
    },
    function(){
        swal(parent.location='<?php echo BASE_URL;?>
login/logout',"logOut");
    });
};
function pregunta($var){
    swal({
        title: "¿Seguro que deseas Eliminar?",
        text: "No podrás deshacer este paso...",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Nop",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "¡Eliminar!",
        closeOnConfirm: false
    },
    function(){
        swal(parent.location=$var,"Eliminado");
    });
};<?php }
}
