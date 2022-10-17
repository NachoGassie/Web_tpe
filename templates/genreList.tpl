{include file="secondDegree/header.tpl"}

<<<<<<< HEAD
{if $isAdmin}
    <div class="genreContainer">
        <h2 class="genres h2">Modifique la Lista de Generos</h2>

        <div class="genresTableCont">
            <table>
                <thead class="genreThead">
                    <tr>
                        <td>Generos</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                    </tr>
                </thead>
                <tbody class="genreTbody">
                {foreach from=$generos item=$g}
                    <tr>
                        <td><a href="genero/{$g->id_genero}">{$g->genero}</a></td>
                        <td><button class="btn"><a href='showUpdateGen/{$g->id_genero}'>Editar</a></button></td>
                        <td><button class="btn"><a href='deleteGen/{$g->id_genero}'>Eliminar</a></button></td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
            {include file="secondDegree/genForm.tpl"} 
        </div>

    </div>

{else}
    <div class="genreContainer unlogged">
        <h2 class="genres h2">Vea cada pelicula por su genero</h2>
=======
<div class="genListContainer">
    
    {if $isAdmin}
        <h6 class="genres unlogged">Modifique la Lista de Generos</h6>
        <table>
            <thead class="genreThead">
                <tr>
                    <td>Generos</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>
            </thead>
            <tbody class="genreTbody">
            {foreach from=$generos item=$g}
                <tr>
                    <td><a href="genero/{$g->id_genero}">{$g->genero}</a></td>
                    <td><button class="btn"><a href='showUpdateGen/{$g->id_genero}'>Editar</a></button></td>
                    <td><button class="btn"><a href='deleteGen/{$g->id_genero}'>Eliminar</a></button></td>
                </tr>
            {/foreach}
            </tbody>
        </table>

    {if $isAdmin} {include file="secondDegree/genForm.tpl"} {/if}

</div>

{else}
    <div>
        <h6 class="genres unlogged">Vea cada pelicula por su genero</h6>
>>>>>>> 6c5fa87e14fb66405107159a6c98ae8c993e5201
        <ul class="genreList">
        {foreach from=$generos item=$g}
            <li><a href="genero/{$g->id_genero}">{$g->genero}</a></li>
        {/foreach}
        </ul>
    </div>
<<<<<<< HEAD
=======

>>>>>>> 6c5fa87e14fb66405107159a6c98ae8c993e5201
{/if}
{include file="secondDegree/footer.tpl"}
