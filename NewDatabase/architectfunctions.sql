set serveroutput on
--It's coded to only work for keys of length 10
create or replace function next_key (prev_key char) return char is
    identifier char(1);
    rest_of_it char(8);
    final_end number;
    test char(8);
    new_key char(9);
begin

    identifier := substr(prev_key, 1, 1);
    rest_of_it := substr(prev_key, 2, length(prev_key)-1);

    --dbms_output.put_line(identifier);
    --dbms_output.put_line(rest_of_it);

    final_end := (rest_of_it + 1);
    --dbms_output.put_line(final_end);
    test := to_char(lpad(to_char(final_end), 8, '0'));
    --dbms_output.put_line(test);
    --sometimes it drops the zeroes
    new_key := concat(identifier, test);

    return new_key;
end;
/
show errors

create or replace function next_person_key return char is
    prev_key char(9);
    new_key char(9);
begin
    select max(prsn_id)
    into prev_key
    from person;

    new_key := next_key(prev_key);

    return new_key;
end;
/
show errors

create or replace function next_building_key return char is
    prev_key char(9);
    new_key char(9);
begin
    select max(bild_id)
    into prev_key
    from building;

    new_key := next_key(prev_key);

    return new_key;
end;
/
show errors

create or replace function confirm_buyer (f_name varchar2, l_name varchar2, phone varchar2)
return number is
    the_count number;
begin
    select count(*)
    into the_count
    from person p, phone_numbers ph, buyer b
    where p.prsn_id = ph.prsn_id and b.buyr_id = p.prsn_id and
    lname = l_name and fname = f_name and phone_num = phone;

    return the_count;
end;
/
show errors

create or replace procedure create_person_with_phone(person_id char, person_type char,first_name varchar2, last_name varchar2, phone_number char) as
    confirm_check number;
begin
    select count(*)
    into confirm_check
    from phone_numbers
    where phone_num = phone_number;

    if(confirm_check > 0) then
        insert into person values
        (person_id, person_type, first_name, last_name);

        insert into phone_numbers values
        (phone_number, person_id);
    else 
        raise_application_error(-20101, 'Phone Number already in use');
    end if;
end;
/
show errors

var char_c number;
exec :char_c := confirm_buyer('Shaun', 'Johns', '5088675309');
print char_c;

