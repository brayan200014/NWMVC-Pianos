<h1>Listado Candidatos</h1>

<section>
    <table>
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Identidad</th>
            <th>Edad</th>
            <th><a href="index.php?page=mnt_candidato&mode=INS">Nuevo</a></th>
        </thead>
        <tbody>
            {{foreach Candidatos}}
                  <tr>
                <td>{{id}}</td>
                <td><a href="index.php?page=mnt_candidato&mode=DSP&id={{id}}">{{nombre}}</a></td>
                <td>{{identidad}}</td>
                <td>{{edad}}</td>
                <td><a href="index.php?page=mnt_candidato&mode=UPD&id={{id}}">Editar</a></td>
                <td><a href="index.php?page=mnt_candidato&mode=DEL&id={{id}}">Eliminar</a></td>
            </tr>
            {{endfor Candidatos}}
        </tbody>
    </table>
</section>