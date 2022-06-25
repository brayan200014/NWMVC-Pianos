<h1>{{mode_desc}}</h1>

<section>
    <form action="index.php?page=mnt_piano" method="post">
        <input type="hidden" name="mode" id="mode" value="{{mode}}">
        <input type="hidden" name="crsf_token" value="{{crsf_token}}" />
        <input type="hidden" name="pianoid" id="pianoid" value="{{pianoid}}">
        <fieldset>
            <label for="pianodsc">Descripcion</label>
            <input {{if readonly}}readonly{{endif readonly}} type="text" name="pianodsc" id="pianodsc" value="{{pianodsc}}" placeholder="Descripcion">
            {{if error_pianodsc}}
                {{foreach error_pianodsc}}
                    <div class="error">{{this}}</div>
                {{endfor error_pianodsc}}
            {{endif error_pianodsc}}
        </fieldset>
        <fieldset>
            <label for="pianobio">Biografia</label>
            <input {{if readonly}}readonly{{endif readonly}} type="text" name="pianobio" id="pianobio" value="{{pianobio}}" placeholder="Biografia">
            {{if error_pianobio}}
                {{foreach error_pianobio}}
                    <div class="error">{{this}}</div>
                {{endfor error_pianobio}}
            {{endif error_pianobio}}
        </fieldset>
         <fieldset>
            <label for="pianosales">Ventas</label>
            <input {{if readonly}}readonly{{endif readonly}} type="text" name="pianosales" id="pianosales" value="{{pianosales}}" placeholder="Ventas">
            {{if error_pianosales}}
                {{foreach error_pianosales}}
                    <div class="error">{{this}}</div>
                {{endfor error_pianosales}}
            {{endif error_pianosales}}
        </fieldset>
         <fieldset>
            <label for="pianoimguri">Imagen Uri</label>
            <input {{if readonly}}readonly{{endif readonly}} type="text" name="pianoimguri" id="pianoimguri" value="{{pianoimguri}}" placeholder="Uri">
            {{if error_pianoimguri}}
                {{foreach error_pianoimguri}}
                    <div class="error">{{this}}</div>
                {{endfor error_pianoimguri}}
            {{endif error_pianoimguri}}
        </fieldset>
        <fieldset>
            <label for="pianoimgthb">Imagen THB</label>
            <input {{if readonly}}readonly{{endif readonly}} type="text" name="pianoimgthb" id="pianoimgthb" value="{{pianoimgthb}}" placeholder="Imagen THB">
        </fieldset>
         <fieldset>
            <label for="pianoprice">Precio</label>
            <input {{if readonly}}readonly{{endif readonly}} type="text" name="pianoprice" id="pianoprice" value="{{pianoprice}}" placeholder="Precio">
            {{if error_pianoprice}}
                {{foreach error_pianoprice}}
                    <div class="error">{{this}}</div>
                {{endfor error_pianoprice}}
            {{endif error_pianoprice}}
        </fieldset>
         <fieldset>
            <label for="pianoest">Estado</label>
            <select name="pianoest" id="pianoest" {{if readonly}}readonly disabled{{endif readonly}}>
                {{foreach pianoestArray}}
                <option value="{{value}}" {{selected}}>{{text}}</option>
                {{endfor pianoestArray}}
            </select>
        </fieldset>
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
            window.location.href= "index.php?page=mnt_pianos";
        });
    })
</script>