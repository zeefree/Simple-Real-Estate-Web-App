<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
  <fieldset>
    <legend> Are you a new user or returning user </legend>

      <label for="newuser"> New User: </label>
      <input type="radio" name="usertype" id="newusr" value="newuser" required="required" /> 

      <label for="returnusr"> Returning User: </label>
      <input type="radio" name="usertype" value="returnusr" id="returnuser" />
      
  </fieldset>
    <input type="submit" name="submit" value="submit"/>
</form>