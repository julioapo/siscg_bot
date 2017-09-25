var Script = function () {

    $().ready(function () {
        // validate the comment form when it is submitted
        $("#new_cierrediv").validate({
            rules: {
                liquidador:{
                    required: true
                },
                banksliq: {
                    required: true
                },
                cuentliq:{
                    required: true
                },
                fecha_closediv: {
                    required: true
                },
                tip_tranbank:{
                    required: true
                },
                nro_transaccion: {
                    required: true
                },
                monto_transaccion:{
                    required: true
                },
                concepto: {
                    required: true
                },
                country: {
                    required: true
                }
            },
            messages:{
                liquidador:{
                    required: "Campo obligatorio"
                },
                banksliq: {
                    required: "Campo obligatorio"
                },
                cuentliq:{
                    required: "Campo obligatorio"
                },
                fecha_closediv: {
                    required: "Campo obligatorio"
                },
                tip_tranbank:{
                    required: "Campo obligatorio"
                },
                nro_transaccion: {
                    required: "Campo obligatorio"
                },
                nonto_transaccion:{
                    required: "Campo obligatorio"
                },
                concepto: {
                    required: "Campo obligatorio"
                },
                country: {
                    required: "Campo obligatorio"
                }
            }
        });
        $("#new_cierrediv").validate({
            rules: {
                nombre:{
                    required: true,
                    minlength: 6
                },
                telefono:{
                    required: true,
                    minlength: 10
                }
            },
            messages:{
                nombre:{
                    required: "Nombre obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                telefono:{
                    required: "Telefono obligatorio",
                    minlength: "Debe contener al menos 10 caracteres"
                }
            }
        });
        $("#new_permiso").validate({
            rules: {
                permiso:{
                    required: true,
                    minlength: 5
                },
                key: {
                    required: true,
                    minlength: 5
                }
            },
            messages:{
                permiso:{
                    required: "Nombre permiso obligatorio",
                    minlength: "Debe contener al menos 5 caracteres"
                },
                key: {
                    required: "(Key)Llave es obligatorio",
                    minlength: "Debe contener al menos 5 caracteres"
                }
            }
        });
        $("#new_bank").validate({
            rules: {
                nombre:{
                    required: true,
                    minlength: 6
                },
                telefono:{
                    required: true,
                    minlength: 10
                }
            },
            messages:{
                nombre:{
                    required: "Nombre obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                telefono:{
                    required: "Telefono obligatorio",
                    minlength: "Debe contener al menos 10 caracteres"
                }
            }
        });
        $("#new_rol").validate({
            rules: {
                nombre:{
                    required: true,
                    minlength: 6
                }
            },
            messages:{
                nombre:{
                    required: "Nombre de rol es obligatorio",
                    minlength: "Debe contener al menos 6 caracteres ingrese codigo de area"
                }
            }
        });
        $("#edit_usuario").validate({
            rules: {
                telefono:{
                    required: true,
                    minlength: 11
                },
                email: {
                    email: true
                }
            },
            messages:{
                telefono:{
                    required: "Telefono es obligatorio",
                    minlength: "Debe contener al menos 11 caracteres ingrese codigo de area"
                },
                email: {
                    email: "Coloque una direccion valida de e-mail"
                }
            }
        });
        $("#new_usuario").validate({
            rules: {
                nombre:{
                    required: true,
                    minlength: 6
                },
                cedula:{
                    required: true,
                    minlength: 7
                },
                telefono:{
                    required: true,
                    minlength: 11
                },
                userlogin:{
                    required: true,
                    minlength: 8
                },
                email: {
                    email: true
                }
            },
            messages:{
                nombre:{
                    required: "Nombre obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                cedula:{
                    required: "Cedula obligatorio",
                    minlength: "Debe contener al menos 7 caracteres"
                },
                telefono:{
                    required: "Telefono es obligatorio",
                    minlength: "Debe contener al menos 11 caracteres ingrese codigo de area"
                },
                userlogin:{
                    required: "login de usuario obligatorio",
                    minlength: "Debe contener al menos 8 caracteres"
                },
                email: {
                    email: "Coloque una direccion valida de e-mail"
                }
            }
        });
        $("#edit_cliente").validate({
            rules: {
                nombre:{
                    required: true,
                    minlength: 6
                },
                telefono_movil:{
                    required: true,
                    minlength: 11
                },
                direccion:{
                    required: true,
                    minlength: 15
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages:{
                nombre:{
                    required: "Nombre obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                telefono_movil:{
                    required: "Telefono Movil es obligatorio",
                    minlength: "Debe contener al menos 11 caracteres ingrese codigo de area"
                },
                direccion:{
                    required: "Direccion de usuario obligatorio",
                    minlength: "Debe contener al menos 15 caracteres"
                },
                email: {
                    required: "@mail es obligatorio",
                    email: "Coloque una direccion valida de e-mail"
                }
            }
        });
        $("#new_cierremat").validate({
            rules: {
                gramas_close:{
                    required: true
                },
                precio_gramas:{
                    required: true,
                }
            },
            messages:{
                gramas_close:{
                    required: "Gramas Cerradas Obligatorio"
                },
                precio_gramas:{
                    required: "Costo de Grama Obligatorio"
                }
            }
        });
        $("#new_cliente").validate({
            rules: {
                nombre:{
                    required: true,
                    minlength: 6
                },
                cedula:{
                    required: true,
                    minlength: 7
                },
                telefono_movil:{
                    required: true,
                    minlength: 11
                },
                direccion:{
                    required: true,
                    minlength: 15
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages:{
                nombre:{
                    required: "Nombre obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                cedula:{
                    required: "Cedula obligatorio",
                    minlength: "Debe contener al menos 7 caracteres"
                },
                telefono_movil:{
                    required: "Telefono Movil es obligatorio",
                    minlength: "Debe contener al menos 11 caracteres ingrese codigo de area"
                },
                direccion:{
                    required: "Direccion de usuario obligatorio",
                    minlength: "Debe contener al menos 15 caracteres"
                },
                email: {
                    required: "@mail es obligatorio",
                    email: "Coloque una direccion valida de e-mail"
                }
            }
        });
        $("#new_mamat").validate({
            rules: {
                nombre:{
                    required: true,
                    minlength: 6
                },
                rif:{
                    required: true,
                    minlength: 7
                },
                contacto:{
                    required: true,
                    minlength: 6
                },
                telefono_contacto:{
                    required: true,
                    minlength: 6
                },
                email: {
                    email: true
                }
            },
            messages:{
                nombre:{
                    required: "Nombre obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                rif:{
                    required: "Rif y/o Cedula obligatorio",
                    minlength: "Debe contener al menos 7 caracteres"
                },
                contacto:{
                    required: "Nombre de contacto obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                telefono_contacto:{
                    required: "Telefono de contacto obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                email: {
                    email: "Coloque una direccion valida de e-mail"
                }
            }
        });
        $("#edit_mamat").validate({
            rules: {
                contacto:{
                    required: true,
                    minlength: 6
                },
                telefono_contacto:{
                    required: true,
                    minlength: 6
                },
                email: {
                    email: true
                }
            },
            messages:{
                contacto:{
                    required: "Nombre de contacto obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                telefono_contacto:{
                    required: "Telefono de contacto obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                email: {
                    email: "Coloque una direccion valida de e-mail"
                }
            }
        });
        $("#new_comprador").validate({
            rules: {
                nombre:{
                    required: true,
                    minlength: 6
                },
                telefono_fijo:{
                    required: true,
                    minlength: 6
                },
                direccion:{
                    required: true,
                    minlength: 15
                },
                email: {
                    required: true,
                    email: true
                },
                repre_legal:{
                    required: true,
                    minlength: 6
                },
                telefono_repre:{
                    required: true,
                    minlength: 6
                }
            },
            messages:{
                nombre:{
                    required: "Nombre obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                telefono_fijo:{
                    required: "Telefono fijo obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                direccion:{
                    required: "Direccion obligatoria",
                    minlength: "Debe contener al menos 15 caracteres"
                },
                email:{
                    required: "@mail es obligatorio",
                    email: "Coloque una direccion valida de e-mail"
                },
                repre_legal:{
                    required: "Representante legal obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                telefono_repre:{
                    required: "Telefono de representante obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                }
            }
        });
        $("#new_colocador").validate({
            rules: {
                nombre:{
                    required: true,
                    minlength: 6
                },
                telefono_fijo:{
                    required: true,
                    minlength: 6
                },
                direccion:{
                    required: true,
                    minlength: 15
                },
                email: {
                    required: true,
                    email: true
                },
                representante_legal:{
                    required: true,
                    minlength: 6
                },
                telefono_repre:{
                    required: true,
                    minlength: 6
                }
            },
            messages:{
                nombre:{
                    required: "Nombre obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                telefono_fijo:{
                    required: "Telefono fijo obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                direccion:{
                    required: "Direccion obligatoria",
                    minlength: "Debe contener al menos 15 caracteres"
                },
                email:{
                    required: "@mail es obligatorio",
                    email: "Coloque una direccion valida de e-mail"
                },
                representante_legal:{
                    required: "Representante legal obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                telefono_repre:{
                    required: "Telefono de representante obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                }
            }
        });
        $("#edit_colocador").validate({
            rules: {
                telefono_fijo:{
                    required: true,
                    minlength: 6
                },
                direccion:{
                    required: true,
                    minlength: 15
                },
                email: {
                    required: true,
                    email: true
                },
                representante_legal:{
                    required: true,
                    minlength: 6
                },
                telefono_repre:{
                    required: true,
                    minlength: 6
                }
            },
            messages:{
                telefono_fijo:{
                    required: "Telefono fijo obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                direccion:{
                    required: "Direccion obligatoria",
                    minlength: "Debe contener al menos 15 caracteres"
                },
                email:{
                    required: "@mail es obligatorio",
                    email: "Coloque una direccion valida de e-mail"
                },
                representante_legal:{
                    required: "Representante legal obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                },
                telefono_repre:{
                    required: "Telefono de representante obligatorio",
                    minlength: "Debe contener al menos 6 caracteres"
                }
            }
        });
        $("#feedback_form").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6
                },
                cpassword: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                }
            },
            messages:{
                password: {
                    required: "Campo obligatorio",
                    minlength: "Su password debe contener minimo 6 caracteres."
                },
                cpassword: {
                    required: "Confirme su password.",
                    minlength: "Su password debe contener minimo 6 caracteres.",
                    equalTo: "Sus password no coinciden."
                }
            }
        });
        // validate signup form on keyup and submit
        $("#register_form").validate({
            rules: {
                fullname: {
                    required: true,
                    minlength: 6
                },
                address: {
                    required: true,
                    minlength: 10
                },
                username: {
                    required: true,
                    minlength: 5
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                fullname: {
                    required: "Please enter a Full Name.",
                    minlength: "Your Full Name must consist of at least 6 characters long."
                },
                address: {
                    required: "Please enter a Address.",
                    minlength: "Your Address must consist of at least 10 characters long."
                },
                username: {
                    required: "Please enter a Username.",
                    minlength: "Your username must consist of at least 5 characters long."
                },
                password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 5 characters long."
                },
                confirm_password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 5 characters long.",
                    equalTo: "Please enter the same password as above."
                },
                email: "Please enter a valid email address.",
                agree: "Please accept our terms & condition."
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });
}();