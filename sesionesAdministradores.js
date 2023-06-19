let Admministrador = [
    {
        nombre: "Denisse",
        usuario: "Denisse",
        password: "denisse1"
    },
    {
        nombre: "Irving",
        usuario: "Irv",
        password: "Irving1"
    },
    {
        nombre: "Emiliano",
        usuario: "Emiliano",
        password: "Emiliano1"
    }
]



form_Admin.addEventListener("submit", e => {
    e.preventDefault()
    var usuarioNameAdmin = document.getElementById("unameAdmin").value;
    var passwordAdmin = document.getElementById("pswAdmin").value;


    const resultadoUsuario = Admministrador.find(Administrador => Administrador.usuario === usuarioNameAdmin)
    const resultadoPassword = Admministrador.find(Administrador => Administrador.password === passwordAdmin)


    if (resultadoUsuario == undefined) {
        //alert("Usuario no registrado");
        location.href = "pagUsuarioIncorrecto.html"

    } else {

        if (resultadoPassword == undefined) {
            //alert("Contraseña incorrecta");
            location.href = "pagContraseñaIncorrecta.html";
        } else {
            //alert("Se encontro el usuario");
            location.href = "pagMostrarSolic.html";
        }


    }
})
