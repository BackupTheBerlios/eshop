<?

/**
* mod_csv.php
* @ File description : allow user to import/export data in/from CSV file format
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 0.1
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

require_once("./includes/set_env.php");

$template->assign('is_not_logged', $is_not_logged);
$template->assign('db_type', $GLOBALS["db_type"]);

$error_access = false;

// check if the user got the authorisation
if($_SESSION["level"]<5)
{
	$message = "Vous n'avez pas les droits nécessaires pour accéder à cette page !";
	
	$error = true;
	
	$error_access = true;
	
	include("./modules/mod_main/menu.php");
	
	$templateinclude = "message";
}
else
{
	if($session->is_registered("level"))
		$template->assign('level', $_SESSION["level"]);
	
	if($session->is_registered("login"))
		$template->assign('user', $_SESSION["login"]);
	
	if($session->is_registered("id"))	
		$template->assign('id', $_SESSION["id"]);
	
	if(!isset($_REQUEST["action"]))
		$_REQUEST["action"] = null;
		
	// template to use by default
	$templateinclude = "message";
		
	switch($_REQUEST["action"])
	{	
		// export2CSV
		// allow user to export a table in CSV file format
		
		case 'exportcsv':
			$message = null;
			$error = false;
			
			if(!isset($_REQUEST["param"]))
				$_REQUEST["param"]=null;
			
			switch($_REQUEST["param"])
			{
				case 'exportfields':
					include_once('./lib/adodb/toexport.inc.php');
					include ("./modules/mod_backup/class.download.php");
				
					// get the list of the row in the table
					$query = "SHOW FIELDS FROM ".$_REQUEST["db_table"];
					
					$resultat = &$connexion->Execute($query);
		
					if (!$resultat) 
						print $connexion->ErrorMsg();				

					// contains the list of row to export
					$list = "";

					$nofield = true;

					// give the name of the field if the user hasn't give one
					while (!$resultat->EOF)
					{
						if(isset($_REQUEST["check-".$resultat->fields['Field']]))
						{	
							if($_REQUEST["check-".$resultat->fields['Field']]=="yes" && $_REQUEST["text-".$resultat->fields['Field']]=="")
							{
								$nofield = false;
								$list .= " ".$resultat->fields['Field']." as \"".substr($resultat->fields['Field'],3)."\",";
							}	
							else
							{
								if($_REQUEST["check-".$resultat->fields['Field']]=="yes")
								{
									$nofield = false;
									$list .= " ".$resultat->fields['Field']." as \"".$_REQUEST["text-".$resultat->fields['Field']]."\",";
								}
							}				
						}
						$resultat->MoveNext();
					}			

					if($nofield)
					{
						$error = true;
						$message = "Vous devez sélectionner au moins un champs\n";
						$message .= "<br /><br />\n";
						$message .= "<a href=\"./index.php?module=mod_csv&action=exportcsv&param=selectrow&db_table=".$_REQUEST["db_table"]."\">Retour</a>\n";
					}else{	
						$query = "SELECT ".substr($list, 0, strlen($list)-1)." FROM ".$_REQUEST["db_table"];	
				
						$resultat = &$connexion->Execute($query);
						
						if (!$resultat) 
							print $connexion->ErrorMsg();

						$file_name = "csv-".substr($_REQUEST["db_table"], strlen($GLOBALS["db_prefix"])+1).".csv";

						$download = new Download();
						$download->Now($file_name,"");
						
						$resultat->MoveFirst();
						rs2tabout($resultat); 
						exit;
					}
					break;
				
				case 'selectrow':
					// get the list of the row in the table
					$query = "SHOW FIELDS FROM ".$_REQUEST["db_table"];
					
					$resultat = &$connexion->Execute($query);
		
					if (!$resultat) 
						print $connexion->ErrorMsg();
						
						
					$select = "<div align=\"left\"><table border=\"0\">\n";
					
					$select .= "<tr>\n";
					$select .= "\t<td align=\"center\">Champs</td>\n";
					$select .= "\t<td align=\"center\">Nom pour l'export</td>\n";
					$select .= "</tr>\n";
					
					while (!$resultat->EOF)
					{
						// check if it's not the password table
						if(ltrim($resultat->fields['Field'])!="us_password")
						{
							$select .= "<tr>\n";
			    			$select .= "\t<td><input type=\"checkbox\" name=\"check-".ltrim($resultat->fields['Field'])."\" value=\"yes\" />".ltrim($resultat->fields['Field'])."</td>\n";
			    			$select .= "\t<td><input type=\"text\" name=\"text-".ltrim($resultat->fields['Field'])."\" /></td>\n";
			    			$select .= "</tr>\n";
						}
		    			$resultat->MoveNext(); 
					} 
					
					
					$select .= "</table></div>";
					
					$error = false;
					$message = "Sélectionnez les champs à exporter ainsi que le nom à leur donner dans le fichier CSV : ";
					$message .= "<br /><br />";
					$message .= "<form action=\"index.php?module=mod_csv&action=exportcsv&param=exportfields\" method=\"post\" enctype=\"multipart/form-data\" name=\"exportcsv\">";
					$message .= $select;
					$message .= "<br /><br />";
					$message .= "<input name=\"db_table\" type=\"hidden\" value=\"".$_REQUEST["db_table"]."\" />";
					$message .= "<input class=\"submit\" type=\"submit\" name=\"Submit\" value=\"Exporter\" />";
					$message .= "</form>";
					break;
				
				default:
					// get the list of the table in the DB
					$array_table = $connexion->MetaTables('TABLES');
					
					$number_table = count($array_table);
					$i = null;
					
					$select = "<select name=\"db_table\">";		
					while($i < $number_table) 
					{ 
						// check to only show the table that corresponds to the eShop
						if(isset($array_table[$i]))
							if(substr_count($array_table[$i], $GLOBALS["db_prefix"]) >= 1)
				      				$select .= "<option value=\"".ltrim($array_table[$i])."\">".ltrim($array_table[$i])."</option>";
						
						$i++;
					}
					$select .= "</select>";
					
					$error = false;
					$message = "Sélectionnez la table à exporter au format CSV : ";
					$message .= "<br /><br />";
					$message .= "<form action=\"index.php?module=mod_csv&action=exportcsv&param=selectrow\" method=\"post\" enctype=\"multipart/form-data\" name=\"exportcsv\">";
					$message .= $select;
					$message .= "<br /><br />";
					$message .= "<input class=\"submit\" type=\"submit\" name=\"Submit\" value=\"Exporter\" />";
					$message .= "</form>";
					$message .= "<br /><br />";
					$message .= "<div align=\"left\">";
					$message .= "<ul>";
					$message .= "<li>".$GLOBALS["db_prefix"]."_cat : contient la liste des catégories</li>";
					$message .= "<li>".$GLOBALS["db_prefix"]."_items : contient la liste des articles</li>";
					$message .= "<li>".$GLOBALS["db_prefix"]."_users : contient la liste des utilisateurs</li>";
					$message .= "</ul>";
					$message .= "</div>";
					$message .= "<div align=\"center\">Les autres tables contiennent des données spécifiques au système.</div>";
					break;
			}
			break;		
		

		
		case 'importcsv':
			$message = null;
			$error = false;		
		
			if(!isset($_REQUEST["param"]))
				$_REQUEST["param"]=null;
			
			switch($_REQUEST["param"])
			{				
				case 'execute':

				include ("./modules/mod_csv/class.csv.php");
			
				// test si le fichier est spécifié
				// test si le caractère de séparation de colonnes est spécifié
				
				// test si au moins une colonne est présente
				
				// préparer la requête
				
				// exécuter la requête
				
				if($HTTP_POST_FILES["csvfile"]["name"]=="")
				{
					$error = true;
					$message = "Vous devez spécifier un fichier !<br /><br /><a href=\"./index.php?module=mod_csv&action=importcsv&param=selectfields&type=".$_REQUEST["type"]."&number=".$_REQUEST["number"]."\">Retour</a>";
				}
				else
				{
				
						$file = "".$HTTP_POST_FILES["csvfile"]["name"]."";
	
	         			$destination = "temp/".$file;
	         			
	         			// delete the file if it already exist in the rep
	         			
	         			if(file_exists($destination))
	         				unlink($destination);
					
						// move the uploaded file to the destination rep
					
						if(!move_uploaded_file($HTTP_POST_FILES["csvfile"]["tmp_name"], $destination))
						{
							$message = "Erreur lors du déplacement";
							$error = true;
						}
						else
						{	
							// in all cases, test if the user hadn't selected two times the same field
							
							$csv = new csv($_REQUEST["type"], $_REQUEST["number"]);
							
							for($i=0; $i< $_REQUEST["number"] ;$i++)
							{						
								if($_REQUEST["champs".$i]!="")
								{
									if($csv->verification[$_REQUEST["champs".$i]] != "ok")
										$csv->verification[$_REQUEST["champs".$i]] = "ok";	
									else
									{
										$error = true;
										$message = "Vous avez sélectionné deux fois le même champs !";
										break;	
									}
								}
							}							
							
							if(!$error)
							{
								// if the type is users, the import is made by LOAD DATA INFILE
								
								if($_REQUEST["type"]=="users")
								{
									// prepare the SQL query	
									$filepath = substr($_SERVER["SCRIPT_FILENAME"], 0, -strlen("index.php"))."temp/".$HTTP_POST_FILES["csvfile"]["name"];
							
									$query = "LOAD DATA INFILE \"".$filepath."\" INTO TABLE ";
									
									$query .=$GLOBALS["db_prefix"]."_users";
										
									if($_REQUEST["enclosure"]=="'")
										$_REQUEST["enclosure"]="\'";
										
									$query .= " FIELDS TERMINATED BY '".$_REQUEST["separationcolumns"]."' ENCLOSED BY '".$_REQUEST["enclosure"]."'";
										
									if(isset($_REQUEST["firstlinehascontent"]))
										if($_REQUEST["firstlinehascontent"]=="yes")
											$query .=" IGNORE 1 LINES ";
										
									$query .= " (";
									
									$noline = true;
									
									for($i=0; $i< $_REQUEST["number"];$i++)
									{
										if($_REQUEST["champs".$i]!="")
										{
											$query .= $_REQUEST["champs".$i].",";
											$noline = false;
										}
									}
									
									$query = substr($query, 0, -1);
									$query .= ")";
		
									if(!$noline)
									{
										$resultat = &$connexion->Execute($query);
									
										if (!$resultat) 
										{
											$message = $connexion->ErrorMsg();
											$error = true;
										}
										else
										{
											$message = "Import réussi !";
											$error = false;	
											
											// delete the file
											unlink($destination);			
										}
									}
									else
									{
											$message = "Vous devez spécifier au moins un champs";
											$error = true;								
									}
								}	
								else // case we import items
								{
									// to check if the user has choice one field !
									$noline = true;
									
									// get all the categories from the DB
									$query = "SELECT ca_id, ca_name FROM ".$GLOBALS["db_prefix"]."_cat";
									
									if(!$resultat = &$connexion->Execute($query))
										echo $connexion->ErrorMsg();
									
									// create an associative array (cat => id)
									
									while (!$resultat->EOF)
									{
										$cat[strtoupper($resultat->fields["ca_name"])] = $resultat->fields["ca_id"];
										
						    			$resultat->MoveNext(); 
									} 
									
									// create an array of the selected fields
									$csv = new csv($_REQUEST["type"], $_REQUEST["number"]);
									
									$beginOfQuery = "INSERT INTO ".$GLOBALS["db_prefix"]."_items (";
									
									for($i = 0; $i < $_REQUEST["number"]; $i++)
									{
										$champs[$i] = $_REQUEST["champs".$i];
																				
										if(!empty($champs[$i]))
										{
											$beginOfQuery.=$champs[$i].",";
											$noline = false;	
										}	
									}
										
									if(!$noline)
									{	
										// nombre d'éléments ajoutés 
										$insert = 0;
										$cat_created = 0;
										$cat_liste = "<ul>\n";
										
										$beginOfQuery = substr($beginOfQuery, 0, -1);		
										$beginOfQuery .= ") VALUES (";
														
										if($fp = fopen($destination,"r")) 
										{	
											if(isset($_REQUEST["firstlinehascontent"]))		
												if($_REQUEST["firstlinehascontent"]=="yes")
													$ligne = fgets($fp);
	
															
											// loop for each element in the CSV file
											while ($ligne = fgets($fp)) 
											{
												$query = "";
												
												// extracts the fields
												$tab = explode($_REQUEST["separationcolumns"], $ligne);
																
												$query .= $beginOfQuery;
													
												for($i = 0; $i < count($tab); $i++)
												{
													if(isset($champs[$i]))
														if(!empty($champs[$i]))
														{
															$tab[$i] = strtr($tab[$i], array($_REQUEST["enclosure"] => ""));
															
															if($champs[$i]=="it_cat_FK")
															{
																// test if the cat already exist
																if(isset($cat[strtoupper($tab[$i])]))
																	$query .= "'".$cat[strtoupper($tab[$i])]."',";
																else
																{
																	$query_creation_cat = "INSERT INTO ".$GLOBALS["db_prefix"]."_cat (ca_name) VALUES ('".ucfirst(strtolower($tab[$i]))."');";
																	
																	if(!$resultat = &$connexion->Execute($query_creation_cat))
																		echo $connexion->ErrorMsg();
																	else
																	{
																		$cat_created += 1;
																		
																		// add the cat to the array
																		$cat[strtoupper($tab[$i])] = $connexion->Insert_ID();
																		
																		$cat_liste .= "\t<li>".ucfirst(strtolower($tab[$i]))."</li>\n";
																	}
																	
																	$query .= "'".$connexion->Insert_ID()."',";	
																}	
															}
															else
															{
																$query .= $connexion->qstr($tab[$i],get_magic_quotes_gpc()).",";
															}
														}
												}
											
												$query = substr($query, 0, -1);
												$query.=");";
				
												if(!$resultat = &$connexion->Execute($query))
													echo $connexion->ErrorMsg();
												else
													$insert += 1;
											}
													
											/* closing the CSV file */
											fclose ($fp);
											
											// delete the file
											unlink($destination);	
											
											$cat_liste .= "</ul>";
										
											$message = "Import réussi !";
											$message .= "<div align=\"left\">Nombre d'insertions : ".$insert."<br />";
											$message .= "Nombre de catégories créées : ".$cat_created;
											
											if($cat_created != 0)
												$message .= "<br />".$cat_liste."</div>";
									
									
											$error = false;
										} 
										else 
										{
											$message = "Ouverture impossible.";
											$error = true;
										}
									}
									else
									{
										$message = "Vous devez spécifier au moins un champs";
										$error = true;								
									}
								}
							}
						}
					}
					break;
					
					
				case "selectfields": // show the form
					include ("./modules/mod_csv/class.csv.php");
				
					$error = false;						
					$templateinclude = "importcsv2";
					
					// prepare the select
					$selectlist = new csv($_REQUEST["type"], $_REQUEST["number"]);
										
					$template->assign('type', $_REQUEST["type"]);
					$template->assign('selectnumber', $_REQUEST["number"]);
					
					// assign the select to the template
					$template->assign('select', $selectlist->selectArray());
					
					break;
					
				default:
					
					$template->assign('type', $_REQUEST["type"]);
					
					$templateinclude = "importcsv1";
					
					break;
			}
			break;
		
		default:
			$message = "Pas assez de paramètres ! / Mauvais paramètres !";
			$error = true;
	
			break;	
	}

}	

$template->assign('template', $templateinclude);
$template->assign('message', $message);
$template->assign('error', $error);
// assign the benchmark
if($benchmark_activation == "on")
	$template->assign('benchmark', $benchmark->ReturnTimer(3));		

if($error_access)
	$template->display('./templates/core.tpl');
else
	$template->display('./templates/admin.tpl');	

?>