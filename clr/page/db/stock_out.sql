CREATE TABLE stock_out (
    id int NOT NULL AUTO_INCREMENT,
    operatorid int NOT NULL,
		firstname text NOT NULL,
		lastname text NOT NULL,
		department text NOT NULL,
		position text NOT NULL,
		shift text NOT NULL,
		cause text NOT NULL,
		inputetc text,
		request1 text NOT NULL,
		color1 text NOT NULL,
		size1 text NOT NULL,
		barcode1 text,
		request2 text,
		color2 text,
		size2 text,
		barcode2 text,
		request3 text,
		color3 text,
		size3 text,
		barcode3 text,
		request4 text,
		color4 text,
		size4 text,
		barcode4 text,
		request5 text,
		color5 text,
		size5 text,
		barcode5 text,
		request6 text,
		color6 text,
		size6 text,
		barcode6 text,
		request7 text,
		color7 text,
		size7 text,
		barcode7 text,
		request8 text,
		color8 text,
		size8 text,
		barcode8 text,
		out_date datetime,
		request_date datetime,
		per_approval text,
		status_ap int NOT NULL,
		d1 text,
		d2 text,
		d3 text,
		d4 text,
		d5 text,
    PRIMARY KEY (id)
);