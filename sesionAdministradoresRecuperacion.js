/*
-Gaytan Diego Edgar David : Creacion Archivo para los administradores junto con variables y funciones
*/
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

form_AdminRecuperacion.addEventListener("submit", f => {
    f.preventDefault()
    //alert("Entre");
   
    var usuarioNameAdmin = document.getElementById("unameAdmin").value;
    var namAdmin = document.getElementById("nameAdmin").value;


    const resultadoUsuario = Admministrador.find(Administrador => Administrador.usuario === usuarioNameAdmin)
    const resultadoNombre = Admministrador.find(Administrador => Administrador.nombre === namAdmin)


    if (resultadoNombre == undefined) {
        //alert("Nombre no encontrado");
        location.href = 'pagNombreNoEncontrado.html';
        

    } else {

        if (resultadoUsuario == undefined) {
            //alert("Usuario no encontrado");
            location.href = 'pagUsuarioNoEncontrado.html';

        } else {
            const resultadoPass = Admministrador.map(Administrador =>{
                if(Administrador.nombre===namAdmin && Administrador.usuario===usuarioNameAdmin){
                    //alert(Administrador.password);
                    //location.href = 'pagContraseñaRecAdmin.html' + encodeURIComponent(Administrador.password);
                    localStorage.setItem('Administrador.password', Administrador.password);
                    location.href = 'pagContraseñaRecAdmin.html';
                }
            } 
                )

        }


    }

})
