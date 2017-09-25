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
        swal(parent.location='{BASE_URL}login/logout',"logOut");
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
};