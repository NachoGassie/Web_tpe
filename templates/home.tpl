{include file="secondDegree/header.tpl"}


    {foreach from=$peliculas item=$peli}
        <div class="movieContainer">
        
            <div class="movieData">
                <img src="{$peli->poster}" alt="{$peli->titulo}" title="{$peli->titulo}">
                <div class="dataContainer">
                    <h3 class="data">{$peli->titulo}</h3>
                    <h4 class="data">Genero: {$peli->genero}</h4>
                    <h5 class="data">Año: {$peli->anio_lanzamiento}</h5>
                    <p class="data">{$peli->sinopsis}</p>
                </div>
            </div>
        
            <div class="btnContainer">
                <button class="btn particular"><a href='id/{$peli->id}'>Ver más</a></button>
            {if $isAdmin}
                <button class="btn"><a href='showForm/{$peli->id}'>Editar</a></button>
                <button class="btn"><a href='deleteMovie/{$peli->id}'>Eliminar</a></button> 
            {/if}
            </div>
        </div>
    {/foreach}

{include file="secondDegree/footer.tpl"}