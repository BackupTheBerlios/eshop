<?php

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

function numberOfItemsInCat($catid)
{
	$resultat = 0;
		
	// number of items in the cat
	$query = "SELECT COUNT(it_id) FROM ".$GLOBALS["db_prefix"]."_items WHERE it_cat_FK='".$catid."'";
	
	$recordSet = &$GLOBALS["connexion"]->Execute($query);

	if (!$recordSet) 
		echo $GLOBALS["connexion"]->ErrorMsg();
	else
		$resultat += $recordSet->fields[0];
	
	// list all the subcat
	$query = "SELECT ca_id FROM ".$GLOBALS["db_prefix"]."_cat WHERE ca_cat_FK='".$catid."'";

	$recordSet = &$GLOBALS["connexion"]->Execute($query);

	if (!$recordSet) 
		echo $GLOBALS["connexion"]->ErrorMsg();
	else
	{
		// if there are subcat
		if($recordSet->RecordCount() > 0)
		{			
			// call the same method for all the subcat and save the result
			while (!$recordSet->EOF)
			{
				$resultat += numberOfItemsInCat($recordSet->fields[0]);
							
				$recordSet->MoveNext();
			}
		}
		else // return the number of items in the cat
		{
			return $resultat;
		}	
	}
	
	return $resultat;
}

//défini le nombre de colonne du listage des sous-groupes

$nbr_colonne = 4;
$nbr_art_per_page = 10;

$contenu = null;

if(isset($_REQUEST["num_page"]))
	$num_page = $_REQUEST["num_page"];
else
	$num_page = 1;

