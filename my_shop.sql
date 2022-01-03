--
-- PostgreSQL database dump
--

-- Dumped from database version 13.2
-- Dumped by pg_dump version 13.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: admins; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admins (
    first_name character varying(255) NOT NULL,
    id integer NOT NULL,
    last_name character varying(255) NOT NULL,
    login_name character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    status integer DEFAULT 1 NOT NULL,
    update_date timestamp with time zone
);


ALTER TABLE public.admins OWNER TO postgres;

--
-- Name: brands; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.brands (
    id integer NOT NULL,
    brand_name character varying NOT NULL,
    image character varying,
    status integer DEFAULT 1 NOT NULL,
    admin_id integer NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    description text
);


ALTER TABLE public.brands OWNER TO postgres;

--
-- Name: cart_products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cart_products (
    id integer NOT NULL,
    cart_id integer NOT NULL,
    product_id integer NOT NULL,
    quantily integer NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.cart_products OWNER TO postgres;

--
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categories (
    id integer NOT NULL,
    category_name character varying NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    admin_id integer NOT NULL,
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.categories OWNER TO postgres;

--
-- Name: customers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.customers (
    id integer NOT NULL,
    first_name character varying NOT NULL,
    last_name character varying NOT NULL,
    birthday date NOT NULL,
    email character varying NOT NULL,
    phone character varying NOT NULL,
    password character varying,
    is_register integer DEFAULT 1 NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.customers OWNER TO postgres;

--
-- Name: customers_cart; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.customers_cart (
    id integer NOT NULL,
    customer_id integer NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.customers_cart OWNER TO postgres;

--
-- Name: order_details; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.order_details (
    id integer NOT NULL,
    order_id integer NOT NULL,
    product_id integer NOT NULL,
    quantily integer NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    status integer DEFAULT 1 NOT NULL,
    price double precision NOT NULL,
    discount double precision DEFAULT 0
);


ALTER TABLE public.order_details OWNER TO postgres;

--
-- Name: orders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.orders (
    id integer NOT NULL,
    customer_id integer,
    order_name character varying NOT NULL,
    order_email character varying NOT NULL,
    order_phone character varying NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    status integer DEFAULT 1 NOT NULL,
    confirm_admin_id integer NOT NULL,
    confirm_date timestamp with time zone,
    province_code integer NOT NULL,
    district_code integer NOT NULL,
    ward_code integer NOT NULL,
    address character varying NOT NULL,
    address_full character varying NOT NULL,
    " delivery_cost" double precision DEFAULT 0 NOT NULL,
    discount double precision DEFAULT 0 NOT NULL,
    total double precision NOT NULL,
    order_note character varying
);


ALTER TABLE public.orders OWNER TO postgres;

--
-- Name: product_images; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.product_images (
    id integer NOT NULL,
    product_id integer NOT NULL,
    status integer DEFAULT 1 NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    image text NOT NULL
);


ALTER TABLE public.product_images OWNER TO postgres;

--
-- Name: product_type_warranties; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.product_type_warranties (
    id integer NOT NULL,
    name_warranty character varying NOT NULL,
    description_warranty text NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.product_type_warranties OWNER TO postgres;

--
-- Name: products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products (
    id integer NOT NULL,
    product_code character varying NOT NULL,
    name character varying NOT NULL,
    brand_id integer NOT NULL,
    category_id integer NOT NULL,
    price integer NOT NULL,
    description text NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    status integer DEFAULT 1 NOT NULL,
    quantily integer NOT NULL,
    admin_id integer NOT NULL,
    warranty_id integer NOT NULL
);


ALTER TABLE public.products OWNER TO postgres;

--
-- Data for Name: admins; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.admins (first_name, id, last_name, login_name, password, regist_date, status, update_date) FROM stdin;
admin1	1	admin1	admin1	827ccb0eea8a706c4c34a16891f84e7b	2022-01-02 11:13:30.910118+07	1	\N
\.


--
-- Data for Name: brands; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.brands (id, brand_name, image, status, admin_id, regist_date, update_date, description) FROM stdin;
1	Brand1	\N	1	1	2022-01-02 11:22:37.866381+07	\N	\N
\.


--
-- Data for Name: cart_products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cart_products (id, cart_id, product_id, quantily, regist_date, update_date, status) FROM stdin;
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categories (id, category_name, regist_date, update_date, admin_id, status) FROM stdin;
1	Category 1	2022-01-02 11:14:24.322866+07	\N	1	1
\.


--
-- Data for Name: customers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.customers (id, first_name, last_name, birthday, email, phone, password, is_register, regist_date, update_date, status) FROM stdin;
\.


--
-- Data for Name: customers_cart; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.customers_cart (id, customer_id, regist_date, update_date, status) FROM stdin;
\.


--
-- Data for Name: order_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.order_details (id, order_id, product_id, quantily, regist_date, update_date, status, price, discount) FROM stdin;
\.


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.orders (id, customer_id, order_name, order_email, order_phone, regist_date, update_date, status, confirm_admin_id, confirm_date, province_code, district_code, ward_code, address, address_full, " delivery_cost", discount, total, order_note) FROM stdin;
\.


--
-- Data for Name: product_images; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product_images (id, product_id, status, regist_date, update_date, image) FROM stdin;
\.


--
-- Data for Name: product_type_warranties; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product_type_warranties (id, name_warranty, description_warranty, regist_date, update_date, status) FROM stdin;
1	warranty1	abc	2022-01-02 11:15:54.799022+07	\N	1
\.


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products (id, product_code, name, brand_id, category_id, price, description, regist_date, update_date, status, quantily, admin_id, warranty_id) FROM stdin;
1	SP01	Sản phẩm 1	1	1	110000	abc	2022-01-02 11:16:42.195892+07	\N	1	10	1	1
\.


--
-- Name: admins admins_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_pkey PRIMARY KEY (id);


--
-- Name: brands brands_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.brands
    ADD CONSTRAINT brands_pkey PRIMARY KEY (id);


--
-- Name: cart_products cart_products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart_products
    ADD CONSTRAINT cart_products_pkey PRIMARY KEY (id);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- Name: customers_cart customers_cart_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customers_cart
    ADD CONSTRAINT customers_cart_pkey PRIMARY KEY (id);


--
-- Name: customers customers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customers
    ADD CONSTRAINT customers_pkey PRIMARY KEY (id);


--
-- Name: order_details order_details_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_details
    ADD CONSTRAINT order_details_pkey PRIMARY KEY (id);


--
-- Name: orders orders_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id);


--
-- Name: product_images product_images_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_images
    ADD CONSTRAINT product_images_pkey PRIMARY KEY (id);


--
-- Name: product_type_warranties product_type_warranties_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_type_warranties
    ADD CONSTRAINT product_type_warranties_pkey PRIMARY KEY (id);


--
-- Name: products products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);


--
-- Name: brands brands_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.brands
    ADD CONSTRAINT brands_id_fkey FOREIGN KEY (id) REFERENCES public.admins(id);


--
-- Name: cart_products cart_products_cart_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart_products
    ADD CONSTRAINT cart_products_cart_id_fkey FOREIGN KEY (cart_id) REFERENCES public.customers_cart(id);


--
-- Name: cart_products cart_products_product_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart_products
    ADD CONSTRAINT cart_products_product_id_fkey FOREIGN KEY (product_id) REFERENCES public.products(id);


--
-- Name: categories categories_admin_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_admin_id_fkey FOREIGN KEY (admin_id) REFERENCES public.admins(id);


--
-- Name: customers_cart customers_cart_customer_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customers_cart
    ADD CONSTRAINT customers_cart_customer_id_fkey FOREIGN KEY (customer_id) REFERENCES public.customers(id);


--
-- Name: order_details order_details_order_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_details
    ADD CONSTRAINT order_details_order_id_fkey FOREIGN KEY (order_id) REFERENCES public.orders(id);


--
-- Name: order_details order_details_product_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_details
    ADD CONSTRAINT order_details_product_id_fkey FOREIGN KEY (product_id) REFERENCES public.products(id);


--
-- Name: orders orders_confirm_admin_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_confirm_admin_id_fkey FOREIGN KEY (confirm_admin_id) REFERENCES public.admins(id);


--
-- Name: orders orders_customer_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_customer_id_fkey FOREIGN KEY (customer_id) REFERENCES public.customers(id) NOT VALID;


--
-- Name: product_images product_images_product_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_images
    ADD CONSTRAINT product_images_product_id_fkey FOREIGN KEY (product_id) REFERENCES public.products(id);


--
-- Name: products products_admin_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_admin_id_fkey FOREIGN KEY (admin_id) REFERENCES public.admins(id);


--
-- Name: products products_brand_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_brand_id_fkey FOREIGN KEY (brand_id) REFERENCES public.brands(id);


--
-- Name: products products_category_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_category_id_fkey FOREIGN KEY (category_id) REFERENCES public.categories(id);


--
-- Name: products products_warranty_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_warranty_id_fkey FOREIGN KEY (warranty_id) REFERENCES public.product_type_warranties(id) NOT VALID;


--
-- PostgreSQL database dump complete
--

