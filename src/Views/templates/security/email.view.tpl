
 
 <section class="fullCenter">
    <form class="grid" action="index.php?page=sec_email" method="post">
        <section class="depth-1 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3">
             <h1 class="col-12">Ingresar Correo</h1>
        </section>
        <section class="depth-1 py-5 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3">
            <div class="row">
                <label class="col-12 col-m-4 flex align-center" for="txtEmail">Correo Electronico: </label>
                    <div class="col-12 col-m-8">
                    <input class="width-full" type="email" id="textEmail" name="txtEmail" />
                    </div>
                     {{if errorEmail}}
                    <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorEmail}}</div>
                    {{endif errorEmail}}
                    {{if generalError}}
                    <div class="row">
                        {{generalError}}
                    </div>
                    {{endif generalError}}
            </div>
        <div class="row right flex-end px-4">
          <button class="primary" id="btnEmail" type="submit">Enviar Correo</button>
        </div>
        </section>
    </form>
</section>
