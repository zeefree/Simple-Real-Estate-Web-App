<form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
    <fieldset>
        <legend> Please enter Oracle username/password: </legend>

        <label for="username"> Username: </label>
        <input type="text" name="username" id="username" required="required" /> 

        <label for="password"> Password: </label>
        <input type="password" name="password" id="password" required="required" />
    </fieldset>
</form>