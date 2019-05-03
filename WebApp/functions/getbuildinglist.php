<?php
function getbuildinglist($conn, $city_filter)
{


    //I've tried inserting spaces like ' ', but php doesn't like it one bit
    //So that's the following is for
    $space1 = ' ';
    $space2 = ' ';

    $building_select_str = 'select bild_id, street_addr || :space1 || CITY || :space2 || zipcode as ADDRESS,
                        price, bed_count, bath_count, square_footage, date_added
                        from building
                        where city = :cityfilter and owner_id is null';

    $building_query = oci_parse($conn, $building_select_str);

    oci_bind_by_name($building_query, ":cityfilter", $city_filter);
    oci_bind_by_name($building_query, ":space1", $space1);
    oci_bind_by_name($building_query, ":space2", $space2);
    
    oci_execute($building_query);

    ?>
        <table>
        <caption> Avialable Listings </caption>
        <tr> <th scope="col"> Building ID </th>
             <th scope="col"> Address </th>
             <th scope="col"> Price</th>
             <th scope="col"> Number of Bedrooms </th>
             <th scope="col"> Number of Bathrooms </th>
             <th scope="col"> Square Footage </th>
             <th scope="col"> Date Added </th>
        </tr>

        <?php
        while (oci_fetch($building_query))
        {
            $curr_bild_id = oci_result($building_query, "BILD_ID");
            $curr_address = oci_result($building_query, "ADDRESS");
            $curr_price = oci_result($building_query, "PRICE");
            $curr_bed_count = oci_result($building_query, "BED_COUNT");
            $curr_bath_count = oci_result($building_query, "BATH_COUNT");
            $curr_square_feet = oci_result($building_query, "SQUARE_FOOTAGE");
            $curr_date_added = oci_result($building_query, "DATE_ADDED");

            ?>

            <tr> <td> <?= $curr_bild_id ?> </td>
                 <td> <?= $curr_address ?> </td>
                 <td> <?= $curr_price ?> </td>
                 <td> <?= $curr_bed_count ?> </td>
                 <td> <?= $curr_bath_count ?> </td>
                 <td> <?= $curr_square_feet ?> </td>
                 <td> <?= $curr_date_added ?> </td>
            </tr>
            <?php
        }
        ?>
        </table>
        <?php

        oci_free_statement($building_query);
}
?>