<section class="fullCenter">
    <form class="grid" action="index.php?page=sec_reset&id={{id}}" method="post">
        <input type="hidden" name="id" id="id" value="{{id}}">
        <section class="depth-1 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3">
             <h1 class="col-12">Creacion Nueva Contraseña</h1>
        </section>
        <section class="depth-1 py-5 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3">
            <div class="row">
                <label class="col-12 col-m-4 flex align-center" for="pswd">Nueva Contraseña: </label>
                    <div class="col-12 col-m-8">
                    <input class="width-full" type="password" id="pswd" name="pswd" />
                    </div>
            </div>
             <div class="row">
                <label class="col-12 col-m-4 flex align-center" for="pswdConfirm">Confirmar Contraseña: </label>
                    <div class="col-12 col-m-8">
                    <input class="width-full" type="password" id="pswdConfirm" name="pswdConfirm" />
                    </div>
                     {{if errorPswdFormat}}
                    <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorPswdFormat}}</div>
                    {{endif errorPswdFormat}}
                    {{if errorPswd}}
                    <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorPswd}}</div>
                    {{endif errorPswd}}
            </div>
        <div class="row right flex-end px-4">
          <button class="primary" id="btnConfirm" type="submit">Confirmar </button>
        </div>
        </section>
    </form>
</section>