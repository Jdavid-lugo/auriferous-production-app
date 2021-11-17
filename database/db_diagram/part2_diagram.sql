-- public.clients definition

-- Drop table

-- DROP TABLE clients;

CREATE TABLE clients (
	id bigserial NOT NULL,
	document_type varchar(1) NOT NULL DEFAULT 'V',
	document_id int4 NOT NULL,
	"name" varchar(191) NOT NULL,
	email varchar(191) NULL,
	phone varchar(191) NULL,
	last_purchase timestamp(0) NULL,
	total_purchases int4 NOT NULL DEFAULT 0,
	total_paid numeric(8, 2) NOT NULL DEFAULT '0'::numeric,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	deleted_at timestamp(0) NULL,
	balance numeric(8, 2) NOT NULL DEFAULT '0'::numeric,
	CONSTRAINT clients_document_id_unique UNIQUE (document_id),
	CONSTRAINT clients_pkey PRIMARY KEY (id)
);


-- public.failed_jobs definition

-- Drop table

-- DROP TABLE failed_jobs;

CREATE TABLE failed_jobs (
	id bigserial NOT NULL,
	"connection" text NOT NULL,
	queue text NOT NULL,
	payload text NOT NULL,
	"exception" text NOT NULL,
	failed_at timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT failed_jobs_pkey PRIMARY KEY (id)
);


-- public.migrations definition
-- Drop table
-- DROP TABLE migrations;

CREATE TABLE migrations (
	id serial4 NOT NULL,
	migration varchar(191) NOT NULL,
	batch int4 NOT NULL,
	CONSTRAINT migrations_pkey PRIMARY KEY (id)
);


-- public.password_resets definition

-- Drop table

-- DROP TABLE password_resets;

CREATE TABLE password_resets (
	email varchar(191) NOT NULL,
	"token" varchar(191) NOT NULL,
	created_at timestamp(0) NULL
);
CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


-- public.payment_methods definition

-- Drop table

-- DROP TABLE payment_methods;

CREATE TABLE payment_methods (
	id bigserial NOT NULL,
	"name" varchar(191) NOT NULL,
	description text NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	deleted_at timestamp(0) NULL,
	CONSTRAINT payment_methods_pkey PRIMARY KEY (id)
);


-- public.product_categories definition

-- Drop table

-- DROP TABLE product_categories;

CREATE TABLE product_categories (
	id bigserial NOT NULL,
	"name" varchar(191) NOT NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	deleted_at timestamp(0) NULL,
	CONSTRAINT product_categories_pkey PRIMARY KEY (id)
);


-- public.providers definition

-- Drop table

-- DROP TABLE providers;

CREATE TABLE providers (
	id bigserial NOT NULL,
	"name" varchar(191) NOT NULL,
	description text NULL,
	paymentinfo text NULL,
	email varchar(191) NULL,
	phone varchar(191) NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	deleted_at timestamp(0) NULL,
	CONSTRAINT providers_pkey PRIMARY KEY (id)
);


-- public.users definition

-- Drop table

-- DROP TABLE users;

CREATE TABLE users (
	id bigserial NOT NULL,
	"name" varchar(191) NOT NULL,
	email varchar(191) NOT NULL,
	email_verified_at timestamp(0) NULL,
	"password" varchar(191) NOT NULL,
	remember_token varchar(100) NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	deleted_at timestamp(0) NULL,
	CONSTRAINT users_email_unique UNIQUE (email),
	CONSTRAINT users_pkey PRIMARY KEY (id)
);


-- public.products definition

-- Drop table

-- DROP TABLE products;

CREATE TABLE products (
	id bigserial NOT NULL,
	"name" varchar(191) NOT NULL,
	description text NULL,
	product_category_id int8 NOT NULL,
	price numeric(10, 2) NOT NULL,
	stock int4 NOT NULL DEFAULT 0,
	stock_defective int4 NOT NULL DEFAULT 0,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	deleted_at timestamp(0) NULL,
	CONSTRAINT products_pkey PRIMARY KEY (id),
	CONSTRAINT products_product_category_id_foreign FOREIGN KEY (product_category_id) REFERENCES product_categories(id)
);


-- public.receipts definition

-- Drop table

-- DROP TABLE receipts;

