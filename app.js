/*
-Bravo Amescua Emiliano: implemetación datos almacenados en la base
*/

fetch('listar.php')
.then(res => res.json())
.then(data => {

    // console.log(data);
    let str = '';
    data.map(item => {
        str += `
            <tr>
                <td>${item.id}</td>
                <td>${item.name}</td>
                <td>${item.ApellidoP}</td>
                <td>${item.ApellidoM}</td>
                <td>${item.curp}</td>
                <td>${item.password}</td>
                <td>${item.email}</td>
                <td>${item.phone}</td>
                <td>${ (item.habilitado == 1) ? '<span class="badge rounded-pill bg-success">Aceptado</span>' : '<span class="badge rounded-pill bg-danger">Rechazado</span>' }</td>
                <td>Cambiar</td>
            </tr>

            
        `
    });

    document.getElementById('table_data').innerHTML = str;
});