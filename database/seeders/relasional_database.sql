
CREATE TABLE categories (
    categoryid  INTEGER NOT NULL,
    description CLOB NOT NULL
);

ALTER TABLE categories ADD CONSTRAINT categories_pk PRIMARY KEY ( categoryid );

CREATE TABLE customers (
    c_id           INTEGER NOT NULL,
    c_firstname    VARCHAR2(25 CHAR) NOT NULL,
    c_lastname     VARCHAR2(25 CHAR) NOT NULL,
    c_phone        VARCHAR2(15 CHAR) NOT NULL,
    c_address      VARCHAR2(250 CHAR) NOT NULL,
    c_city         VARCHAR2(50 CHAR) NOT NULL,
    c_region       VARCHAR2(50 CHAR) NOT NULL,
    c_postalcode   VARCHAR2(10 CHAR) NOT NULL,
    c_country      VARCHAR2(50 CHAR) NOT NULL
);

ALTER TABLE customers ADD CONSTRAINT customers_pk PRIMARY KEY ( c_id );

CREATE TABLE order_details (
    orderid   INTEGER NOT NULL,
   
    productid INTEGER NOT NULL,
    unitprice NUMBER(10, 2) NOT NULL,
    quantity  INTEGER NOT NULL
);

ALTER TABLE order_details ADD CONSTRAINT order_details_pk PRIMARY KEY ( orderid,
                                                                        productid );

CREATE TABLE orders (
    orderid                 INTEGER NOT NULL,
     customers_c_id INTEGER NOT NULL, 
    orderdate               DATE NOT NULL,
    shippeddate             DATE NOT NULL,
    shipvia                 VARCHAR2(50 CHAR) NOT NULL,
    shipname                VARCHAR2(100 CHAR) NOT NULL,
    shipaddress             VARCHAR2(250 CHAR) NOT NULL,
    shipcity                VARCHAR2(50 CHAR) NOT NULL,
    shipregion              VARCHAR2(50 CHAR) NOT NULL,
    shippostalcode          VARCHAR2(10 CHAR) NOT NULL,
    shipcountry             VARCHAR2(50 CHAR) NOT NULL,
    order_details_orderid   INTEGER NOT NULL,
    order_details_productid INTEGER NOT NULL,
    shippers_shipperid      INTEGER NOT NULL
);

ALTER TABLE orders ADD CONSTRAINT orders_pk PRIMARY KEY ( orderid );

CREATE TABLE products (
    productid               INTEGER NOT NULL,
    productname             VARCHAR2(100 CHAR) NOT NULL,
    supplierid              INTEGER NOT NULL,
    categoryid              INTEGER NOT NULL,
    unitprice               NUMBER(10, 2) NOT NULL,
    unitsinstock            INTEGER NOT NULL,
    order_details_orderid   INTEGER NOT NULL,
    order_details_productid INTEGER NOT NULL,
    sellers_s_id            INTEGER NOT NULL,
    categories_categoryid   INTEGER NOT NULL
);

CREATE UNIQUE INDEX products__idx ON
    products (
        order_details_orderid
    ASC,
        order_details_productid
    ASC );

ALTER TABLE products ADD CONSTRAINT products_pk PRIMARY KEY ( productid );

CREATE TABLE sellers (
    s_id         INTEGER NOT NULL,
    s_shopname   VARCHAR2(50 CHAR) NOT NULL,
    s_firstname  VARCHAR2(25 CHAR) NOT NULL,
    s_lastname   VARCHAR2(25 CHAR) NOT NULL,
    s_phone      VARCHAR2(15 CHAR) NOT NULL,
    s_address    VARCHAR2(250 CHAR) NOT NULL,
    s_city       VARCHAR2(50 CHAR) NOT NULL,
    s_region     VARCHAR2(50 CHAR) NOT NULL,
    s_postalcode VARCHAR2(10 CHAR) NOT NULL,
    s_country    VARCHAR2(50 CHAR) NOT NULL
);

ALTER TABLE sellers ADD CONSTRAINT sellers_pk PRIMARY KEY ( s_id );

CREATE TABLE shippers (
    shipperid    INTEGER NOT NULL,
    companyname  VARCHAR2(200 CHAR) NOT NULL,
    companyphone VARCHAR2(15 CHAR) NOT NULL
);

ALTER TABLE shippers ADD CONSTRAINT shippers_pk PRIMARY KEY ( shipperid );

ALTER TABLE orders
    ADD CONSTRAINT customers_orders_fk FOREIGN KEY ( customers_c_id )
        REFERENCES customers ( c_id );

ALTER TABLE order_details
    ADD CONSTRAINT order_details_orders_fk FOREIGN KEY ( orderid )
        REFERENCES orders ( orderid );

ALTER TABLE order_details
    ADD CONSTRAINT order_details_products_fk FOREIGN KEY ( productid )
        REFERENCES products ( productid );

ALTER TABLE orders
    ADD CONSTRAINT orders_shippers_fk FOREIGN KEY ( shippers_shipperid )
        REFERENCES shippers ( shipperid );

ALTER TABLE products
    ADD CONSTRAINT products_categories_fk FOREIGN KEY ( categories_categoryid )
        REFERENCES categories ( categoryid );

ALTER TABLE products
    ADD CONSTRAINT products_sellers_fk FOREIGN KEY ( sellers_s_id )
        REFERENCES sellers ( s_id );

