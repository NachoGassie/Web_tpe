{include file="secondDegree/header.tpl"}

<div class="errorMsg">
    <h1>Error</h1>
    <h3>{$msg}</h3> 
    <p><a href='{if $url} {$url} {else} home {/if}'> Volver </a></p>
</div>


{include file="secondDegree/footer.tpl"}