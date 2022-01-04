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
    id integer NOT NULL,
    first_name character varying(255) NOT NULL,
    last_name character varying(255) NOT NULL,
    login_name character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    status integer DEFAULT 1 NOT NULL,
    update_date timestamp with time zone
);


ALTER TABLE public.admins OWNER TO postgres;

--
-- Name: admins_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.admins_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.admins_id_seq OWNER TO postgres;

--
-- Name: admins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.admins_id_seq OWNED BY public.admins.id;


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
-- Name: brands_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.brands_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.brands_id_seq OWNER TO postgres;

--
-- Name: brands_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.brands_id_seq OWNED BY public.brands.id;


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
-- Name: cart_products_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cart_products_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cart_products_id_seq OWNER TO postgres;

--
-- Name: cart_products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cart_products_id_seq OWNED BY public.cart_products.id;


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
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categories_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categories_id_seq OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


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
-- Name: customers_cart_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.customers_cart_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.customers_cart_id_seq OWNER TO postgres;

--
-- Name: customers_cart_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.customers_cart_id_seq OWNED BY public.customers_cart.id;


--
-- Name: customers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.customers_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.customers_id_seq OWNER TO postgres;

--
-- Name: customers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.customers_id_seq OWNED BY public.customers.id;


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
-- Name: order_details_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.order_details_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.order_details_id_seq OWNER TO postgres;

--
-- Name: order_details_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.order_details_id_seq OWNED BY public.order_details.id;


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
-- Name: orders_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.orders_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.orders_id_seq OWNER TO postgres;

--
-- Name: orders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.orders_id_seq OWNED BY public.orders.id;


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
-- Name: product_images_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.product_images_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.product_images_id_seq OWNER TO postgres;

--
-- Name: product_images_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.product_images_id_seq OWNED BY public.product_images.id;


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
-- Name: product_type_warranties_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.product_type_warranties_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.product_type_warranties_id_seq OWNER TO postgres;

--
-- Name: product_type_warranties_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.product_type_warranties_id_seq OWNED BY public.product_type_warranties.id;


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
    warranty_id integer
);


ALTER TABLE public.products OWNER TO postgres;

--
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.products_id_seq OWNER TO postgres;

--
-- Name: products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;


--
-- Name: admins id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admins ALTER COLUMN id SET DEFAULT nextval('public.admins_id_seq'::regclass);


--
-- Name: brands id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.brands ALTER COLUMN id SET DEFAULT nextval('public.brands_id_seq'::regclass);


--
-- Name: cart_products id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart_products ALTER COLUMN id SET DEFAULT nextval('public.cart_products_id_seq'::regclass);


--
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- Name: customers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customers ALTER COLUMN id SET DEFAULT nextval('public.customers_id_seq'::regclass);


--
-- Name: customers_cart id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customers_cart ALTER COLUMN id SET DEFAULT nextval('public.customers_cart_id_seq'::regclass);


--
-- Name: order_details id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_details ALTER COLUMN id SET DEFAULT nextval('public.order_details_id_seq'::regclass);


--
-- Name: orders id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.orders_id_seq'::regclass);


--
-- Name: product_images id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_images ALTER COLUMN id SET DEFAULT nextval('public.product_images_id_seq'::regclass);


--
-- Name: product_type_warranties id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_type_warranties ALTER COLUMN id SET DEFAULT nextval('public.product_type_warranties_id_seq'::regclass);


--
-- Name: products id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);


--
-- Data for Name: admins; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.admins (id, first_name, last_name, login_name, password, regist_date, status, update_date) FROM stdin;
1	qtv01	qtv01	qtv01	827ccb0eea8a706c4c34a16891f84e7b	2022-01-05 00:44:08.175123+07	1	\N
\.


--
-- Data for Name: brands; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.brands (id, brand_name, image, status, admin_id, regist_date, update_date, description) FROM stdin;
1	Sony	\N	1	1	2022-01-05 00:54:06.426556+07	\N	Sony
2	Xiaomi	050a1a6431190e4941423f8c88d227b9-Xiaomi_logo.png	1	1	2022-01-05 01:01:25.195919+07	\N	 Xiaomi
3	SamSung	5239ebdddf8bd9ae7a732a99f564b2da-samsung-logo.png	1	1	2022-01-05 01:01:51.747372+07	\N	 SamSung
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
1	Tai nghe không dây	2022-01-05 04:45:47.572779+07	\N	1	1
2	Tai nghe có dây	2022-01-05 04:46:12.690241+07	\N	1	1
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
1	3	1	2022-01-05 04:54:03.542816+07	\N	0e4a2361fef6565911e435fe3f57d7e7-sp1.jpg
2	4	1	2022-01-05 04:58:16.216038+07	\N	d813ff15c98717cf58bce9f0d587beb9-sp2.jpg
3	4	1	2022-01-05 04:58:16.221896+07	\N	96150453e68cfd107da402c3e540c114-sp3.jpg
4	5	1	2022-01-05 05:00:35.029259+07	\N	70e5564d0e4ee5ea8e042dca070feb63-sp04.jpg
5	5	1	2022-01-05 05:00:35.035145+07	\N	8dc76009f502ebc4d3b0ac5a671843bb-sp05.jpg
6	2	1	2022-01-05 06:24:39.501491+07	\N	8dc76009f502ebc4d3b0ac5a671843bb-sp05.jpg
\.


--
-- Data for Name: product_type_warranties; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product_type_warranties (id, name_warranty, description_warranty, regist_date, update_date, status) FROM stdin;
\.


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products (id, product_code, name, brand_id, category_id, price, description, regist_date, update_date, status, quantily, admin_id, warranty_id) FROM stdin;
2	MDR-EX15AP 	Tai nghe dây nhét tai Sony Extra Bass MDR-EX15AP	1	1	199000	mô tả	2022-01-05 04:52:44.520906+07	\N	1	100	1	\N
3	MDR-EX15AP 	Tai nghe dây nhét tai Sony Extra Bass MDR-EX15AP	1	1	199000	aaaaaaaa	2022-01-05 04:54:03.484992+07	\N	1	1000	1	\N
4	WH-1000XM4	TAI NGHE SONY WH-1000XM4 WIRELESS NOISE-CANCELLING - BLACK	1	2	5439000	TAI NGHE SONY WH-1000XM4 WIRELESS NOISE-CANCELLING - BLACK	2022-01-05 04:58:16.178939+07	\N	1	10	1	\N
5	SP01	Tai nghe Xiaomi Mi Earphone Basic	2	2	20000	Tai nghe Xiaomi Mi Earphone Basic	2022-01-05 05:00:34.979801+07	\N	1	105	1	\N
\.


--
-- Name: admins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.admins_id_seq', 1, true);


--
-- Name: brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.brands_id_seq', 3, true);


--
-- Name: cart_products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cart_products_id_seq', 1, false);


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categories_id_seq', 2, true);


--
-- Name: customers_cart_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.customers_cart_id_seq', 1, false);


--
-- Name: customers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.customers_id_seq', 1, false);


--
-- Name: order_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.order_details_id_seq', 1, false);


--
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.orders_id_seq', 1, false);


--
-- Name: product_images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_images_id_seq', 6, true);


--
-- Name: product_type_warranties_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_type_warranties_id_seq', 1, false);


--
-- Name: products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_id_seq', 5, true);


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
-- Name: brands brands_admin_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.brands
    ADD CONSTRAINT brands_admin_id_fkey FOREIGN KEY (admin_id) REFERENCES public.admins(id) NOT VALID;


--
-- PostgreSQL database dump complete
--

