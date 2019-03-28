--
-- PostgreSQL database dump
--

-- Dumped from database version 10.6 (Ubuntu 10.6-0ubuntu0.18.04.1)
-- Dumped by pg_dump version 10.6 (Ubuntu 10.6-0ubuntu0.18.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: users; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.users (
    id integer DEFAULT nextval('public.users_id_seq'::regclass) NOT NULL,
    full_name character varying(100),
    email character varying(60),
    document character varying(50),
    newsletter boolean DEFAULT true,
    address character varying(100),
    zip_code integer,
    area character varying(50),
    city character varying(50),
    country character varying(50),
    comments text,
    catchment_type character varying(60)
);


ALTER TABLE public.users OWNER TO admin;

--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO public.users VALUES (23, 'Cristo', 'cristoaranadeudero@gmail.com', '75884769H', false, 'calle saxofón nº 2, 3º 1', 29014, 'Cádiz', 'Algeciras', 'España', 'Desarrollo web', 'Presencial');
INSERT INTO public.users VALUES (25, 'Juan López', 'juan@gmail.com', '76895544D', true, 'Nicolas Maroto', 18903, 'Granada', 'Guadix', 'Espña', '', 'Web');
INSERT INTO public.users VALUES (26, 'Miguel Salas', 'miguel.s@mail.com', '46738823C', true, 'Joanquín Quiles', 29054, 'Málaga', 'Málaga', 'España', 'nada', 'Presencial');
INSERT INTO public.users VALUES (34, 'Cristo test', 'cristo.arana@netelip.cloud', '7645242', NULL, 'adfadf', 29014, 'asdfasdf', 'Málaga', 'España', 'asdfasf', 'Web');
INSERT INTO public.users VALUES (35, 'Antonio ', 'antonio@mail.cloud', '764524234F', true, 'adfadf', 29014, '', 'Málaga', 'España', '', 'Presencial');
INSERT INTO public.users VALUES (37, 'Julian Muñoz SL', 'cds@mail.com', 'J45543234', true, 'calle saxofón nº 2, 3º 1', 29014, 'Málaga', 'Málaga', 'España', 'Empresa de chorizos', 'Web');
INSERT INTO public.users VALUES (41, 'Jacinto Venabente', 'jacinto@mail.com', '83223344G', false, 'calle saxofón nº 2, 3º 1', 87654, 'Jaen', 'Úbeda', 'España', 'Que calor en Úbeda coño', 'Web');


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

