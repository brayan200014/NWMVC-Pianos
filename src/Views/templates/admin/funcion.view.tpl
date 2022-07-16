<h1>{{mode_desc}}</h1>

<section>
    <form action="index.php?page=admin_funcion" method="post">
        <input type="hidden" name="mode" id="mode" value="{{mode}}">
       
        <fieldset {{type}}>
            <label for="fncod" >Codigo: </label>
            <input {{if readonly}} readonly {{endif readonly}} type="text" name="fncod" id="fncod" value="{{fncod}}" placeholder="Codigo">
            {{if error_fncod}}
                {{foreach error_fncod}}
                    <div class="error">{{this}}</div>
                {{endfor error_fncod}}
            {{endif error_fncod}}
        </fieldset>

        <fieldset>
            <label for="fndsc">Descripcion: </label>
            <input {{if readonly}} readonly {{endif readonly}} type="text" name="fndsc" id="fndsc" value="{{fndsc}}" placeholder="Descripcion">
            {{if error_fndsc}}
                {{foreach error_fndsc}}
                    <div class="error">{{this}}</div>
                {{endfor error_fndsc}}
            {{endif error_fndsc}}
        </fieldset>
         <fieldset>
            <label for="fnest">Estado: </label>
            <select name="fnest" id="fnest" {{if readonly}}readonly disabled{{endif readonly}}>
                {{foreach fnestArray}}
                    <option value="{{value}}" {{selected}}>{{text}}</option>
                {{endfor fnestArray}}
            </select>
        </fieldset>
             <fieldset>
            <label for="fntyp">Tipo: </label>
            <select name="fntyp" id="fntyp" {{if readonly}}readonly disabled{{endif readonly}}>
                {{foreach fntypArray}}
                    <option value="{{value}}" {{selected}}>{{text}}</option>
                {{endfor fntypArray}}
            </select>
        </fieldset>
        <fieldset>
        {{if showBtn}}
            <button type="submit" name="btnEnviar">{{btnEnviarText}}</button>
            &nbsp;
        {{endif showBtn}}
        <button name="btnCancelar" id="btnCancelar">Cancelar</button>
        </fieldset>
    </form>
</section>
<script>
   document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('btnCancelar').addEventListener('click', function(e) {
                e.preventDefault(); 
                e.stopPropagation();
                window.location.href= 'index.php?page=admin_funciones';
        });
   });
</script>