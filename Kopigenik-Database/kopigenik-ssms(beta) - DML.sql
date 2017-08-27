CREATE VIEW [CustomerAddress]
AS
	SELECT * 
	FROM MsCustomer msc JOIN MsCustomerAddress mca ON msc.customer_id = mca.customer_id
	JOIN MsAddress msa ON mca.address_id = msa.address_id
GO

DROP VIEW [Address]

SELECT * FROM [Address]

----------------------------------------------------------------------------------------------------------------

---SP & Trigger
--==============--

--CRUD
--==============================================================================================================

--MsCustomer--
----------------------------------------------------------------------------------------------------------------

CREATE PROC getAddressDescriptionByAddressId 
(
	@id CHAR(16)
)
AS
BEGIN
	SELECT [description] as 'Description'
	FROM MsCustomerAddress
	WHERE address_id = @id
END

EXEC getAddressDescriptionByAddressId 'AD00000000000001'

DROP PROC getAddressDescriptionByAddressId

CREATE PROC insertNewCustomer
	(
		@id CHAR(16),
		@name VARCHAR(50),
		@email VARCHAR(50),
		@pass VARCHAR(16),
		@phone VARCHAR(12),
		@dob DATE,
		@gender VARCHAR(8)
	)
AS
BEGIN
	IF EXISTS (
		SELECT * FROM mscustomer
		WHERE email = @email
	) 
		BEGIN
			PRINT 'Customer is already registered!'
		END
	ELSE
		BEGIN
			INSERT INTO mscustomer VALUES(@id,@name,@email,@pass,@phone,@dob,@gender)
			PRINT 'Data successfully inserted!'
		END
END

EXEC insertNewCustomer 'CS00000000000003','Adam Shihab','asdf@mail.com','asdfasdf','087888712789','1995-01-30','Male'

DROP PROC insertNewCustomer

----------------------------------------------------------------------------------------------------------------

CREATE PROC updateCustomerEmailById (@id CHAR(16), @email VARCHAR(50))
AS
BEGIN
	IF NOT EXISTS (
		SELECT * FROM mscustomer
		WHERE customer_id = @id
	)
		BEGIN
			PRINT 'Data is not found!'
		END
	ELSE
		BEGIN
			UPDATE mscustomer
			SET email = @email
			WHERE customer_id = @id
			PRINT 'Data successfully updated!'
		END
END

EXEC updateCustomerEmailById 'CS00000000000003','lalala@live.com'

DROP PROC updateCustomerEmailById

----------------------------------------------------------------------------------------------------------------

CREATE PROC updateCustomerPasswordById (@id CHAR(16), @pass VARCHAR(16))
AS
BEGIN
	IF NOT EXISTS (
		SELECT * FROM mscustomer
		WHERE customer_id = @id
	)
		BEGIN
			PRINT 'Data is not found!'
		END
	ELSE
		BEGIN
			UPDATE mscustomer
			SET pass = @pass
			WHERE customer_id = @id
			PRINT 'Data successfully updated!'
		END
END

EXEC updateCustomerPasswordById 'CS00000000000003','newpasswords'

DROP PROC updateCustomerPasswordById

----------------------------------------------------------------------------------------------------------------

CREATE PROC updateCustomerPhoneById (@id CHAR(16), @phone VARCHAR(12))
AS
BEGIN
	IF NOT EXISTS (
		SELECT * FROM mscustomer
		WHERE customer_id = @id
	)
		BEGIN
			PRINT 'Data is not found!'
		END
	ELSE
		BEGIN
			UPDATE mscustomer
			SET phone = @phone
			WHERE customer_id = @id
			PRINT 'Data successfully updated!'
		END
END

EXEC updateCustomerPhoneById 'CS00000000000003','08222222221'

DROP PROC updateCustomerPhoneById

----------------------------------------------------------------------------------------------------------------

CREATE PROC updateCustomerEmailByName (@name VARCHAR(50), @email VARCHAR(50))
AS
BEGIN
	IF NOT EXISTS (
		SELECT * FROM mscustomer
		WHERE name LIKE '%' + LOWER(@name) + '%'
	)
		BEGIN
			PRINT 'Data is not found!'
		END
	ELSE
		BEGIN
			UPDATE mscustomer
			SET email = @email
			WHERE name = @name
			PRINT 'Data successfully updated!'
		END
END

