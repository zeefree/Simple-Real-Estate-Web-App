--On insertion into person table make the corresponding list into buyer or seller

create or replace trigger create_buyer_or_seller
    after insert
    on person
    for each row

begin
    if (:new.p_type = 's') then
        -- make a new row in seller for this person
        insert into seller values
        (:new.prsn_id);

    elsif (:new.p_type = 'b') then 
        -- make a new row in buyer for this person
        insert into seller values
        (:new.prsn_id);
    end if;

end;
/
show errors
    
