<h1>Listado de Pianos</h1>

<section>
    <table>
        <thead>
            <th>Id</th>
            <th>Descripcion</th>
            <th>Biografia</th>
            <th>Ventas</th>
            <th>Uri</th>
            <th>IMG THB</th>
            <th>Precio</th>
            <th>Estado</th>
            <th><a href="index.php?page=mnt_piano&mode=INS">Nuevo</a></th>
        </thead>
        <tbody>
            {{foreach Pianos}}
            <tr>
                <td>{{pianoid}}</td>
                <td><a href="index.php?page=mnt_piano&mode=DSP&id={{pianoid}}">{{pianodsc}}</a></td>
                <td>{{pianobio}}</td>
                <td>{{pianosales}}</td>
                <td>{{pianoimguri}}</td>
                <td>{{pianoimgthb}}</td>
                <td>{{pianoprice}}</td>
                <td>{{pianoest}}</td>
                <td><a href="index.php?page=mnt_piano&mode=UPD&id={{pianoid}}">Editar</a></td>
                <td><a href="index.php?page=mnt_piano&mode=DEL&id={{pianoid}}">Eliminar</a></td>
            </tr>
            {{endfor Pianos}}
        </tbody>
    </table>
</section>