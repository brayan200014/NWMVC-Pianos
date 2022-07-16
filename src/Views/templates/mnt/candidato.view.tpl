<h1>{{mode_desc}}</h1>

<section>
    <form action="index.php?page=mnt_candidato" method="post">
        <input type="hidden" name="mode" id="mode" value="{{mode}}">
        <input type="hidden" name="id" id="id" value="{{id}}">
        <fieldset>
            <label for="nombre">Nombre</label>
            <input {{if readonly}}readonly{{endif readonly}} type="text" name="nombre" id="nombre" value="{{nombre}}" placeholder="Nombre">
            {{if error_nombre}}
                {{foreach error_nombre}}
                    <div class="error">{{this}}</div>
                {{endfor error_nombre}}
            {{endif error_nombre}}
        </fieldset>
        <fieldset>
            <label for="identidad">Identidad</label>
            <input {{if readonly}}readonly{{endif readonly}} type="text" name="identidad" id="identidad" value="{{identidad}}" placeholder="Identidad">
            {{if error_identidad}}
                {{foreach error_identidad}}
                    <div class="error">{{this}}</div>
                {{endfor error_identidad}}
            {{endif error_identidad}}
        </fieldset>
         <fieldset>
            <label for="edad">Edad</label>
            <input {{if readonly}}readonly{{endif readonly}} type="text" name="edad" id="edad" value="{{edad}}" placeholder="Edad">
            {{if error_edad}}
                {{foreach error_edad}}
                    <div class="error">{{this}}</div>
                {{endfor error_edad}}
            {{endif error_edad}}
      
        <fieldset>
            {{if showBtnEnviar}}
                <button name="btnEnviar" type="submit">{{btnEnviarText}}</button>
            {{endif showBtnEnviar}}
             &nbsp;
            <button name="btnCancelar" id="btnCancelar">Cancelar</button>
        </fieldset>
    </form>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('btnCancelar').addEventListener('click', function(e) {
            e.preventDefault(); 
            e.stopImmediatePropagation();
            window.location.href= "index.php?page=mnt_candidatos";
        });
    })
</script>