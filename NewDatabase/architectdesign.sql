drop table Person cascade constraints;

--Represents the person and their contact info
create table Person
(
    prsn_id char(9),
    p_type char(1) check(p_type in ('s', 'b')),
    fname varchar(30),
    lname varchar(30),
    primary key(prsn_id)
);

drop table Seller cascade constraints;
--Represents the seller as a seprate table in case they need more info down the road
create table Seller
(
    selr_id char(9),
    prsn_id char(9),
    primary key (selr_id),
    foreign key (prsn_id) references Person(prsn_id)
);
--Represents the buyer as a seprate table in case they need more info down the road
drop table Buyer cascade constraints;

create table Buyer
(
    buyr_id char(9),
    prsn_id char(9),
    primary key (buyr_id),
    foreign key (prsn_id) references Person(prsn_id)
);

drop table Phone_Numbers cascade constraints;

create table Phone_Numbers
(
    phone_num char(10),
    prsn_id char(9),
    primary key (phone_num),
    foreign key (prsn_id) references Person(prsn_id)
);

drop table Building cascade constraints;

create table Building
(
    bild_id char(9),
    street_addr varchar(40),
    city varchar(25),
    zipcode char(6),
    selr_id char(9),
    owner_id char(9),
    price number(14,2) not null,
    bed_count number(2),
    bath_count number(3,1),
    square_footage number(12),
    date_added date default sysdate,
    date_sold date,
    primary key(bild_id),
    foreign key (selr_id) references Seller(selr_id),
    foreign key (owner_id) references Buyer(buyr_id)
);

drop table Buyer_Requests cascade constraints;

create table Buyer_Requests
(
    bild_id char(9),
    buyr_id char(9),
    date_requested date default sysdate,
    primary key (bild_id, buyr_id),
    foreign key (bild_id) references Building(bild_id),
    foreign key (buyr_id) references Buyer(buyr_id)
);
