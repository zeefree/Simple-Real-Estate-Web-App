--Zach Freeman
--CS 328

delete from Buyer_Requests;
delete from Building;
delete from Seller;
delete from Buyer;
delete from Phone_Numbers;
delete from Person;

prompt inserts into Person

insert into Person values
('P00000001', 's', 'Robert', 'Poles');

insert into Person values
('P00000002', 'b', 'George', 'Romero');

insert into Person values
('P00000003', 'b', 'Zak', 'Bane');

insert into Person values
('P00000004', 's', 'Rashida', 'Nasaar');

insert into Person values
('P00000005', 's', 'Rose', 'Parsons');

insert into Person values
('P00000006', 'b', 'Jordan', 'Steele');

insert into Person values
('P00000007', 'b', 'Mark', 'Smith');

insert into Person values
('P00000008', 's', 'Jane', 'Smith');

insert into Person values
('P00000009', 's', 'James', 'Johnson');

insert into Person values
('P00000010', 'b', 'John', 'Jefferson');

insert into Person values
('P00000011', 'b', 'Sean', 'Jones');

insert into Person values
('P00000012', 'b', 'Shawn', 'Jhones');

insert into Person values
('P00000013', 'b', 'Shaun', 'Johns');

prompt inserts into Seller

insert into Seller values
('P00000001');

insert into Seller values
('P00000004');

insert into Seller values
('P00000005');

insert into Seller values
('P00000008');

insert into Seller values
('P00000009');

prompt inserts into Buyer

insert into Buyer values
('P00000002');

insert into Buyer values
('P00000003');

insert into Buyer values
('P00000006');

insert into Buyer values
('P00000007');

insert into Buyer values
('P00000010');

insert into Buyer values
('P00000011');

insert into Buyer values
('P00000012');

insert into Buyer values
('P00000013');

prompt inserts into Phone_Numbers 

insert into Phone_Numbers values
('5918895112', 'P00000001');

insert into Phone_Numbers values
('2985449427', 'P00000002');

insert into Phone_Numbers values
('7493389886', 'P00000003');

insert into Phone_Numbers values
('7309985768', 'P00000004');

insert into Phone_Numbers values
('2869078977', 'P00000005');

insert into Phone_Numbers values
('3833269735', 'P00000006');

insert into Phone_Numbers values
('4462457959', 'P00000008');

insert into Phone_Numbers values
('8012750880', 'P00000009');

insert into Phone_Numbers values
('4152732437', 'P00000010');

insert into Phone_Numbers values
('8058675309', 'P00000011');

insert into Phone_Numbers values
('8508675309', 'P00000012');

insert into Phone_Numbers values
('5088675309', 'P00000013');

prompt inserts into Building

insert into Building(bild_id, street_addr,city, zipcode, selr_id, price,bed_count,bath_count, square_footage, date_added) values
('U00000001', '921 Diamond St', 'Arcata', '95521', 'P00000001', 599990, 3 , 2.5,2469, '23-APR-15');

insert into Building(bild_id, street_addr,city, zipcode, selr_id, price,bed_count,bath_count, square_footage, date_added) values
('U00000002', '922 Diamond St', 'Arcata', '95521', 'P00000001', 599900, 3 , 2, 2345, '23-APR-15');

insert into Building(bild_id, street_addr,city, zipcode, selr_id, price,bed_count,bath_count, square_footage, date_added) values
('U00000003', '311 Fickle Hill Rd', 'Arcata', '95521', 'P00000004', 575000, 4 , 3,1990, '25-Mar-15');

insert into Building(bild_id, street_addr,city, zipcode, selr_id, price,bed_count,bath_count, square_footage, date_added) values
('U00000004', '1890 Riberio Ct', 'Arcata', '95521', 'P00000004', 435000, 4 , 2, 1680, '23-APR-15');

insert into Building values
('U00000005', '721 Emerald St', 'Arcata', '95521', 'P00000004', 'P00000006', 400000, 2 , 1.5, 1100 , '23-APR-15', '01-Oct-16');

