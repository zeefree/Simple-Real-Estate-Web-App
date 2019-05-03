<!-- generate a form to prompt for oracle log in & --> 

<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
  <fieldset>
    <legend> Enter your name </legend>

        <label for="fname"> First Name: </label>
        <input type="text" name="fname" id="fname" required="required" />

        <label for="lname"> Last Name: </label>
        <input type="text" name="lname" id="lname" required="required" />
       
  </fieldset>
  <fieldset>

    <legend> Add a phone number </legend>

      <label for="phonenum"> Phone Number: </label>
      <input type="tel" name="phonenum" id="phonenum" pattern="[0-9]{10}" required="required"/>
      <span class="note"> Format: 1234567890 </span>

  </fieldset>
    <div class="clearfloat"></div>
    <input type="submit" name="submit" value="submit"/>

</form>