EXEC updateCustomerEmailByName 'Adam Shihab','lalala@live.com'

DROP PROC updateCustomerEmailByName

----------------------------------------------------------------------------------------------------------------

CREATE PROC updateCustomerPasswordByName (@name VARCHAR(50), @pass VARCHAR(16))
AS
BEGIN
	IF NOT EXISTS (
		SELECT * FROM mscustomer
		WHERE name LIKE '%' + LOWER(@name) + '%'
	)
		BEGIN
			PRINT 'Data is not found!'
		END
	ELSE
		BEGIN
			UPDATE mscustomer
			SET pass = @pass
			WHERE name = @name
			PRINT 'Data successfully updated!'
		END
END

EXEC updateCustomerPasswordByName 'Adam Shihab','newpassword'

DROP PROC updateCustomerPasswordByName

----------------------------------------------------------------------------------------------------------------

CREATE PROC updateCustomerPhoneByName (@name VARCHAR(50), @phone VARCHAR(16))
AS
BEGIN
	IF NOT EXISTS (
		SELECT * FROM mscustomer
		WHERE name LIKE '%' + LOWER(@name) + '%'
	)
		BEGIN
			PRINT 'Data is not found!'
		END
	ELSE
		BEGIN
			UPDATE mscustomer
			SET phone = @phone
			WHERE name = @name
			PRINT 'Data successfully updated!'
		END
END

EXEC updateCustomerPhoneByName 'Adam Shihab','082222222222'

DROP PROC updateCustomerPhoneByName

----------------------------------------------------------------------------------------------------------------

CREATE PROC deleteCustomerById (@id CHAR(16))
AS
BEGIN
	IF NOT EXISTS (
		SELECT * FROM mscustomer
		WHERE customer_id = @id
	)
		BEGIN
			PRINT 'Data is not found!'
		END
	ELSE
		BEGIN
			DELETE FROM mscustomer
			WHERE customer_id = @id
			PRINT 'Data successfully deleted!'
		END
END

EXEC deleteCustomerById 'CS00000000000003'

DROP PROC deleteCustomerById

----------------------------------------------------------------------------------------------------------------

CREATE PROC deleteCustomerByName (@name VARCHAR(50))
AS
BEGIN
	IF NOT EXISTS (
		SELECT * FROM mscustomer
		WHERE name LIKE '%' + LOWER(@name) + '%'
	)
		BEGIN
			PRINT 'Data is not found!'
		END
	ELSE
		BEGIN
			DELETE FROM mscustomer
			WHERE name = @name
			PRINT 'Data successfully deleted!'
		END
END

EXEC deleteCustomerByName 'Adam Shihab'

DROP PROC deleteCustomerByName

----------------------------------------------------------------------------------------------------------------

--MsAddress--
----------------------------------------------------------------------------------------------------------------

CREATE PROC insertNewAddress
	(
		@id CHAR(16),
		@address VARCHAR(150),
		@province VARCHAR(25),
		@city VARCHAR(25),
		@district VARCHAR(25),
		@subdistrict VARCHAR(25),
		@zipcode CHAR(5)
	)
AS
BEGIN
	IF EXISTS (
		SELECT * FROM msaddress
		WHERE address_id = @id
	) 
		BEGIN
			PRINT 'Data is already registered!'
		END
	ELSE
		BEGIN
			INSERT INTO msaddress VALUES(@id,@address,@province,@city,@district,@subdistrict,@zipcode)
			PRINT 'Data successfully inserted!'
		END
END

EXEC insertNewAddress 'AD00000000000009','TBU','TBU','TBU','TBU','TBU','TBU'

DROP PROC insertNewAddress

----------------------------------------------------------------------------------------------------------------

CREATE PROC updateAddressByCustomerId
	(
		@id CHAR(16),
		@address VARCHAR(150),
		@province VARCHAR(25),
		@city VARCHAR(25),
		@district VARCHAR(25),
		@subdistrict VARCHAR(25),
		@zipcode CHAR(5)
	)
AS
BEGIN
	IF NOT EXISTS (
		SELECT * FROM mscustomer
		WHERE customer_id = @id
	) 
		BEGIN
			PRINT 'Data is not found!'
		END
	ELSE
		BEGIN
			UPDATE msaddress
			SET	[address] = @address,
				province = @province,
				city = @city,
				district = @district,
				subdistrict = @subdistrict,
				zipcode = @zipcode
			WHERE address_id IN (SELECT * FROM)
			PRINT 'Data successfully updated!'
		END
