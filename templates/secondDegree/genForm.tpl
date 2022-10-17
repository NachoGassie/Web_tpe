
<div class="form small genre">
    <form action='{if $genUpdate} updateGen {else} createGen {/if}' method='post'>
        {if $genUpdate}
            <input type='hidden' value='{$genUpdate->id_genero}' name='id' id='id'>
        {/if}
        <label for='newGen'>{if $genUpdate} Modificar {else} Crear {/if}  Genero</label>
        <input type='text' name='newGen' id='newGen' {if $genUpdate} value='{$genUpdate->genero}' {/if}>

        <input type='submit' value='Guardar'>
    </form>
</div>