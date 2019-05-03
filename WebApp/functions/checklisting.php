<?php
//build the array we need for the form
function get_filter_listing($conn)
{
    $filter_list = array();

    //step 1 get the distinct city names
    $city_select_str = 'select distinct city 
                        from building
                        order by city';

    $city_query = oci_parse($conn, $city_select_str);

    oci_execute($city_query);

    //store the first thing as the filter type for later access
    $city_options = array('city');

    while(oci_fetch($city_query))
    {
        array_push($city_options, oci_result($city_query, "CITY"));
    }

    array_push($filter_list, $city_options);

    return $filter_list;

    //step 2 get the distinct bed counts

}


// Genearate a form with a list of filters with dropdowns of potential options
function filter_listing_form($conn)
{
    $filter_array = get_filter_listing($conn)
    ?>
    <form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
        <fieldset>
        <legend> Please enter Oracle username/password: </legend>

        <label for="username"> Username: </label>
        <input type="text" name="username" id="username" required="required" /> 

        <label for="password"> Password: </label>
        <input type="password" name="password" id="password" required="required" />
        <?php
            foreach($filter_array as $filter_types)
            {
                //Get each array
                //Print the filter_type which is hopefully the key
                //
                ?>
                <?php echo($filter_types[0] + ":") ?> <select name="<?= $filter_types?>">
                
                <?php
                //ignore the first element as that tells us the type
                for($i = 1; i < count($filter_types); $i++)
                {
                    //create an option for each possible value
                    ?>
                        <option value="<?= $filter_types?>"> <?= $filter_types?> </option>

                    <?php

                }
                ?>
                </select>
                <?php
            }
        ?>
        </fieldset>
    </form>
<?php
}
?>