END

EXEC updateAddressByCustomerId 'CS00000000000003','TBC','TBC','TBC','TBC','TBC','TBC'

DROP PROC updateAddressByCustomerId

----------------------------------------------------------------------------------------------------------------

SELECT * FROM msaddress
SELECT * FROM mscustomer
SELECT * FROM mscustomeraddress
SELECT * FROM msroaster
SELECT * FROM msroasteraddress
SELECT * FROM mscoffee
SELECT * FROM msproviderservice
SELECT * FROM msshipmentprovider
SELECT * FROM mspaymentsubscription
SELECT * FROM mspayment

CREATE PROC showTransactions
AS
BEGIN
	SELECT * FROM trsubscriptionheader
	SELECT * FROM trsubscriptiondetail
	SELECT * FROM msshipmentsubs
	SELECT * FROM msroastercoffee
END

EXEC showTransactions

DROP PROC showTransactions

----------------------------------------------------------------------------------------------------------------

CREATE PROC newSubscription
	(
		@subscription_id CHAR(16),	
		@customer_id CHAR(16),
		@subscription_date DATE,
		@qty_in_kg FLOAT,
		@freq INT
	)
AS
BEGIN
	CREATE TRIGGER 
END

----------------------------------------------------------------------------------------------------------------

--GET SHIPMENT_ID BY DATEDIFF FOR NEW SUBS
SELECT DISTINCT(mss.shipment_id)
FROM trsubscriptionheader tsh JOIN trsubscriptiondetail tsd
ON tsh.subscription_id = tsd.subscription_id JOIN msshipmentsubs mss
ON tsd.shipment_id = mss.shipment_id
WHERE DATEDIFF(d,tsh.subscription_date,mss.shipment_date) < 14

--GET NEXT SHIPMENT_DATE BY DATEDIFF OF LAST SHIPMENT_ID
CREATE PROC getNextShipmentId(
	@date DATE
)
AS
BEGIN
	SELECT shipment_id
	FROM msshipmentsubs mss
	WHERE DATEDIFF(d,@date,mss.shipment_date) < 14 AND mss.shipment_status = 'TBO'
END;

EXEC getNextShipmentId '2017-07-11'

DROP PROC getNextShipmentId

BEGIN TRAN
UPDATE msshipmentsubs
SET shipment_status = 'Closed'
WHERE shipment_id = 'SH00000000000002'
ROLLBACK

--GET SHIPMENT_STATUS BY ..
SELECT *
FROM msshipmentsubs mss
WHERE shipment_status = 'TBO'

--GET ADDRESSES BY SHIPMENT_ID
SELECT msa.address_id
FROM msaddress msa JOIN mscustomeraddress mca
ON msa.address_id = mca.address_id JOIN mscustomer msc
ON mca.customer_id = msc.customer_id JOIN trsubscriptionheader tsh
ON msc.customer_id = tsh.customer_id JOIN trsubscriptiondetail tsd
ON tsh.subscription_id = tsd.subscription_id
WHERE shipment_id = 'SH00000000000001'

--GET SERVICE_ID BY PROVIDER NAME
SELECT service_id, [service_name]
FROM msshipmentprovider msp JOIN msproviderservice mps
ON msp.provider_id = mps.provider_id
WHERE provider_name = 'JNE'

--GET PAYMENT_STATUS BY CUSTOMER NAME
SELECT msc.name, mps.payment_status
FROM mscustomer msc JOIN trsubscriptionheader tsh 
ON msc.customer_id = tsh.customer_id JOIN mspaymentsubscription mps
ON tsh.subscription_id = mps.subscription_id JOIN mspayment msp
ON mps.payment_id = msp.payment_id
WHERE msc.name = 'Jane Doe'

--GET DETAILS OF  ROASTER'S BREWED COFFEES BY THEIR NAME
SELECT msc.name, mrc.roast_date, mrc.amount_in_kg, mrc.roast_status
FROM msroaster msr JOIN msroastercoffee mrc
ON msr.roaster_id = mrc.roaster_id JOIN mscoffee msc
ON mrc.coffee_id = msc.coffee_id
WHERE msr.name LIKE '%tobis%'

EXEC showTransactions

USE Kopigenik_Beta