insert into Building(bild_id, street_addr,city, zipcode, selr_id, price,bed_count,bath_count, square_footage, date_added) values
('U00000006', '1621 Williams St', 'Eureka', '95501', 'P00000005', 239500, 3 , 1, 1400, '23-APR-15');

insert into Building(bild_id, street_addr,city, zipcode, selr_id, price,bed_count,bath_count, square_footage, date_added) values
('U00000007', '2709 P St', 'Eureka', '95501', 'P00000005', 389000, 4, 2, 2460, '23-APR-15');

insert into Building(bild_id, street_addr,city, zipcode, selr_id, price,bed_count,bath_count, square_footage, date_added) values
('U00000008', 'Rohnerville Rd', 'Fortuna', '95540', 'P00000008', 1395000, 5 , 4, 6350 , '23-APR-15');

insert into Building(bild_id, street_addr,city, zipcode, selr_id, price,bed_count,bath_count, square_footage, date_added) values
('U00000009', '7518 Elk River Ct Rd', 'Eureka', '95503', 'P00000009', 304900, 3 , 2, 1032 , '23-APR-15');

insert into Building(bild_id, street_addr,city, zipcode, selr_id, price,bed_count,bath_count, square_footage, date_added) values
('U00000010', '4893 Artino Ct', 'Eureka', '95503', 'P00000009', 395000, 4 , 3, 2492 , '23-APR-15');

insert into Building(bild_id, street_addr,city, zipcode, selr_id, price,bed_count,bath_count, square_footage, date_added) values
('U00000011', '1851 McFarlan St', 'Eureka', '95501', 'P00000005', 217000, 3 , 2, 1219 , '23-APR-15');

insert into Building(bild_id, street_addr,city, zipcode, selr_id, price,bed_count,bath_count, square_footage, date_added) values
('U00000012', '1240 Devlin Ct', 'Arcata', '95521', 'P00000004', 279000, 3 , 1, 980 , '23-APR-15');

prompt inserts into Buyer_Requests

insert into Buyer_Requests values
('U00000001', 'P00000011', '23-May-15');

insert into Buyer_Requests values
('U00000001', 'P00000012', '20-May-15');

insert into Buyer_Requests values
('U00000001', 'P00000013', '16-May-15');

insert into Buyer_Requests values
('U00000002', 'P00000003', '23-Jun-15');

insert into Buyer_Requests values
('U00000002', 'P00000007', '20-Jun-15');

insert into Buyer_Requests values
('U00000002', 'P00000002', '16-Jun-15');

insert into Buyer_Requests values
('U00000003', 'P00000002', '23-May-15');

insert into Buyer_Requests values
('U00000003', 'P00000003', '20-May-15');

insert into Buyer_Requests values
('U00000004', 'P00000007', '16-May-15');

insert into Buyer_Requests values
('U00000004', 'P00000010', '23-May-15');

insert into Buyer_Requests values
('U00000005', 'P00000002', '23-Jul-15');

insert into Buyer_Requests values
('U00000005', 'P00000003', '20-Jul-15');

insert into Buyer_Requests values
('U00000005', 'P00000006', '16-Nov-16');

insert into Buyer_Requests values
('U00000006', 'P00000010', '23-Aug-16');

insert into Buyer_Requests values
('U00000006', 'P00000003', '25-Jul-15');

insert into Buyer_Requests values
('U00000006', 'P00000007', '16-Nov-16');

insert into Buyer_Requests values
('U00000012', 'P00000010', '23-Aug-16');

insert into Buyer_Requests values
('U00000013', 'P00000003', '25-Jul-15');

insert into Buyer_Requests values
('U00000010', 'P00000007', '16-Nov-16');

insert into Buyer_Requests values
('U00000007', 'P00000010', '23-Aug-16');

insert into Buyer_Requests values
('U00000008', 'P00000003', '25-Jul-15');

insert into Buyer_Requests values
('U00000009', 'P00000007', '16-Nov-16');

insert into Buyer_Requests values
('U00000012', 'P00000007', '16-Nov-16');

