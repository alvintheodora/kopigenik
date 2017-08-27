CREATE TABLE MsAddress (
	address_id CHAR(16) NOT NULL,
	[address] varchar(150) DEFAULT NULL,
	province varchar(25) DEFAULT NULL,
	city varchar(25) DEFAULT NULL,
	district varchar(25) DEFAULT NULL,
	subdistrict varchar(25) DEFAULT NULL,
	zipcode char(5) DEFAULT NULL,
	PRIMARY KEY (address_id)
);

CREATE TABLE MsCustomer (
  customer_id char(16) NOT NULL,
  name varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  pass varchar(64) NOT NULL,
  phone varchar(12) NOT NULL,
  dob date NOT NULL,
  gender varchar(8) NOT NULL,
  PRIMARY KEY (customer_id)
);

CREATE TABLE MsRoaster (
  roaster_id char(16) NOT NULL,
  name varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  phone varchar(12) NOT NULL,
  web varchar(50) DEFAULT NULL,
  ig varchar(50) DEFAULT NULL,
  fb varchar(50) DEFAULT NULL,
  tw varchar(50) DEFAULT NULL,
  PRIMARY KEY (roaster_id)
);

CREATE TABLE MsCustomerAddress (
  address_id char(16) NOT NULL,
  customer_id char(16) NOT NULL,
  [description] varchar(8) NOT NULL,
  PRIMARY KEY (address_id),
  FOREIGN KEY (address_id) REFERENCES MsAddress ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (customer_id) REFERENCES MsCustomer ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE MsRoasterAddress (
  address_id char(16) NOT NULL,
  roaster_id char(16) NOT NULL,
  [description] varchar(8) NOT NULL,
  PRIMARY KEY (address_id),
  FOREIGN KEY (address_id) REFERENCES MsAddress ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (roaster_id) REFERENCES MsRoaster ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE MsCoffee (
  coffee_id char(16) NOT NULL,
  name varchar(100) NOT NULL,
  origin varchar(50) NOT NULL,
  price_in_kg float NOT NULL,
  flavor varchar(100) DEFAULT NULL,
  varietal varchar(100) DEFAULT NULL,
  process varchar(100) DEFAULT NULL,
  elevation varchar(100) DEFAULT NULL,
  PRIMARY KEY (coffee_id),
);

CREATE TABLE MsRoasterCoffee (
  roaster_id char(16) NOT NULL,
  coffee_id char(16) NOT NULL,
  roast_date date NOT NULL,
  amount_in_kg float NOT NULL,
  roast_status varchar(8) NOT NULL,
  PRIMARY KEY (roaster_id,coffee_id),
  FOREIGN KEY (coffee_id) REFERENCES MsCoffee ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (roaster_id) REFERENCES MsRoaster ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE MsShipmentSubs (
  shipment_id char(16) NOT NULL,  
  roaster_id char(16) NOT NULL,
  coffee_id char(16) NOT NULL,
  shipment_date date NOT NULL,
  shipment_status varchar(8) NOT NULL,
  PRIMARY KEY (shipment_id),
  FOREIGN KEY (coffee_id) REFERENCES MsCoffee ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (roaster_id) REFERENCES MsRoaster ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE MsShipmentProvider (
  provider_id char(16) NOT NULL,
  provider_name varchar(25) NOT NULL,
  customer_service varchar(12) NOT NULL,
  PRIMARY KEY (provider_id)
);

CREATE TABLE MsProviderService (
  service_id char(16) NOT NULL,
  provider_id char(16) NOT NULL,
  [service_name] varchar(25) NOT NULL,
  PRIMARY KEY (service_id),
  FOREIGN KEY (provider_id) REFERENCES MsShipmentProvider ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE TrSubscriptionHeader (
  subscription_id char(16) NOT NULL,
  customer_id char(16) NOT NULL,
  subscription_date date NOT NULL,
  qty_in_kg float NOT NULL,
  freq int NOT NULL,
  PRIMARY KEY (subscription_id),
  FOREIGN KEY (customer_id) REFERENCES MsCustomer ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE TrSubscriptionDetail (  
  subscription_id char(16) NOT NULL,
  shipment_id char(16) NOT NULL,
  service_id char(16) NOT NULL,
  refinement varchar(25) NOT NULL,
  receipt_number varchar(100) NOT NULL,
  shipment_tracking varchar(100) NOT NULL,
  shipping_cost int NOT NULL,
  FOREIGN KEY (subscription_id) REFERENCES TrSubscriptionHeader ON UPDATE NO ACTION ON DELETE NO ACTION,
  FOREIGN KEY (shipment_id) REFERENCES MsShipmentSubs ON UPDATE NO ACTION ON DELETE NO ACTION,
  FOREIGN KEY (service_id) REFERENCES MsProviderService ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE MsPayment (
  payment_id char(16) NOT NULL,
  name_on_bank_account varchar(100),
  amount float,
  bank_name varchar(25),
  date_of_transfer date,
  proof_of_transfer varchar(256),
  PRIMARY KEY (payment_id)
);

CREATE TABLE MsPaymentSubscription (
  subscription_id char(16) NOT NULL,
  payment_id char(16) NOT NULL,
  payment_status varchar(25) NOT NULL,
  PRIMARY KEY (subscription_id,payment_id),
  FOREIGN KEY (subscription_id) REFERENCES TrSubscriptionHeader ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (payment_id) REFERENCES MsPayment ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE MsAdmin (
  admin_id char(16) NOT NULL,
  name varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  pass varchar(64) NOT NULL
);

CREATE TABLE TrLogin (
  [user_id] char(16) NOT NULL,
  login_datetime datetime NOT NULL,
  logout_datetime datetime NOT NULL,
  [role] varchar(8) NOT NULL
);

CREATE DATABASE Kopigenik
GO
USE Kopigenik

USE master
GO
DROP DATABASE Kopigenik

----------------------------------------------------------------------------------------------------------------------------------------------------

--Fill database data

BEGIN TRAN 

INSERT INTO MsAdmin VALUES('AM00000000000001','Adam','adam@kopigenik.com','asdfasdf')
INSERT INTO MsAdmin VALUES('AM00000000000002','Kent','kent@kopigenik.com','asdfasdf')
INSERT INTO MsAdmin VALUES('AM00000000000003','Shelly','shelly.sinaga@kopigenik.com','asdfasdf')
GO
SELECT * FROM MsAdmin

INSERT INTO TrLogin VALUES('AM00000000000001','2017-07-15 01:01:01.999','2017-07-15 00:00:00.000','Admin')
INSERT INTO TrLogin VALUES('AM00000000000002','2017-07-15 01:01:01.999','2017-07-15 00:00:00.000','Admin')
INSERT INTO TrLogin VALUES('AM00000000000003','2017-07-15 01:01:01.999','2017-07-15 00:00:00.000','Admin')
GO
SELECT * FROM TrLogin

INSERT INTO MsAddress VALUES('AD00000000000001','TBU','TBU','TBU','TBU','TBU','TBU')
INSERT INTO MsAddress VALUES('AD00000000000002','TBU','TBU','TBU','TBU','TBU','TBU')
INSERT INTO MsAddress VALUES('AD00000000000003','TBU','TBU','TBU','TBU','TBU','TBU')
INSERT INTO MsAddress VALUES('AD00000000000004','TBU','TBU','TBU','TBU','TBU','TBU')
INSERT INTO MsAddress VALUES('AD00000000000005','TBU','TBU','TBU','TBU','TBU','TBU')
INSERT INTO MsAddress VALUES('AD00000000000006','TBU','TBU','TBU','TBU','TBU','TBU')
INSERT INTO MsAddress VALUES('AD00000000000007','TBU','TBU','TBU','TBU','TBU','TBU')
INSERT INTO MsAddress VALUES('AD00000000000008','TBU','TBU','TBU','TBU','TBU','TBU')
GO
SELECT * FROM MsAddress

INSERT INTO MsCustomer VALUES('CS00000000000001','John Doe','johndoe@mail.com','asdfasdf','08121122987','1995-01-01','Male')
INSERT INTO MsCustomer VALUES('CS00000000000002','Jane Doe','janedoe@mail.com','asdfasdf','08121122987','1995-01-01','Female')
GO
SELECT * FROM MsCustomer

INSERT INTO MsRoaster VALUES('RS00000000000001','Tobis','johndoe@mail.com','08121122987','www.tobis.com','TBU','TBU','TBU')
INSERT INTO MsRoaster VALUES('RS00000000000002','Worcas','janedoe@mail.com','08121122987','www.worcas.com','TBU','TBU','TBU')
GO
SELECT * FROM MsRoaster

INSERT INTO MsCustomerAddress VALUES('AD00000000000001','CS00000000000001','Home')
INSERT INTO MsCustomerAddress VALUES('AD00000000000002','CS00000000000001','Work')
INSERT INTO MsCustomerAddress VALUES('AD00000000000003','CS00000000000002','Home')
INSERT INTO MsCustomerAddress VALUES('AD00000000000004','CS00000000000002','Work')
GO
SELECT * FROM MsCustomerAddress

INSERT INTO MsRoasterAddress VALUES('AD00000000000005','RS00000000000001','Branch 1')
INSERT INTO MsRoasterAddress VALUES('AD00000000000006','RS00000000000001','Branch 2')
INSERT INTO MsRoasterAddress VALUES('AD00000000000007','RS00000000000002','Branch 1')
INSERT INTO MsRoasterAddress VALUES('AD00000000000008','RS00000000000002','Branch 2')
GO
SELECT * FROM MsRoasterAddress

INSERT INTO MsCoffee VALUES('CF00000000000001','Aceh Gayo','Aceh, NAD',500000,'TBU','TBU','TBU','TBU')
INSERT INTO MsCoffee VALUES('CF00000000000002','Papua Wamena','Wamena, Papua',250000,'TBU','TBU','TBU','TBU')
INSERT INTO MsCoffee VALUES('CF00000000000003','Robusta Lampung','Bandar Lampung, Lampung',300000,'TBU','TBU','TBU','TBU')
GO
SELECT * FROM MsCoffee

INSERT INTO MsRoasterCoffee VALUES('RS00000000000001','CF00000000000001','2017-07-15',3,'TBD')
INSERT INTO MsRoasterCoffee VALUES('RS00000000000001','CF00000000000002','2017-07-01',5,'TBD')
INSERT INTO MsRoasterCoffee VALUES('RS00000000000002','CF00000000000003','2017-06-17',4,'TBD')
INSERT INTO MsRoasterCoffee VALUES('RS00000000000002','CF00000000000001','2017-09-17',7,'TBD')
GO
SELECT * FROM MsRoasterCoffee

INSERT INTO MsShipmentSubs VALUES('SH00000000000001','RS00000000000001','CF00000000000001','2017-06-18','Closed')
INSERT INTO MsShipmentSubs VALUES('SH00000000000002','RS00000000000001','CF00000000000002','2017-07-02','TBO')
INSERT INTO MsShipmentSubs VALUES('SH00000000000003','RS00000000000001','CF00000000000001','2017-07-16','TBO')
GO
SELECT * FROM MsShipmentSubs

INSERT INTO MsShipmentProvider VALUES('SP00000000000001','PorterID','TBU')
INSERT INTO MsShipmentProvider VALUES('SP00000000000002','Gojek','TBU')
INSERT INTO MsShipmentProvider VALUES('SP00000000000003','JNE','TBU')
INSERT INTO MsShipmentProvider VALUES('SP00000000000004','TIKI','TBU')
INSERT INTO MsShipmentProvider VALUES('SP00000000000005','Ninja Xpress','TBU')
INSERT INTO MsShipmentProvider VALUES('SP00000000000006','SiCepat','TBU')
INSERT INTO MsShipmentProvider VALUES('SP00000000000007','Grab','TBU')
INSERT INTO MsShipmentProvider VALUES('SP00000000000008','J&T Express','TBU')
GO
SELECT * FROM MsShipmentProvider

INSERT INTO MsProviderService VALUES('PS00000000000001','SP00000000000001','Regular')
INSERT INTO MsProviderService VALUES('PS00000000000002','SP00000000000002','GoSend')
INSERT INTO MsProviderService VALUES('PS00000000000003','SP00000000000002','Instant Courrier')
INSERT INTO MsProviderService VALUES('PS00000000000004','SP00000000000003','Regular')
INSERT INTO MsProviderService VALUES('PS00000000000005','SP00000000000003','YES')
INSERT INTO MsProviderService VALUES('PS00000000000006','SP00000000000004','Regular')
INSERT INTO MsProviderService VALUES('PS00000000000007','SP00000000000004','Over Night Service')
INSERT INTO MsProviderService VALUES('PS00000000000008','SP00000000000005','Regular')
INSERT INTO MsProviderService VALUES('PS00000000000009','SP00000000000006','Regular')
INSERT INTO MsProviderService VALUES('PS00000000000010','SP00000000000007','Parcel')
INSERT INTO MsProviderService VALUES('PS00000000000011','SP00000000000008','Regular')
GO
SELECT * FROM MsProviderService

INSERT INTO TrSubscriptionHeader VALUES('SB00000000000001','CS00000000000001','2017-06-15',0.25,2)
INSERT INTO TrSubscriptionHeader VALUES('SB00000000000002','CS00000000000002','2017-06-18',0.50,2)
GO
SELECT * FROM TrSubscriptionHeader

INSERT INTO TrSubscriptionDetail VALUES('SB00000000000001','SH00000000000001','PS00000000000001','Well Done','TBU','TBU',0)
INSERT INTO TrSubscriptionDetail VALUES('SB00000000000001','SH00000000000002','PS00000000000001','Well Done','TBU','TBU',0)
INSERT INTO TrSubscriptionDetail VALUES('SB00000000000002','SH00000000000001','PS00000000000002','Well Done','TBU','TBU',0)
INSERT INTO TrSubscriptionDetail VALUES('SB00000000000002','SH00000000000002','PS00000000000002','Well Done','TBU','TBU',0)
GO
SELECT * FROM TrSubscriptionDetail

INSERT INTO MsPayment VALUES('PM00000000000001','John Doe',250000,'BCA','2017-06-17','payment.png')
INSERT INTO MsPayment VALUES('PM00000000000002','Jane Doe',500000,'BCA','2017-07-17','payment.png')
GO
SELECT * FROM MsPayment

INSERT INTO MsPaymentSubscription VALUES('SB00000000000001','PM00000000000001','Paid')
INSERT INTO MsPaymentSubscription VALUES('SB00000000000002','PM00000000000002','Unpaid')
GO
SELECT * FROM MsPaymentSubscription

ROLLBACK

SELECT msa.address_id
FROM msaddress msa JOIN mscustomeraddress mca
ON msa.address_id = mca.address_id JOIN mscustomer msc
ON mca.customer_id = msc.customer_id JOIN trsubscriptionheader tsh
ON msc.customer_id = tsh.customer_id JOIN trsubscriptiondetail tsd
ON tsh.subscription_id = tsd.subscription_id
WHERE shipment_id = 'SH00000000000001'

----------------------------------------------------------------------------------------------------------------


