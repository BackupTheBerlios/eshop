<?

/**
* mod_registration.php
* @ File description :  allow user to register/retrieve password
* @ Authors : 2004 T. Prêtre & R. Emourgeon
* @ eShop is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* $Id: mod_registration.php,v 1.3 2004/08/13 08:26:59 setcode Exp $
**/

defined( '_DIRECT_ACCESS' ) or die(header("Location: ../../erreur.html"));

require_once("./includes/set_env.php");

// in all cases we assign this value

$template->assign('is_not_logged', $is_not_logged);

if($_REQUEST["action"]=="register1")
{
	// to include the good template
	$template->assign('template', 'register');
	
	// for the countries
	
	$query = "SELECT co_name, co_id FROM ".$db_prefix."_countries ORDER BY co_name";
	
	$resultat = &$connexion->Execute($query);
		
	if (!$resultat) 
		print $connexion->ErrorMsg();

	$template->assign('select_pays', $resultat->GetMenu('pays','Switzerland', false));
	
}

if($_REQUEST["action"]=="register2")
{
	$error = false;
	$newsletter = null;
	
	// test if no fields are empty
	if($_REQUEST["nom"]=="" || $_REQUEST["prenom"]=="" || $_REQUEST["societe"]=="" || $_REQUEST["email"]=="" || $_REQUEST["adresse"]=="" || $_REQUEST["npa"]=="" || $_REQUEST["ville"]=="" || $_REQUEST["pays"]=="" || $_REQUEST["login"]=="" || $_REQUEST["pass"]=="" || $_REQUEST["pass-verif"]=="" )
	{
		$error=true;
		$message = "Tous les champs doivent être remplis.";	
	}
		
	// test if both of the password are the same
	if($_REQUEST["pass"]!=$_REQUEST["pass-verif"])
	{
		if($error)
		{
			$message .= "<br />Les mots de passe doivent être identiques.";
		}else
		{
			$error=true;
			$message = "Les mots de passe doivent être identiques.";	
		}	
	}
	
	// test if the login is still used
	$query = "SELECT us_login FROM ".$db_prefix."_users WHERE us_login='".$_REQUEST["login"]."'";
			
	$resultat = &$connexion->Execute($query);
		
	if (!$resultat) 
		print $connexion->ErrorMsg();	
	
	if($resultat-> RowCount()!=0)
	{
		$error = true;
		$message = "Votre nom d'utilisateur est déjà utilisé, merci d'en choisir un autre.";	
	}
			
	if($error)
	{
		$template->assign('error', $error);
		$template->assign('message', $message);
		
		$template->assign('nom', $_REQUEST["nom"]);
		$template->assign('prenom', $_REQUEST["prenom"]);
		$template->assign('email', $_REQUEST["email"]);
		$template->assign('societe', $_REQUEST["societe"]);
		$template->assign('adresse', $_REQUEST["adresse"]);
		$template->assign('npa', $_REQUEST["npa"]);
		$template->assign('ville', $_REQUEST["ville"]);
		$template->assign('login', $_REQUEST["login"]);
		$template->assign('pass', $_REQUEST["pass"]);
		$template->assign('pass-verif', $_REQUEST["pass-verif"]);
		
		// for the countries
	
		$query = "SELECT co_name, co_id FROM ".$db_prefix."_countries ORDER BY co_name";
	
		$resultat = &$connexion->Execute($query);
		
		if (!$resultat) 
			print $connexion->ErrorMsg();
		
		$template->assign('select_pays', $resultat->GetMenu2('pays',$_REQUEST["pays"], false));
		
		if(isset($_REQUEST["newsletter"]))
			if($_REQUEST["newsletter"]=="yes")
				$newsletter = true;
		
		$template->assign('newsletter', $newsletter);
		
		$template->assign('template', 'register');
	}
	
	// if everything is Ok, sending the mail and saving the infos in the DB
	if(!$error)
	{
		// prepare the mail
		$mail = "Bonjour, \r\n";
		$mail .= "Pour continuer votre inscription sur le site ".$title." merci de cliquer sur ce lien : \r\n";
		$mail .= $site_url."index.php?module=mod_registration&amp;action=mailconfirmation&amp;code=".$session->id;
		$mail .= "\r\nCordialement,\r\n";
		$mail .= $company_name."\r\n\r\n";
		$mail .="Cet e-mail n'est pas un SPAM.\r\nSi vous n'avez pas sollicité cet e-mail, merci de ne pas y répondre, votre adresse e-mail sera automatiquement effacée de notre base de données sous 24h.";
		
		// prepare the header
		$mailheaders =  "From: Serveur ".$title."\nReply-To: no-reply.".$company_mail."\n";
		
		// prepare the subject
		$mailsubject = "Inscription sur ".$title; 
	
		// send the mail
		if(mail($_REQUEST["email"], $mailsubject, $mail, $mailheaders))
		{
			$message = "Un email a été envoyé à votre adresse email ".$_REQUEST["email"]." avec les informations nécessaires à la suite de votre enregistrement.";
			$error = false;
		}
		else
		{
			$message = "Erreur lors de l'envoi de l'email. Merci de réessayer plus tard.";
			$error = true;
		}
				
		// save in the DB only if email was sent 
		if($error==false)
		{	
			// save the infos in the DB
			if(isset($_REQUEST["newsletter"]))
			{
				if($_REQUEST["newsletter"]=="yes")
					$newsletter = 1;
				else
					$newsletter = 0;
			}
			
			$query = "INSERT INTO ".$db_prefix."_users (us_login, us_password, us_email, us_first_name, us_company, us_address, us_npa, us_city, us_country, us_newsletter, us_register_date, us_level, us_comments) VALUES (".$connexion->qstr($_REQUEST["login"],get_magic_quotes_gpc()).", ".$connexion->qstr(md5($_REQUEST["pass"]),get_magic_quotes_gpc()).", ".$connexion->qstr($_REQUEST["email"],get_magic_quotes_gpc()).", ".$connexion->qstr($_REQUEST["prenom"],get_magic_quotes_gpc()).", ".$connexion->qstr($_REQUEST["societe"],get_magic_quotes_gpc()).", ".$connexion->qstr($_REQUEST["adresse"],get_magic_quotes_gpc()).", ".$connexion->qstr($_REQUEST["npa"],get_magic_quotes_gpc()).", ".$connexion->qstr($_REQUEST["ville"],get_magic_quotes_gpc()).", ".$connexion->qstr($_REQUEST["pays"],get_magic_quotes_gpc()).", ".$connexion->qstr($newsletter,get_magic_quotes_gpc()).", '".time()."', '0', '".$session->id."')"; //
				
			$resultat = &$connexion->Execute($query);
			
			if (!$resultat) 
				print $connexion->ErrorMsg();
		}
			
		$template->assign('message', $message);
		$template->assign('error', $error);
				
		$template->assign('template', 'message');
	}	
}

