<div id="cat" class="chemin"> {$categorie}</div>
<br />
{if $affiche_cat == "true"}
<div class="rep">{$contenu}</div>
{/if}
<br />
{if $affiche_liste == "true"}

<div class="liste">
{$art_titre}
{if $nbr_pages > 1}
<div class="pages">
{$pages}
</div>
{/if}
{$liste}
{if $nbr_pages > 1}
<div class="pages">
{$pages}
</div>
{/if}
</div>

{/if}