CREATE TABLE receipts (
	id bigserial NOT NULL,
	title varchar(191) NOT NULL,
	provider_id int8 NULL,
	user_id int8 NOT NULL,
	finalized_at timestamp(0) NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	CONSTRAINT receipts_pkey PRIMARY KEY (id),
	CONSTRAINT receipts_provider_id_foreign FOREIGN KEY (provider_id) REFERENCES providers(id),
	CONSTRAINT receipts_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id)
);


-- public.received_products definition

-- Drop table

-- DROP TABLE received_products;

CREATE TABLE received_products (
	id bigserial NOT NULL,
	receipt_id int8 NOT NULL,
	product_id int8 NOT NULL,
	stock int4 NOT NULL,
	stock_defective int4 NOT NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	CONSTRAINT received_products_pkey PRIMARY KEY (id),
	CONSTRAINT received_products_product_id_foreign FOREIGN KEY (product_id) REFERENCES products(id),
	CONSTRAINT received_products_receipt_id_foreign FOREIGN KEY (receipt_id) REFERENCES receipts(id) ON DELETE CASCADE
);


-- public.sales definition

-- Drop table

-- DROP TABLE sales;

CREATE TABLE sales (
	id bigserial NOT NULL,
	user_id int8 NOT NULL,
	client_id int8 NOT NULL,
	total_amount numeric(10, 2) NULL,
	finalized_at timestamp(0) NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	CONSTRAINT sales_pkey PRIMARY KEY (id),
	CONSTRAINT sales_client_id_foreign FOREIGN KEY (client_id) REFERENCES clients(id),
	CONSTRAINT sales_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id)
);


-- public.sold_products definition

-- Drop table

-- DROP TABLE sold_products;

CREATE TABLE sold_products (
	id bigserial NOT NULL,
	sale_id int8 NOT NULL,
	product_id int8 NOT NULL,
	qty int4 NOT NULL,
	price numeric(10, 2) NOT NULL,
	total_amount numeric(10, 2) NOT NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	CONSTRAINT sold_products_pkey PRIMARY KEY (id),
	CONSTRAINT sold_products_product_id_foreign FOREIGN KEY (product_id) REFERENCES products(id),
	CONSTRAINT sold_products_sale_id_foreign FOREIGN KEY (sale_id) REFERENCES sales(id) ON DELETE CASCADE
);


-- public.transfers definition

-- Drop table

-- DROP TABLE transfers;

CREATE TABLE transfers (
	id bigserial NOT NULL,
	title varchar(191) NULL,
	sender_method_id int8 NOT NULL,
	receiver_method_id int8 NOT NULL,
	sended_amount numeric(10, 2) NOT NULL,
	received_amount numeric(10, 2) NOT NULL,
	reference varchar(191) NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	CONSTRAINT transfers_pkey PRIMARY KEY (id),
	CONSTRAINT transfers_receiver_method_id_foreign FOREIGN KEY (receiver_method_id) REFERENCES payment_methods(id),
	CONSTRAINT transfers_sender_method_id_foreign FOREIGN KEY (sender_method_id) REFERENCES payment_methods(id)
);


-- public.transactions definition

-- Drop table

-- DROP TABLE transactions;

CREATE TABLE transactions (
	id bigserial NOT NULL,
	"type" varchar(191) NOT NULL,
	title varchar(191) NOT NULL,
	reference varchar(191) NULL,
	client_id int8 NULL,
	sale_id int8 NULL,
	provider_id int8 NULL,
	transfer_id int8 NULL,
	payment_method_id int8 NOT NULL,
	amount numeric(10, 2) NOT NULL,
	user_id int8 NOT NULL,
	created_at timestamp(0) NULL,
	updated_at timestamp(0) NULL,
	CONSTRAINT transactions_pkey PRIMARY KEY (id),
	CONSTRAINT transactions_client_id_foreign FOREIGN KEY (client_id) REFERENCES clients(id),
	CONSTRAINT transactions_payment_method_id_foreign FOREIGN KEY (payment_method_id) REFERENCES payment_methods(id),
	CONSTRAINT transactions_provider_id_foreign FOREIGN KEY (provider_id) REFERENCES providers(id),
	CONSTRAINT transactions_sale_id_foreign FOREIGN KEY (sale_id) REFERENCES sales(id) ON DELETE CASCADE,
	CONSTRAINT transactions_transfer_id_foreign FOREIGN KEY (transfer_id) REFERENCES transfers(id) ON DELETE CASCADE,
	CONSTRAINT transactions_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id)
);