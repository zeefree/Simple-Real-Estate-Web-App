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

create or replace function next_seller_key return char is
    prev_key char(9);
    new_key char(9);
begin
    select max(selr_id)
    into prev_key
    from seller;

    new_key := next_key(prev_key);

    return new_key;
end;
/
show errors

create or replace function next_buyer_key return char is
    prev_key char(9);
    new_key char(9);
begin
    select max(buyr_id)
    into prev_key
    from buyer;

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


var char_c char(9);
exec :char_c := next_key('P00000001');
print char_c;

var char_d char(9);
exec :char_d := next_seller_key;
print char_d;