if(isset($_REQUEST["cat"]))
{
	$query = "SELECT * FROM ".$db_prefix."_cat WHERE ca_cat_FK=".$_REQUEST["cat"];
	$recordSet = &$connexion->Execute($query);
	if (!$recordSet) 
		$contenu .= $connexion->ErrorMsg();
	else
	{	
		$template->assign('affiche_cat', 'false');
		$contenu .= '<table>';
		$i = 0;	
		
		// for each subcat in the current cat
		// count the direct number of items
		
		while (!$recordSet->EOF)
		{		
			// display sub-categories with number of items
			
			if($i%$nbr_colonne==0)
				$contenu .= '<tr>';
			$contenu .= '<td width="'.(100 / $nbr_colonne).'%">';
			$contenu .= '<b>'.numberOfItemsInCat($recordSet->fields["ca_id"]).'</b> <a href="'.$_SERVER["PHP_SELF"].'?module=mod_main&cat='.$recordSet->fields[0].'">';
			$contenu .= '<accronym title="'.$recordSet->fields["ca_description"].'">'.$recordSet->fields[1].'</accronym></a>';
			$contenu .= '</td>';
			if(($i%$nbr_colonne)==($nbr_colonne-1))
				$contenu .= '</tr>';
			$recordSet->MoveNext();
			
			$i++;
			$template->assign('affiche_cat', 'true');
		}
		$contenu .= '</table>';

		// display the cat in the top bar

		$query_art = "SELECT * FROM ".$db_prefix."_cat WHERE ca_id=".$_REQUEST["cat"];
		$recordSet_art = &$connexion->Execute($query_art);
		
		$cat_FK = $recordSet_art->fields["ca_cat_FK"];
		$categorie = '<a href="'.$_SERVER["PHP_SELF"].'?module=mod_main&cat='.$recordSet_art->fields["ca_id"].'"><accronym title="'.$recordSet_art->fields["ca_description"].'">'.$recordSet_art->fields["ca_name"].'</accronym></a>';
		
		// display subcat in the top bar
		
		while($cat_FK != 0)
		{
			$query_art = "SELECT * FROM ".$db_prefix."_cat WHERE ca_id=".$recordSet_art->fields["ca_cat_FK"];
			$recordSet_art = &$connexion->Execute($query_art);
			$categorie = '<a href="'.$_SERVER["PHP_SELF"].'?module=mod_main&cat='.$recordSet_art->fields["ca_id"].'"><accronym title="'.$recordSet_art->fields["ca_description"].'">'.$recordSet_art->fields["ca_name"]."</accronym></a> > ".$categorie;
			$cat_FK = $recordSet_art->fields["ca_cat_FK"];
		}
		
		// display next/previous page tabulation
		
		$query_artOfCat = "SELECT * FROM ".$db_prefix."_items WHERE it_cat_FK=".$_REQUEST["cat"]." AND it_activated='1' ORDER BY it_name";
		$recordSet_artOfCat = &$connexion->Execute($query_artOfCat);
		
		$reste = $recordSet_artOfCat->RecordCount() % $nbr_art_per_page;
		$nbr_pages = ($recordSet_artOfCat->RecordCount()-$reste) / $nbr_art_per_page + 1;
		$pages = ""; 
		if($num_page != 1)
			$pages .= '<a href="'.$_SERVER["PHP_SELF"].'?module=mod_main&cat='.$_REQUEST["cat"].'&num_page='.($num_page-1).'">Précédent</a> ';
		for($i=0;$i<$nbr_pages;$i++)
		{
			if($num_page == $i+1)
			{
				$bold_in = "<b>";
				$bold_out = "</b>";
			}
			else
			{
				$bold_in = "";
				$bold_out = "";
			}
			$pages .= '<a href="'.$_SERVER["PHP_SELF"].'?module=mod_main&cat='.$_REQUEST["cat"].'&num_page='.($i+1).'">'.$bold_in.($i+1).$bold_out.'</a> ';
		}
		if($num_page != $nbr_pages)
			$pages .= '<a href="'.$_SERVER["PHP_SELF"].'?module=mod_main&cat='.$_REQUEST["cat"].'&num_page='.($num_page+1).'"> Suivant</a> ';
		
		//
		// list of items or item display
		//
		
		// if any item is selected
		
		if(!isset($_REQUEST["art_id"]))
		{
			// list items
			$liste = "";
			$art_titre = "";
			$query_artOfCat = "SELECT * FROM ".$db_prefix."_items WHERE it_cat_FK=".$_REQUEST["cat"]." AND it_activated='1' ORDER BY it_price";
			$recordSet_artOfCat = &$connexion->SelectLimit($query_artOfCat, $nbr_art_per_page, ($num_page-1)*$nbr_art_per_page);
			$template->assign('affiche_liste', 'false');
			if (!$recordSet_artOfCat) 
				$contenu .= $connexion->ErrorMsg();
			else
			{
				$liste .= '<table>';
					$liste .= '<tr class="premiere">';
					$liste .= '<td width="4px">';
					$liste .= 'N°';;
					$liste .= '</td>';
					$liste .= '<td width="350px">';
					$liste .= 'Nom';;
					$liste .= '</td>';
					$liste .= '<td width="100px">';
					$liste .= 'Stock (pcs)';
					$liste .= '</td>';
					$liste .= '<td width="100px">';
					$liste .= 'Prix';
					$liste .= '</td>';
					$liste .= '</tr>';
				while (!$recordSet_artOfCat->EOF) 
				{
					$liste .= '<tr>';
					$liste .= '<td>';
					$liste .= $recordSet_artOfCat->fields["it_id"];
					$liste .= '</td>';
					$liste .= '<td>';
					$liste .= '<a href="'.$_SERVER['PHP_SELF'].'?module=mod_main&cat='.$_REQUEST["cat"].'&art_id='.$recordSet_artOfCat->fields["it_id"].'">'.$recordSet_artOfCat->fields["it_name"].'</a>';
					$liste .= '</td>';
					$liste .= '<td>';
					$liste .= $recordSet_artOfCat->fields["it_quantity"];
					$liste .= '</td>';
					$liste .= '<td>';
					$liste .= $recordSet_artOfCat->fields["it_price"]." ".$GLOBALS["currency"]." TTC";
					$liste .= '</td>';
					$liste .= '</tr>';
					$recordSet_artOfCat->MoveNext();
					$template->assign('affiche_liste', 'true');
					$art_titre = "Liste des articles";
				}
				$liste .= '</table>';
			}
			
		}
		else // an item is selected => display it
		{
			$template->assign('affiche_liste', 'true');
			$query_OneArt = "SELECT * FROM ".$db_prefix."_items WHERE it_id=".$_REQUEST["art_id"];
			$recordSet_OneArt = &$connexion->Execute($query_OneArt);
			$liste = "";
			if (!$recordSet_OneArt) 
				$art_titre = $connexion->ErrorMsg();
			else
			{
				if($recordSet_OneArt->fields["it_activated"] == 1)
				{
					$liste .= '<table>';
					$art_titre = $recordSet_OneArt->fields["it_name"];
					$liste .= '<tr>';
					$liste .= '<td>';
					$liste .= 'ID';
					$liste .= '</td>';
					$liste .= '<td>';
					$liste .= $recordSet_OneArt->fields["it_id"];
					$liste .= '</td>';
					$liste .= '</tr>';
					$liste .= '<tr>';
					$liste .= '<td>';
					$liste .= 'Description';
					$liste .= '</td>';
					$liste .= '<td>';
					$liste .= $recordSet_OneArt->fields["it_description"];
					$liste .= '</td>';
					$liste .= '</tr>';
					$liste .= '<tr>';
					$liste .= '<td>';
					$liste .= 'Prix';
					$liste .= '</td>';
					$liste .= '<td>';
					$liste .= $recordSet_OneArt->fields["it_price"]." ".$GLOBALS["currency"];
					$liste .= '</td>';
					$liste .= '</tr>';
					$liste .= '<tr>';
					$liste .= '<td>';
					$liste .= 'Stock';
					$liste .= '</td>';
					$liste .= '<td>';

					if($recordSet_OneArt->fields["it_quantity"] == 0)
					{
						$liste.= '<img src="./images/red.png" height="10"/>';
					} 

					if($recordSet_OneArt->fields["it_quantity"] > 0 AND $recordSet_OneArt->fields["it_quantity"] < 10)
					{
						$liste.= '<img src="./images/orange.png" height="10"/>';
					}

					if($recordSet_OneArt->fields["it_quantity"] >= 10)
					{
						$liste.= '<img src="./images/green.png" height="10"/>';
					}
					$liste .= '</td>';
					$liste .= '</tr>';
					$liste .= '</table>';
					
					$liste .= '<table>';
					$liste .= '<tr>';
					if($recordSet_OneArt->fields["it_quantity"] > 0)
					{
						$liste .= '<td align=center>';
						$liste .= '<a href="index.php?module=mod_cart&action=add&cat='.$recordSet_OneArt->fields["it_cat_FK"].'&item='.$recordSet_OneArt->fields["it_id"].'"><div id="addbutton"></div></a>';
						$liste .= '</td>';
					}
					$liste .= '<td>';
					if(isset($_SESSION["level"]))
						if($_SESSION["level"] > 5)
							$liste .= '<a href="./index.php?module=mod_items&action=modif&id='.$recordSet_OneArt->fields["it_id"].'"><div id="editbutton"></div></a>';
					$liste .= '</td>';
					$liste .= '</tr>';
					$liste .= '</table>';
				}
				else
				{
					$art_titre = "Erreur !";
					$liste = "<div align=\"center\">Article indisponible !</div>";	
				}
				
			}
		}			
		$template->assign('nbr_pages', $nbr_pages);
		$template->assign('categorie', $categorie);
		$template->assign('contenu',$contenu);
		$template->assign('liste',$liste);
		$template->assign('pages',$pages);
		$template->assign('art_titre',$art_titre);
	}
}

?>