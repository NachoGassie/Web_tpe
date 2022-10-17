{include file="secondDegree/header.tpl"}

<div class="form">
    <form action='{if $peli} updateMovie {else} createMovie {/if}' method='post' enctype="multipart/form-data">

        {if $peli}
            <input type='hidden' value='{$peli->id}' name='id' id='id'>
        {/if}

        <label for='title'>Titulo</label>
        <input type='text' name='title' id='title' {if $peli} value='{$peli->titulo}' {/if}>

        <label for='poster'>Poster</label>
        <input type='file' name='poster' id='poster' accept="image/jpg, image/jpeg, image/png">

        <label for='sinopsis'>Sinopsis</label>
        <input type='text' name='sinopsis' id='sinopsis' {if $peli} value='{$peli->sinopsis}' {/if}>

        <label for='añoEstreno'>Año de Lanzamiento</label>
        <input type='text' name='añoEstreno' id='añoEstreno' {if $peli} value='{$peli->anio_lanzamiento}' {/if}>

        <label for='genero'>Generos</label>
        <select name='genero' id='genero'>
        {foreach from=$generos item=$gen}
            <option value='{$gen->id_genero}'>{$gen->genero}</option>
        {/foreach}
        </select>
        
        <input type='submit' value='{if $peli} modificar {else} agregar {/if}'>
    </form>
</div>

{include file="secondDegree/footer.tpl"}