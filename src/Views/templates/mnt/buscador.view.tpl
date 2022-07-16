
<form action="index.php?page=Mnt-buscador" method="post">
    <fieldset>
        <label for="filtrar">Filtrar por: </label>      
        <input type="radio" name="filtrar" id="filtrar" value="DSC" {{if isCheckedDsc}}checked{{endif isCheckedDsc}}> Descripción 
        <input type="radio" name="filtrar" id="filtrar" value="RNG" {{if isCheckedRng}}checked{{endif isCheckedRng}}> Rango 
    </fieldset>
    <fieldset>
        <label for="filter">Buscar: </label>
        <input type="text" name="filter" id="filter" placeholder="Descripcion" value="{{desc}}">
    </fieldset>
    <fieldset>
        <label for="rangoMin">Precio minimo: </label>
        <input type="number" name="rangoMin" id="rangoMin" value="{{min}}">
    </fieldset>
    <fieldset>
        <label for="rangoMax">Precio maximo: </label>
        <input type="number" name="rangoMax" id="rangoMax" value="{{max}}">
    </fieldset>
    <fieldset>
        <button type="submit" name="btnBuscar">Buscar</button>
    </fieldset>
</form>

<section class="packages" id="packages">
            <h1 class="heading">
                Resultados:
            </h1>
        <div class="box-container">
            {{foreach Productos}}
            <div class="box">
                <img src="https://images.pexels.com/photos/934070/pexels-photo-934070.jpeg?cs=srgb&dl=pexels-ylanite-koppens-934070.jpg&fm=jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i>{{invPrdDsc}}</h3>
                    <p>{{invPrdTip}}</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> {{invPrdPrecio}} </div>
                    <a href="#" class="btn">Detalle</a>
                </div>
            </div>
            {{endfor Productos}}
        </div>
        </section>