if($_REQUEST["action"]=="mailconfirmation")
{
	if($_REQUEST["code"]=="")
	{
		$template->assign('message', "Erreur lors de l'appel au script !");
		$template->assign('error', true);
				
		$template->assign('template', 'message');
		
		// assign the benchmark
		if($benchmark_activation == "on")
			$template->assign('benchmark', $benchmark->ReturnTimer(3));
		
		$template->display('./templates/core.tpl');				
	}else
	{
		// select in the DB and mark as activated
		
		$query = "UPDATE ".$db_prefix."_users SET us_comments='', us_activated='1' WHERE us_comments='".$_REQUEST["code"]."'"; 
			
		$resultat = &$connexion->Execute($query);
		
		if (!$resultat) 
			print $connexion->ErrorMsg();
			
		$template->assign('message', "Votre compte est activé, vous pouvez désormais vous <a href=\"./index.php?module=mod_auth\">connecter</a>.");
		$template->assign('error', false);
				
		$template->assign('template', 'message');
	}
}

if($_REQUEST["action"]=="lostpwd1")
{			
		// this template ask for the email of the user
		$template->assign('template', 'lostpwd');		
}

if($_REQUEST["action"]=="lostpwd2")
{
		$error = false;
	
		// if the email isn't there
		
		if($_REQUEST["email"]=="")
		{
			$error = true;
			$message = "Vous devez fournir votre adresse e-mail !";
		}
	
		
		// if the email isn't in the DB print an error
		if(!$error)
		{
			$query = "SELECT * FROM ".$db_prefix."_users WHERE us_email='".$_REQUEST["email"]."'"; 
			
			$resultat = &$connexion->Execute($query);
			
			if (!$resultat) 
				print $connexion->ErrorMsg();
				
			if($resultat->RowCount()==0)
			{
				$error = true;
				$message = "Adresse e-mail inconnue !";		
			}		
		}
		
		
		
		// else send an email with the new password and the login
		if(!$error)
		{
			// generate the new password
			$password = substr($session->id, -5);
			
			// prepare the mail
			$mail =  "Bonjour, \r\n";
			$mail .= "Voici vos informations d'accès au site ".$title." :\r\n\r\n";
			$mail .= "Identifiant : ".$resultat->fields["us_login"]."\r\n";
			$mail .= "Mot de passe : ".$password."\r\n";
			$mail .= "Vous pouvez modifier votre mot de passe dans votre espace membre.\r\n";
			$mail .= "\r\nCordialement,\r\n";
			$mail .= $company_name."\r\n\r\n";
			$mail .="Cet e-mail n'est pas un SPAM.";
			
			// prepare the header
			$mailheaders =  "From: Serveur ".$title."\nReply-To: no-reply.".$company_mail."\n";
			
			// prepare the subject
			$mailsubject = "Vos identifiants pour le site ".$title; 
		
			// send the mail
			if(mail($resultat->fields["us_email"], $mailsubject, $mail, $mailheaders))
			{
				$message = "Un email a été envoyé à votre adresse e-mail ".$_REQUEST["email"]." avec vos identifiants.";
				$error = false;
				
				// if the mail was well sent, modify the password in the DB
				$query = "UPDATE ".$db_prefix."_users SET us_password='".$password."' WHERE us_id='".$resultat->fields["us_id"]."'"; 
				
				$resultat = &$connexion->Execute($query);
				
				if (!$resultat) 
					print $connexion->ErrorMsg();
			}
			else
			{
				$message = "Erreur lors de l'envoi de l'email. Merci de réessayer plus tard.";
				$error = true;
			}			
		}
		
		// display the page
		$template->assign('error', $error);
		$template->assign('message', $message);
		$template->assign('template', 'message');
}

/*
 *   INSERTION DU MENU
 */
 
include './modules/mod_main/menu.php';

// assign the benchmark
if($benchmark_activation == "on")
	$template->assign('benchmark', $benchmark->ReturnTimer(3));
	
$template->display('./templates/core.tpl');

// close the connexion to the DB
$connexion->Close();

?>