
<?php 

if (! function_exists('logged_in')) {
  /**
   * Checks to see if the user is logged in.
   *
   * @return bool
   */
  function logged_in()
  {
      return service('authentication')->isLoggedIn();
  }
}


?>
