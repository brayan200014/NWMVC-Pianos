
    <section class="fullCenter">
    <form class="grid" action="index.php?page=sec_recovery&id={{id}}" method="post">
        <input type="hidden" name="id" id="id" value="{{id}}">
        <section class="depth-1 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3">
             <h1 class="col-12">Ingresar Pin</h1>
        </section>
        <section class="depth-1 py-5 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3">
            <div class="row">
                <label class="col-12 col-m-4 flex align-center" for="pin">Pin: </label>
                    <div class="col-12 col-m-8">
                    <input class="width-full" type="text" id="pin" name="pin" />
                    </div>
                     {{if errorPin}}
                    <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorPin}}</div>
                    {{endif errorPin}}
            </div>
        <div class="row right flex-end px-4">
          <button class="primary" id="btnPin" type="submit">Enviar Pin</button>
        </div>
        </section>
    </form>
</section>
