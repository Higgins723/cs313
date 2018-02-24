--
-- PostgreSQL database dump
--

-- Dumped from database version 10.2 (Ubuntu 10.2-1.pgdg14.04+1)
-- Dumped by pg_dump version 10.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: shopping_list; Type: TABLE; Schema: public; Owner: fiaajpoaucvhfo
--

CREATE TABLE shopping_list (
    id integer NOT NULL,
    item character varying(255) NOT NULL,
    complete boolean DEFAULT false NOT NULL
);


ALTER TABLE shopping_list OWNER TO fiaajpoaucvhfo;

--
-- Name: shopping_list_id_seq; Type: SEQUENCE; Schema: public; Owner: fiaajpoaucvhfo
--

CREATE SEQUENCE shopping_list_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE shopping_list_id_seq OWNER TO fiaajpoaucvhfo;

--
-- Name: shopping_list_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fiaajpoaucvhfo
--

ALTER SEQUENCE shopping_list_id_seq OWNED BY shopping_list.id;


--
-- Name: shoppinglist_users; Type: TABLE; Schema: public; Owner: fiaajpoaucvhfo
--

CREATE TABLE shoppinglist_users (
    id integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE shoppinglist_users OWNER TO fiaajpoaucvhfo;

--
-- Name: shoppinglist_users_id_seq; Type: SEQUENCE; Schema: public; Owner: fiaajpoaucvhfo
--

CREATE SEQUENCE shoppinglist_users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE shoppinglist_users_id_seq OWNER TO fiaajpoaucvhfo;

--
-- Name: shoppinglist_users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fiaajpoaucvhfo
--

ALTER SEQUENCE shoppinglist_users_id_seq OWNED BY shoppinglist_users.id;


--
-- Name: shopping_list id; Type: DEFAULT; Schema: public; Owner: fiaajpoaucvhfo
--

ALTER TABLE ONLY shopping_list ALTER COLUMN id SET DEFAULT nextval('shopping_list_id_seq'::regclass);


--
-- Name: shoppinglist_users id; Type: DEFAULT; Schema: public; Owner: fiaajpoaucvhfo
--

ALTER TABLE ONLY shoppinglist_users ALTER COLUMN id SET DEFAULT nextval('shoppinglist_users_id_seq'::regclass);


--
-- Data for Name: shopping_list; Type: TABLE DATA; Schema: public; Owner: fiaajpoaucvhfo
--

COPY shopping_list (id, item, complete) FROM stdin;
2	bread	f
1	meat	f
1	bread	f
6	oranges	f
6	ice cream	t
6	butter	t
1	oranges	t
2	grapes	f
2	frozen chicken	t
5	Candy	f
5	Cotton candy	f
5	oranges	f
5	Syrup	t
2	oranges	f
1	Cereal	f
1	candy	t
6	Candy corns	f
6	lemons	t
\.


--
-- Data for Name: shoppinglist_users; Type: TABLE DATA; Schema: public; Owner: fiaajpoaucvhfo
--

COPY shoppinglist_users (id, username, password) FROM stdin;
1	admin	password
2	testingUser	password1
5	higgins	test
6	ayla	test
9	drake	drake
10	david	test
\.


--
-- Name: shopping_list_id_seq; Type: SEQUENCE SET; Schema: public; Owner: fiaajpoaucvhfo
--

SELECT pg_catalog.setval('shopping_list_id_seq', 1, true);


--
-- Name: shoppinglist_users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: fiaajpoaucvhfo
--

SELECT pg_catalog.setval('shoppinglist_users_id_seq', 10, true);


--
-- Name: shoppinglist_users shoppinglist_users_pkey; Type: CONSTRAINT; Schema: public; Owner: fiaajpoaucvhfo
--

ALTER TABLE ONLY shoppinglist_users
    ADD CONSTRAINT shoppinglist_users_pkey PRIMARY KEY (id);


--
-- Name: shoppinglist_users shoppinglist_users_username_key; Type: CONSTRAINT; Schema: public; Owner: fiaajpoaucvhfo
--

ALTER TABLE ONLY shoppinglist_users
    ADD CONSTRAINT shoppinglist_users_username_key UNIQUE (username);


--
-- Name: shopping_list shopping_list_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fiaajpoaucvhfo
--

ALTER TABLE ONLY shopping_list
    ADD CONSTRAINT shopping_list_id_fkey FOREIGN KEY (id) REFERENCES shoppinglist_users(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: fiaajpoaucvhfo
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO fiaajpoaucvhfo;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO fiaajpoaucvhfo;


--
-- PostgreSQL database dump complete
--

