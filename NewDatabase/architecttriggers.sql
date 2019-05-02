--On insertion into person table make the corresponding list into buyer or seller

create or replace trigger create_buyer_or_seller
    after insert
    on person
    for each row

declare
    key_to_insert char(9);

begin
    if (:new.p_type = 's') then
        --call the the function to get the next seller key
        key_to_insert := next_seller_key;
        -- make a new row in seller for this person
        insert into seller values
        (key_to_insert, :new.prsn_id);

    elsif (:new.p_type = 'b') then 
         --call the the function to get the next buyer key
        key_to_insert := next_seller_key;
        -- make a new row in buyer for this person
        insert into seller values
        (key_to_insert, :new.prsn_id);
    end if;

end;
/
show errors
    
