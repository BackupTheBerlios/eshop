<?php

/**
 * @name session.php
 * @version 1.0
 * @description session management class
 * @compatibility PHP 4.1.0 +
 * @author Emourgeon R. (raphael.emourgeon@eiaj.ch)
 */

class SESSION
{
	public $id;
	
	
	/**
	 * @access public
	 * @description class constructor, init the session via start method
	 *		NONE -> user has no active session
	 *		ACTIVE -> user has one active session on the server
	 */
  
      function SESSION()
      {
             $this->start();
      }


	/**
	 * @access public
	 * @description create a new session
	 */
      function create()
      {
             if(SESSION_STATUT == "NONE")
             {
		$this->start();
             }
      }

	/**
	 * @access public
	 * @description save a variable for the current session
	 * @return true if variable has been saved, false otherwise
	 */
      function register($name_var, $content_var="")
      {
             if(func_num_args() == 1 and isset($GLOBALS[$name_var]))
             {
                 $_SESSION[$name_var] = $GLOBALS[$name_var];
                 return true;
             }
             elseif(func_num_args() == 2)
             {
                 $_SESSION[$name_var] = $content_var;
                 return true;
             }
             return false;
      }

	/**
	 * @access public
	 * @description delete a variable for the current session
	 */

      function unregister($name_var)
      {
             unset($_SESSION[$name_var]);
      }


	/**
	 * @access public
	 * @description delete all variables for the current session
	 */
      function unregister_all()
      {
             session_destroy();
      }


	/**
	 * @access public
	 * @description test if a variable is registered for the current session
	 * @return true or false if the variable is registered or no
	 */
      function is_registered($var)
      {
             return isset($_SESSION[$var]);
      }


	
	/**
	 * @access private
	 * @description create the session
	 */
      function start()
      {
   	     session_start();
   	     
   	     $this->id = session_id();

             //Définition du statut de la session
             define("SESSION_STATUT", "ACTIVE");
      }
      

      	/**
	 * @access public
	 * @return return the session ID
	 */
      function getId()
      {
      	return $this->id;	
      }
}

?>