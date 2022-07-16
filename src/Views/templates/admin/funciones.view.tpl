<h1> Funciones </h1>

<section>
    <table>
        <thead>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Tipo</th>
            <th><a href="index.php?page=admin_funcion&mode=INS">Nuevo</a></th>
        </thead>
        <tbody>
            {{foreach Funciones}}
                <tr>
                    <td>{{fncod}}</td>
                    <td><a href="index.php?page=admin_funcion&mode=DSP&id={{fncod}}">{{fndsc}}</a></td>
                    <td>{{fnest}}</td>
                    <td>{{fntyp}}</td>
                    <td>
                        <a href="index.php?page=admin_funcion&mode=UPD&id={{fncod}}">Editar</a>
                        &nbsp;
                        <a href="index.php?page=admin_funcion&mode=DEL&id={{fncod}}">Eliminar</a>
                    </td>
                </tr>
            {{endfor Funciones}}
        </tbody>
    </table>
</section>