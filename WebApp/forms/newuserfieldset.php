<!-- generate a form to prompt for oracle log in & --> 

<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
  <fieldset>
    <legend> Please enter Oracle username/password: </legend>

      <label for="username"> Username: </label>
      <input type="text" name="username" id="username" required="required" /> 

      <label for="password"> Password: </label>
      <input type="password" name="password" id="password" required="required" />

      
  </fieldset>
  <fieldset>
    <legend> Enter your name </legend>

        <label for="fname"> First Name: </label>
        <input type="text" name="fname" id="fname" required="required" />

        <label for="lname"> Last Name: </label>
        <input type="text" name="lname" id="lname" required="required" />
       
  </fieldset>
  <fieldset>

    <legend> Optionally add a phone number </legend>

      <label for="phonenum">Phone Number: </label>
      <input type="tel" name="phonenum" id="phonenum" 
            pattern="[0-9]{10}"/>
      <span class="note"> Format: 1234567890 </span>

  </fieldset>

    <input type="submit" name="submit" value="submit"/>

</form>