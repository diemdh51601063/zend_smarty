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
    birthday date,
    email character varying NOT NULL,
    phone character varying NOT NULL,
    password character varying,
    is_register integer DEFAULT 1 NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    status integer DEFAULT 1 NOT NULL,
    address character varying,
    city_code integer,
    district_code integer,
    ward_code integer,
    city_name character varying,
    district_name character varying,
    ward_name character varying,
    country_code character varying NOT NULL
);


ALTER TABLE public.customers OWNER TO postgres;

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
    discount double precision DEFAULT 0,
    image character varying,
    detail_product_id integer,
    detail_product_color character varying
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
    customer_id integer NOT NULL,
    order_name character varying NOT NULL,
    order_email character varying NOT NULL,
    order_phone character varying NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    status integer DEFAULT 1 NOT NULL,
    confirm_admin_id integer,
    confirm_date timestamp with time zone,
    city_code integer,
    district_code integer,
    ward_code integer,
    address character varying,
    " delivery_cost" double precision DEFAULT 0,
    discount double precision DEFAULT 0,
    total double precision NOT NULL,
    order_note character varying,
    city_name character varying,
    district_name character varying,
    ward_name character varying,
    payment_method character varying,
    cancel_reason character varying
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
-- Name: product_details; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.product_details (
    id integer NOT NULL,
    color character varying NOT NULL,
    price double precision NOT NULL,
    quantily integer NOT NULL,
    status integer DEFAULT 1 NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    product_id integer NOT NULL
);


ALTER TABLE public.product_details OWNER TO postgres;

--
-- Name: product_details_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.product_details_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.product_details_id_seq OWNER TO postgres;

--
-- Name: product_details_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.product_details_id_seq OWNED BY public.product_details.id;


--
-- Name: product_images; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.product_images (
    id integer NOT NULL,
    product_id integer NOT NULL,
    status integer DEFAULT 1 NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    image character varying NOT NULL,
    product_detail_id integer
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
    price integer,
    description text NOT NULL,
    regist_date timestamp with time zone DEFAULT now() NOT NULL,
    update_date timestamp with time zone,
    status integer DEFAULT 1 NOT NULL,
    quantily integer NOT NULL,
    admin_id integer NOT NULL,
    warranty_id integer,
    charging_port character varying,
    size character varying,
    weight character varying,
    jack character varying,
    length character varying,
    control character varying,
    compatible character varying
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
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- Name: customers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customers ALTER COLUMN id SET DEFAULT nextval('public.customers_id_seq'::regclass);


--
-- Name: order_details id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_details ALTER COLUMN id SET DEFAULT nextval('public.order_details_id_seq'::regclass);


--
-- Name: orders id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.orders_id_seq'::regclass);


--
-- Name: product_details id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_details ALTER COLUMN id SET DEFAULT nextval('public.product_details_id_seq'::regclass);


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
3	SamSung	ac3567edab4bf7034725e3aa38370907-samsung-logo.png	1	1	2022-01-05 01:01:51.747372+07	2022-01-10 22:21:43+07	 SamSung
2	Xiaomi	3f76796fc81408701ddce890dd5cc522-Xiaomi_logo.png	1	1	2022-01-05 01:01:25.195919+07	2022-01-10 22:29:01+07	 Xiaomi
4	SONY	61891fdf-logo-sony.jpg	1	1	2022-01-10 20:48:43.780152+07	2022-01-20 06:41:53+07	 
21	Apple	bd79d047-apple_logo.png	1	1	2022-01-16 02:04:03.229228+07	2022-01-20 06:43:23+07	 
1	HUAWAI	4f279b9e-huwailogo.png	1	1	2022-01-05 00:54:06.426556+07	2022-01-20 06:44:42+07	mô tả   HUAWEI
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categories (id, category_name, regist_date, update_date, admin_id, status) FROM stdin;
1	Tai nghe không dây	2022-01-05 04:45:47.572779+07	\N	1	1
2	Tai nghe có dây	2022-01-05 04:46:12.690241+07	2022-01-20 06:44:54+07	1	1
5	Tai nghe chụp đầu	2022-01-20 06:45:33.491069+07	\N	1	1
\.


--
-- Data for Name: customers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.customers (id, first_name, last_name, birthday, email, phone, password, is_register, regist_date, update_date, status, address, city_code, district_code, ward_code, city_name, district_name, ward_name, country_code) FROM stdin;
8	gfbgf	vfdvgd	\N	diemnguyen145@gmail.com	0934956360	827ccb0eea8a706c4c34a16891f84e7b	1	2022-01-13 05:30:08.457851+07	2022-01-20 00:58:41+07	1	hghhh	79	762	26797	Thành phố Hồ Chí Minh	Quận Thủ Đức	Phường Bình Chiểu	84
2	Nguyễntttt	Diễmtttt	2022-01-18	diemnguyen1459@gmail.com	1235689995	e10adc3949ba59abbe56e057f20f883e	1	2022-01-13 05:07:43.513113+07	2022-01-20 04:33:28+07	1	123adbu	77	747	26521	Tỉnh Bà Rịa  Vũng Tàu	Thành phố Vũng Tàu	Phường Thắng Nhì	84
\.


--
-- Data for Name: order_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.order_details (id, order_id, product_id, quantily, regist_date, update_date, status, price, discount, image, detail_product_id, detail_product_color) FROM stdin;
1	6	7	1	2022-01-17 02:25:59.722022+07	\N	1	250000	0	\N	\N	\N
2	6	3	4	2022-01-17 02:25:59.727917+07	\N	1	199000	0	\N	\N	\N
\.


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.orders (id, customer_id, order_name, order_email, order_phone, regist_date, update_date, status, confirm_admin_id, confirm_date, city_code, district_code, ward_code, address, " delivery_cost", discount, total, order_note, city_name, district_name, ward_name, payment_method, cancel_reason) FROM stdin;
6	2	gfbgf vfdvgd	diemnguyen1459@gmail.com	1235689995	2022-01-17 02:25:59.459764+07	\N	1	\N	\N	79	769	27106	hghhh	0	0	1046000	\N	Thành phố Hồ Chí Minh	Quận 2	Phường An Khánh	\N	\N
\.


--
-- Data for Name: product_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product_details (id, color, price, quantily, status, regist_date, update_date, product_id) FROM stdin;
17	hồng	200000	100	1	2022-01-16 17:18:04.95429+07	2022-01-20 06:47:39+07	58
20	Tím	250000	50	1	2022-01-20 06:47:39.76997+07	\N	58
1	đen	150000	50	1	2022-01-09 18:59:58.295712+07	2022-01-10 05:42:57+07	7
2	hồng	150000	50	1	2022-01-09 18:59:58.307462+07	2022-01-10 05:42:57+07	7
3	đen	150000	50	1	2022-01-11 04:16:53.558323+07	2022-01-12 06:12:19+07	8
4	đen	234342	11	1	2022-01-16 00:22:42.957164+07	\N	16
5	đen	150000	550	1	2022-01-16 11:35:54.789918+07	\N	64
6	hồng	150000	50	1	2022-01-16 11:35:54.8078+07	\N	64
7	xám	150000	50	1	2022-01-16 11:35:54.815524+07	\N	64
8	đen	156666	54	1	2022-01-16 14:04:39.195229+07	\N	66
9	hồng	100000	5555	1	2022-01-16 14:04:39.20711+07	\N	66
10	đen9999	150000	400	1	2022-01-16 14:06:39.630311+07	2022-01-20 06:54:10+07	67
11	hồng555	15555	600	1	2022-01-16 14:06:39.638302+07	2022-01-20 06:54:10+07	67
12	xám969	1500000	450	1	2022-01-16 16:01:49.416334+07	2022-01-20 06:54:10+07	67
13	đen	1500000	15	1	2022-01-16 16:55:40.546492+07	2022-01-16 16:56:12+07	60
14	hồng	150000	123	1	2022-01-16 16:56:12.728123+07	\N	60
15	hồng	150000	100	1	2022-01-16 17:16:39.21923+07	2022-01-16 17:17:11+07	59
16	hồng	150000	1222	1	2022-01-16 17:17:11.212817+07	\N	59
18	đen	150000	20	1	2022-01-16 17:22:31.834681+07	2022-01-16 17:23:12+07	57
19	hồng	150000	50	1	2022-01-16 17:22:31.842531+07	2022-01-16 17:23:12+07	57
\.


--
-- Data for Name: product_images; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product_images (id, product_id, status, regist_date, update_date, image, product_detail_id) FROM stdin;
1	3	1	2022-01-05 04:54:03.542816+07	\N	0e4a2361fef6565911e435fe3f57d7e7-sp1.jpg	\N
2	4	1	2022-01-05 04:58:16.216038+07	\N	d813ff15c98717cf58bce9f0d587beb9-sp2.jpg	\N
3	4	1	2022-01-05 04:58:16.221896+07	\N	96150453e68cfd107da402c3e540c114-sp3.jpg	\N
4	5	1	2022-01-05 05:00:35.029259+07	\N	70e5564d0e4ee5ea8e042dca070feb63-sp04.jpg	\N
5	5	1	2022-01-05 05:00:35.035145+07	\N	8dc76009f502ebc4d3b0ac5a671843bb-sp05.jpg	\N
6	2	1	2022-01-05 06:24:39.501491+07	\N	8dc76009f502ebc4d3b0ac5a671843bb-sp05.jpg	\N
7	7	1	2022-01-09 18:59:58.284679+07	\N	cd15c1c48bfb2c5cb0474e7822584670-t2.jpg	\N
9	7	1	2022-01-09 18:59:58.301185+07	\N	e7314bee62d15446c13ded60a49a5bc5-sp3.jpg	\N
10	7	1	2022-01-09 18:59:58.303245+07	\N	f193a8bcae0fe1eb6cc22e1c3e4c1d64-sp04.jpg	1
82	60	1	2022-01-16 16:50:17.834772+07	\N	25099c64-2212121.jpg	\N
13	7	1	2022-01-09 18:59:58.311431+07	\N	18fb6561e0a847d0faa25bc31161b967-t2.jpg	2
14	7	1	2022-01-09 22:27:20.579665+07	\N	129c1f6fae0f6bc63fc716a9e74ee8e9-sp05.jpg	\N
15	7	1	2022-01-09 22:27:20.586245+07	\N	7beb075baeb4b5ed96300c963ff2e897-sp2.jpg	1
16	8	1	2022-01-11 04:16:53.549299+07	\N	6ffc0de63d4a35e237d88bd3c17e0260-logo-sony.jpg	\N
17	8	1	2022-01-11 04:16:53.55296+07	\N	a2107d27a90dc0fa18536545ef17600a-samsung-logo.png	\N
18	8	1	2022-01-11 04:16:53.562414+07	\N	c0ca25068d529bb0b30a1b536bd42bd8-sp05.jpg	3
19	8	1	2022-01-11 04:16:53.563902+07	\N	88bfd38f445c5d617dc002cfe877df73-t2.jpg	3
20	9	1	2022-01-15 23:55:08.05609+07	\N	4979f98087638ad71f18da86c518e8af-sp05.jpg	\N
23	13	1	2022-01-16 00:06:26.889706+07	\N	dd1e6e6d-jkjkjk.jpg	\N
25	13	1	2022-01-16 00:18:48.758353+07	\N	418dce1c-tuuu(1).jpg	1
26	13	1	2022-01-16 00:19:19.46791+07	\N	f4ecc084-images1456.jpg	\N
27	23	1	2022-01-16 01:22:47.317123+07	\N	8f0d39b2-1642270967-2212121.jpg	\N
29	23	1	2022-01-16 01:25:50.209703+07	\N	8eaca235-1642271150-2212121.jpg	\N
31	23	1	2022-01-16 01:37:12.91794+07	\N	22f4d1ee-1642271832-2212121.jpg	\N
32	23	1	2022-01-16 01:37:12.921678+07	\N	d5c6924d-1642271832-images.jpg	\N
33	24	1	2022-01-16 01:37:39.36791+07	\N	2d3d3909-1642271859-images1234.jpg	\N
34	24	1	2022-01-16 01:37:39.373401+07	\N	ad252667-1642271859-images1456.jpg	\N
35	25	1	2022-01-16 01:40:32.421804+07	\N	3f1bc61a-1642272032-sp04.jpg	\N
36	25	1	2022-01-16 01:40:32.426455+07	\N	1fd384bf-1642272032-sp2111.jpg	\N
37	26	1	2022-01-16 01:42:40.950882+07	\N	ef449e56-1642272160-2212121.jpg	\N
38	27	1	2022-01-16 01:44:39.570606+07	\N	506e822f-1642272279-images.jpg	\N
39	28	1	2022-01-16 01:45:16.606268+07	\N	f774f7d9-1642272316-images1234.jpg	\N
40	28	1	2022-01-16 01:45:16.609857+07	\N	fba6c081-1642272316-images1456.jpg	\N
41	34	1	2022-01-16 01:54:46.923983+07	\N	724361c3-sp04.jpg	\N
42	34	1	2022-01-16 01:54:46.928824+07	\N	fa7a3ba8-sp2111.jpg	\N
43	48	1	2022-01-16 02:35:11.464777+07	\N	1c7aba23_2212121.jpg	\N
44	64	1	2022-01-16 11:35:54.766553+07	\N	522873d3-2212121.jpg	\N
45	64	1	2022-01-16 11:35:54.775757+07	\N	9b5b65f5-images.jpg	\N
46	64	1	2022-01-16 11:35:54.779843+07	\N	8a4bedfd-images894.jpg	\N
47	64	1	2022-01-16 11:35:54.797762+07	\N	6b666137-sp2111.jpg	5
48	64	1	2022-01-16 11:35:54.805169+07	\N	367b4ec3-sp3555.jpg	5
49	64	1	2022-01-16 11:35:54.809605+07	\N	7c26cc7e-t2221.jpg	6
50	64	1	2022-01-16 11:35:54.81115+07	\N	21218570-t2222.jpg	6
51	64	1	2022-01-16 11:35:54.817319+07	\N	0c535839-images1234.jpg	7
52	64	1	2022-01-16 11:35:54.818884+07	\N	520213a8-images1456.jpg	7
53	64	1	2022-01-16 11:35:54.820634+07	\N	10810eb1-jkjkjk.jpg	7
54	66	1	2022-01-16 14:04:39.184358+07	\N	65b81921-2212121.jpg	\N
55	66	1	2022-01-16 14:04:39.189774+07	\N	a21c482b-images.jpg	\N
56	66	1	2022-01-16 14:04:39.191677+07	\N	4f9aa1ed-images894.jpg	\N
57	66	1	2022-01-16 14:04:39.199656+07	\N	3ad78157-sp3555.jpg	8
58	66	1	2022-01-16 14:04:39.201251+07	\N	f2752cfe-t222 (1).jpg	8
59	66	1	2022-01-16 14:04:39.202928+07	\N	47668890-t222 (2).jpg	8
60	66	1	2022-01-16 14:04:39.20471+07	\N	56d9bff8-Xiaomi_logo.png	8
61	66	1	2022-01-16 14:04:39.208729+07	\N	b2f2efee-images1234.jpg	9
62	66	1	2022-01-16 14:04:39.210059+07	\N	6fa9ae71-images1456.jpg	9
63	66	1	2022-01-16 14:04:39.211231+07	\N	56b1371a-jkjkjk.jpg	9
64	66	1	2022-01-16 14:04:39.212341+07	\N	9110f6ac-logo-sony.jpg	9
78	67	1	2022-01-16 16:13:49.781715+07	\N	8e1d454f-images1456.jpg	1
79	67	1	2022-01-16 16:14:43.480487+07	\N	c3f95f3a-tuuu1.jpg	1
83	60	1	2022-01-16 16:50:17.837745+07	\N	8eb01315-images.jpg	\N
84	60	1	2022-01-16 16:50:17.839351+07	\N	e32d3441-images894.jpg	\N
86	60	1	2022-01-16 16:55:40.549812+07	\N	4aa2a46e-jkjkjk.jpg	13
87	60	1	2022-01-16 16:56:12.730268+07	\N	5b6883bb-t2221.jpg	14
88	59	1	2022-01-16 17:16:39.198967+07	\N	33efec48-2212121.jpg	\N
89	59	1	2022-01-16 17:16:39.20315+07	\N	ed74eb8c-images.jpg	\N
90	59	1	2022-01-16 17:16:39.213535+07	\N	884463d6-images894.jpg	\N
91	59	1	2022-01-16 17:16:39.224376+07	\N	7ce0fbc3-t2221.jpg	15
92	59	1	2022-01-16 17:16:39.226363+07	\N	2a7baa66-t2222.jpg	15
93	59	1	2022-01-16 17:17:11.218202+07	\N	4a1b09f6-t2221.jpg	16
94	59	1	2022-01-16 17:17:11.220859+07	\N	0b846f65-t2222.jpg	16
99	57	1	2022-01-16 17:22:31.827307+07	\N	52fbb122-t2221.jpg	\N
100	57	1	2022-01-16 17:22:31.830091+07	\N	46ab8150-t2222.jpg	\N
101	57	1	2022-01-16 17:22:31.838253+07	\N	06ecc269-sp04.jpg	18
102	57	1	2022-01-16 17:22:31.84011+07	\N	1163ad77-sp2111.jpg	18
103	57	1	2022-01-16 17:22:31.844155+07	\N	504182cc-t2221.jpg	19
106	67	1	2022-01-18 22:27:11.604463+07	\N	e8f337fe-images894.jpg	\N
107	67	1	2022-01-18 22:27:11.605932+07	\N	6e1fc53e-images1234.jpg	\N
108	67	1	2022-01-18 22:27:11.606828+07	\N	3dbc973e-jkjkjk.jpg	10
109	67	1	2022-01-18 22:27:11.607767+07	\N	052ecfc8-images1456.jpg	11
110	67	1	2022-01-18 22:27:11.608655+07	\N	0bc295cb-images894.jpg	12
111	58	1	2022-01-20 06:47:39.75669+07	\N	d437deac-images.jpg	\N
112	58	1	2022-01-20 06:47:39.760147+07	\N	5014ff46-images894.jpg	\N
113	58	1	2022-01-20 06:47:39.762358+07	\N	c20bacf5-2212121.jpg	17
114	58	1	2022-01-20 06:47:39.774284+07	\N	e405d49d-images894.jpg	20
115	67	1	2022-01-20 06:53:44.010846+07	\N	5a286d30-images.jpg	\N
\.


--
-- Data for Name: product_type_warranties; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product_type_warranties (id, name_warranty, description_warranty, regist_date, update_date, status) FROM stdin;
\.


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products (id, product_code, name, brand_id, category_id, price, description, regist_date, update_date, status, quantily, admin_id, warranty_id, charging_port, size, weight, jack, length, control, compatible) FROM stdin;
3	MDR-EX15AP 	Tai nghe dây nhét tai Sony Extra Bass MDR-EX15AP	1	1	199000	aaaaaaaa	2022-01-05 04:54:03.484992+07	\N	1	1000	1	\N	\N	\N	\N	\N	\N	\N	\N
4	WH-1000XM4	TAI NGHE SONY WH-1000XM4 WIRELESS NOISE-CANCELLING - BLACK	1	2	5439000	TAI NGHE SONY WH-1000XM4 WIRELESS NOISE-CANCELLING - BLACK	2022-01-05 04:58:16.178939+07	\N	1	10	1	\N	\N	\N	\N	\N	\N	\N	\N
25		qas	3	1	123	AS	2022-01-16 01:40:32.400069+07	\N	1	121	1	\N	12					sa	sqasw
26		ghh	3	1	4115	4\r\n	2022-01-16 01:42:40.916482+07	\N	1	55	1	\N						5	45
27		zzzzz	3	1	666	56	2022-01-16 01:44:39.533452+07	\N	1	555	1	\N						2	65
28		sp01	3	1	15000	hjhjjh	2022-01-16 01:45:16.567118+07	\N	1	2000	1	\N						66	hvghg
29		sp01	3	1	150	b	2022-01-16 01:48:32.964929+07	\N	1	150	1	\N						h	bj
30		hhh	3	1	15000	bjjj	2022-01-16 01:50:31.229129+07	\N	1	150	1	\N						abc	vghgfg
31		kkk	3	1	15000	bjjj	2022-01-16 01:53:03.521645+07	\N	1	150	1	\N						abc	vghgfg
7	SP01sd	sp01dd	2	2	250000	mô tả mô tả abc	2022-01-09 18:59:58.247675+07	2022-01-10 05:42:57+07	1	1503	1	\N	usb 3.0	15x20cm	200g	jack 3.5	160cm	điều khiển bằng tay	15x20cm
32		kkk	3	1	15000	bjjj	2022-01-16 01:53:11.432151+07	\N	1	150	1	\N						abc	vghgfg
2	MDR-EX15AP 	Tai nghe dây nhét tai Sony Extra Bass MDR-EX15AP	1	1	199000	mô tả	2022-01-05 04:52:44.520906+07	2022-01-10 06:25:34+07	1	100	1	\N	\N	\N	\N	\N	\N	\N	\N
8	MDR-EX15AP 	sp01	4	1	155454	hgggh	2022-01-11 04:16:53.496703+07	2022-01-12 06:12:19+07	1	5656556	1	\N						555	6555
33		55	3	1	15000	bjjj	2022-01-16 01:53:41.8013+07	\N	1	150	1	\N						abc	vghgfg
34		555	3	1	15000	bjjj	2022-01-16 01:54:46.889189+07	\N	1	150	1	\N						abc	vghgfg
5	SP01	Tai nghe Xiaomi Mi Earphone Basicggggggggg	2	2	20000	Tai nghe Xiaomi Mi Earphone Basichgggg	2022-01-05 05:00:34.979801+07	2022-01-12 06:18:07+07	1	105	1	\N						điều khiển bằng tay	ytytytttyt
35		6666	3	1	15000	bjjj	2022-01-16 01:57:14.978658+07	\N	1	150	1	\N						abc	vghgfg
36		'	3	1	15000	bjjj	2022-01-16 01:58:19.06422+07	\N	1	150	1	\N						abc	vghgfg
37		223232	3	1	15000	bjjj	2022-01-16 01:58:33.595736+07	\N	1	150	1	\N						abc	vghgfg
38		kkkk	3	1	15000	bjjj	2022-01-16 02:00:08.09873+07	\N	1	150	1	\N						abc	vghgfg
9	222	sp01	3	1	150000	asa	2022-01-15 23:52:22.392503+07	2022-01-15 23:55:08+07	1	150	1	\N						sas	jjjj
10	222	sp01dd	3	1	150000	asxaX	2022-01-15 23:57:09.821648+07	2022-01-15 23:57:27+07	1	150	1	\N						aSA	aSA
11	aaasasas	sp01ddsdsa	3	1	299000	Zsxszx	2022-01-16 00:00:12.197167+07	\N	1	150	1	\N						cxzcsxz	z
12		2w2ww2	3	1	50000	2w2w	2022-01-16 00:03:01.163482+07	\N	1	50	1	\N						2w2w	2w2w2w
39		kkkk	3	1	15000	bjjj	2022-01-16 02:00:53.52111+07	\N	1	150	1	\N						abc	vghgfg
40		sp01	3	1	15000	bjjj	2022-01-16 02:01:08.65465+07	\N	1	150	1	\N						abc	vghgfg
41		sp01	3	1	15000	bjjj	2022-01-16 02:01:18.225647+07	\N	1	150	1	\N						abc	vghgfg
42		sp01	3	1	15000	bjjj	2022-01-16 02:02:39.656681+07	\N	1	150	1	\N						abc	vghgfg
43		zzzzz	3	1	15000	bjjj	2022-01-16 02:02:51.5122+07	2022-01-16 02:03:21+07	1	150	1	\N						abc	vghgfg
44		jij	21	1	15000	bjjj	2022-01-16 02:09:21.673527+07	\N	1	150	1	\N						abc	vghgfg
13		2w2ww2	3	1	50000	2w2w	2022-01-16 00:03:34.546406+07	2022-01-16 00:19:19+07	1	50	1	\N						2w2w	2w2w2w
14		sp0145645654456	3	1	1500000	saDAW	2022-01-16 00:21:08.34235+07	\N	1	12333	1	\N						asa	wdsa
15	SP01	sp01	3	1	233232	DASDCS	2022-01-16 00:22:00.196048+07	\N	1	33434	1	\N						REFSZDR	DSFRD
16	222	sp01DFBGF	3	1	54445	ASDXSHVJ	2022-01-16 00:22:42.905635+07	\N	1	445	1	\N						SASDAWHSV	NAWVSDHGAW
17		sp01	3	1	123	qqq	2022-01-16 00:57:09.753241+07	\N	1	123	1	\N						qqq	qwe
18		sp01	3	1	150000	reftgtre	2022-01-16 01:06:27.62614+07	\N	1	1500	1	\N						reftre	ggfte
19		sp011245	3	1	250000	yugyuyuuy	2022-01-16 01:11:27.09474+07	\N	1	200	1	\N						bằng tay	anjswgwh
20		sp01ytrhtrdh	3	1	15000	tregrt	2022-01-16 01:16:27.256806+07	\N	1	50	1	\N						trgert	gttre
21		sp01dd	3	1	150000	ASXA	2022-01-16 01:20:34.427722+07	\N	1	50	1	\N						XAS	SDSW
22		wds	3	1	45	asx	2022-01-16 01:21:51.854057+07	\N	1	4545	1	\N						asx	ax
45		jij	21	1	15000	bjjj	2022-01-16 02:10:09.029598+07	\N	1	150	1	\N						abc	vghgfg
46		hhh	21	1	15000	bjjj	2022-01-16 02:10:27.466273+07	\N	1	150	1	\N						abc	vghgfg
47		zzzzz	21	1	15000	bjjj	2022-01-16 02:13:13.710371+07	\N	1	150	1	\N						abc	vghgfg
23	222	sp01	3	1	1500	dd	2022-01-16 01:22:47.291952+07	2022-01-16 01:37:12+07	1	50	1	\N						ssds	ds
24		sp01	3	1	1500	gggg	2022-01-16 01:37:39.3344+07	\N	1	100	1	\N						hhh	jkj
48		sp01	21	1	15000	bjjj	2022-01-16 02:34:51.091969+07	2022-01-16 02:35:11+07	1	150	1	\N						abc	vghgfg
49		zzzzz	21	1	15000	bjjj	2022-01-16 02:37:37.747823+07	\N	1	150	1	\N						abc	vghgfg
50		sp01dd	21	1	15000	bjjj	2022-01-16 02:39:38.020227+07	\N	1	150	1	\N						abc	vghgfg
51		sp01dd	21	1	15000	bjjj	2022-01-16 02:41:47.570926+07	\N	1	150	1	\N						abc	vghgfg
52		sp01	21	1	15000	bjjj	2022-01-16 10:02:09.89872+07	\N	1	150	1	\N						abc	vghgfg
53		sp01	21	1	15000	bjjj	2022-01-16 10:04:23.611888+07	\N	1	150	1	\N						abc	vghgfg
54		zzzzz	21	1	15000	bjjj	2022-01-16 10:11:43.673025+07	\N	1	150	1	\N						abc	vghgfg
55		sp01	21	1	15000	bjjj	2022-01-16 10:13:50.721892+07	\N	1	150	1	\N						abc	vghgfg
56		sp01	21	1	15000	bjjj	2022-01-16 10:17:12.320953+07	\N	1	150	1	\N						abc	vghgfg
60		zzzzz	21	1	15000	bjjj	2022-01-16 10:26:16.015726+07	2022-01-16 16:56:12+07	1	150	1	\N						abc	vghgfg
61		hhh	21	1	15000	bjjj	2022-01-16 10:27:56.573212+07	\N	1	150	1	\N						abc	vghgfg
62		sp01dd	21	1	15000	bjjj	2022-01-16 10:28:18.035878+07	\N	1	150	1	\N						abc	vghgfg
63		zzzzz	21	1	15000	bjjj	2022-01-16 10:29:13.744861+07	\N	1	150	1	\N						abc	vghgfg
64		sp01	21	1	15000	bjjj	2022-01-16 11:35:54.711866+07	\N	1	150	1	\N						abc	vghgfg
65		sp01	21	1	15000	bjjj	2022-01-16 13:43:31.826128+07	\N	1	150	1	\N						abc	vghgfg
66		sp01	21	1	15000	bjjj	2022-01-16 14:04:39.148011+07	\N	1	150	1	\N						abc	vghgfg
58		Tai nghe chụp đầu SONY	4	5	250000	Tai nghe chụp đầu	2022-01-16 10:18:31.644897+07	2022-01-20 06:47:39+07	1	150	1	\N						Bằng tay	android\r\nios
59		sp01555	21	1	15000	bjjj	2022-01-16 10:25:43.579115+07	2022-01-16 17:17:11+07	1	150	1	\N						abc	vghgfg
67		sp01dd56	21	1	15000	bjjj	2022-01-16 14:06:39.586879+07	2022-01-20 06:54:10+07	1	150	1	\N						abc	vghgfg
57		f56656565	21	1	15000	bjjj	2022-01-16 10:17:53.66765+07	2022-01-16 17:23:12+07	1	150	1	\N						abc	vghgfg
\.


--
-- Name: admins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.admins_id_seq', 1, true);


--
-- Name: brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.brands_id_seq', 24, true);


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categories_id_seq', 5, true);


--
-- Name: customers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.customers_id_seq', 11, true);


--
-- Name: order_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.order_details_id_seq', 5, true);


--
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.orders_id_seq', 8, true);


--
-- Name: product_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_details_id_seq', 20, true);


--
-- Name: product_images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_images_id_seq', 117, true);


--
-- Name: product_type_warranties_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_type_warranties_id_seq', 1, false);


--
-- Name: products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_id_seq', 67, true);


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
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


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
-- Name: product_details product_details_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_details
    ADD CONSTRAINT product_details_pkey PRIMARY KEY (id);


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
-- Name: order_details order_details_detail_product_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_details
    ADD CONSTRAINT order_details_detail_product_id_fkey FOREIGN KEY (detail_product_id) REFERENCES public.product_details(id) NOT VALID;


--
-- Name: order_details order_details_order_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_details
    ADD CONSTRAINT order_details_order_id_fkey FOREIGN KEY (order_id) REFERENCES public.orders(id) NOT VALID;


--
-- Name: order_details order_details_product_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_details
    ADD CONSTRAINT order_details_product_id_fkey FOREIGN KEY (product_id) REFERENCES public.products(id) NOT VALID;


--
-- Name: orders orders_confirm_admin_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_confirm_admin_id_fkey FOREIGN KEY (confirm_admin_id) REFERENCES public.admins(id) NOT VALID;


--
-- Name: orders orders_customer_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_customer_id_fkey FOREIGN KEY (customer_id) REFERENCES public.customers(id) NOT VALID;


--
-- Name: product_details product_details_product_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_details
    ADD CONSTRAINT product_details_product_id_fkey FOREIGN KEY (product_id) REFERENCES public.products(id) NOT VALID;


--
-- Name: product_images product_images_product_detail_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_images
    ADD CONSTRAINT product_images_product_detail_id_fkey FOREIGN KEY (product_detail_id) REFERENCES public.product_details(id) NOT VALID;


--
-- Name: product_images product_images_product_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_images
    ADD CONSTRAINT product_images_product_id_fkey FOREIGN KEY (product_id) REFERENCES public.products(id) NOT VALID;


--
-- Name: products products_admin_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_admin_id_fkey FOREIGN KEY (admin_id) REFERENCES public.admins(id) NOT VALID;


--
-- Name: products products_brand_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_brand_id_fkey FOREIGN KEY (brand_id) REFERENCES public.brands(id) NOT VALID;


--
-- Name: products products_category_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_category_id_fkey FOREIGN KEY (category_id) REFERENCES public.categories(id) NOT VALID;


--
-- Name: products products_warranty_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_warranty_id_fkey FOREIGN KEY (warranty_id) REFERENCES public.product_type_warranties(id) NOT VALID;


--
-- PostgreSQL database dump complete
--

