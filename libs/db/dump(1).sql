--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: scg_db; Type: COMMENT; Schema: -; Owner: desarrollo
--

COMMENT ON DATABASE scg_db IS 'Base de Datos Sistema Control Gerencial';


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
-- Name: scg_bancos; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_bancos (
    id_bank integer NOT NULL,
    name_bank character varying NOT NULL,
    telefono character varying NOT NULL,
    contacto character varying,
    telefono_contacto character varying
);


ALTER TABLE public.scg_bancos OWNER TO desarrollo;

--
-- Name: TABLE scg_bancos; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_bancos IS 'Bancos de Sistemas';


--
-- Name: scg_bancos_id_bank_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_bancos_id_bank_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_bancos_id_bank_seq OWNER TO desarrollo;

--
-- Name: scg_bancos_id_bank_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_bancos_id_bank_seq OWNED BY scg_bancos.id_bank;


--
-- Name: scg_empresas; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_empresas (
    id_empresas integer NOT NULL,
    nombre character varying(30) NOT NULL,
    rif character varying(20) NOT NULL,
    telefono character varying(50),
    direccion text,
    email character varying(30),
    contacto character varying(30) NOT NULL,
    telefono_contacto character varying(50) NOT NULL,
    id_ramo integer DEFAULT 1,
    id_zona integer DEFAULT 1
);


ALTER TABLE public.scg_empresas OWNER TO desarrollo;

--
-- Name: TABLE scg_empresas; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_empresas IS 'tabla grupo de empresas';


--
-- Name: scg_empresas_id_empresas_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_empresas_id_empresas_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_empresas_id_empresas_seq OWNER TO desarrollo;

--
-- Name: scg_empresas_id_empresas_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_empresas_id_empresas_seq OWNED BY scg_empresas.id_empresas;


--
-- Name: scg_inf_ban_emp; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_inf_ban_emp (
    id_empresa integer NOT NULL,
    id_banco integer NOT NULL,
    nro_cuenta character varying(20) NOT NULL
);


ALTER TABLE public.scg_inf_ban_emp OWNER TO desarrollo;

--
-- Name: TABLE scg_inf_ban_emp; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_inf_ban_emp IS 'Informacion Bancaria de Empresas';


--
-- Name: scg_permisos; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_permisos (
    id_permiso integer NOT NULL,
    permiso character varying(100) NOT NULL,
    key character varying(50) NOT NULL
);


ALTER TABLE public.scg_permisos OWNER TO desarrollo;

--
-- Name: TABLE scg_permisos; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_permisos IS 'tabla permisos sistemas';


--
-- Name: scg_permisos_id_permiso_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_permisos_id_permiso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_permisos_id_permiso_seq OWNER TO desarrollo;

--
-- Name: scg_permisos_id_permiso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_permisos_id_permiso_seq OWNED BY scg_permisos.id_permiso;


--
-- Name: scg_permisos_role; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_permisos_role (
    id_rol integer NOT NULL,
    id_permiso integer NOT NULL,
    valor smallint
);


ALTER TABLE public.scg_permisos_role OWNER TO desarrollo;

--
-- Name: TABLE scg_permisos_role; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_permisos_role IS 'Tabla relacion permisos roles';


--
-- Name: scg_permisos_usuario; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_permisos_usuario (
    id_usuario integer NOT NULL,
    id_permiso integer NOT NULL,
    valor smallint NOT NULL
);


ALTER TABLE public.scg_permisos_usuario OWNER TO desarrollo;

--
-- Name: TABLE scg_permisos_usuario; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_permisos_usuario IS 'Permisos y usuarios';


--
-- Name: scg_permisos_usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_permisos_usuario_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_permisos_usuario_id_usuario_seq OWNER TO desarrollo;

--
-- Name: scg_permisos_usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_permisos_usuario_id_usuario_seq OWNED BY scg_permisos_usuario.id_usuario;


--
-- Name: scg_rol; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_rol (
    id_rol integer NOT NULL,
    nombre character varying(30) NOT NULL
);


ALTER TABLE public.scg_rol OWNER TO desarrollo;

--
-- Name: TABLE scg_rol; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_rol IS 'roles seguridad sistema';


--
-- Name: scg_rol_id_rol_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_rol_id_rol_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_rol_id_rol_seq OWNER TO desarrollo;

--
-- Name: scg_rol_id_rol_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_rol_id_rol_seq OWNED BY scg_rol.id_rol;


--
-- Name: scg_usuarios; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_usuarios (
    id_usuario integer NOT NULL,
    nombres character varying(50) NOT NULL,
    cedula character varying(20) NOT NULL,
    telefono character varying(50),
    direccion text,
    email character varying(50),
    userlogin character varying(25) NOT NULL,
    password character varying DEFAULT 12345678 NOT NULL,
    id_rol integer NOT NULL,
    id_empresa integer NOT NULL,
    fecha_ingreso date DEFAULT now() NOT NULL,
    status integer DEFAULT 0
);


ALTER TABLE public.scg_usuarios OWNER TO desarrollo;

--
-- Name: TABLE scg_usuarios; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_usuarios IS 'usuarios scg';


--
-- Name: scg_usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_usuarios_id_seq OWNER TO desarrollo;

--
-- Name: scg_usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_usuarios_id_seq OWNED BY scg_usuarios.id_usuario;


--
-- Name: scg_view_bank_cuent; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_bank_cuent AS
 SELECT b.name_bank,
    c.id_empresa,
    c.id_banco,
    c.nro_cuenta
   FROM scg_inf_ban_emp c,
    scg_bancos b
  WHERE (c.id_banco = b.id_bank);


ALTER TABLE public.scg_view_bank_cuent OWNER TO desarrollo;

--
-- Name: VIEW scg_view_bank_cuent; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_bank_cuent IS 'Cuentas con Nombres de Bancos';


--
-- Name: scg_view_userrolemplogpass; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_userrolemplogpass AS
 SELECT u.id_usuario,
    u.nombres,
    u.cedula,
    u.telefono,
    u.direccion,
    u.email,
    u.userlogin,
    u.password,
    u.id_rol,
    u.id_empresa,
    r.nombre AS rol_name,
    e.nombre AS emp_name
   FROM scg_usuarios u,
    scg_rol r,
    scg_empresas e
  WHERE ((u.id_rol = r.id_rol) AND (u.id_empresa = e.id_empresas));


ALTER TABLE public.scg_view_userrolemplogpass OWNER TO desarrollo;

--
-- Name: VIEW scg_view_userrolemplogpass; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_userrolemplogpass IS 'Vista completa de usuaios, nombre de rol y nombre de empresas para loguear usuarios';


--
-- Name: id_bank; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_bancos ALTER COLUMN id_bank SET DEFAULT nextval('scg_bancos_id_bank_seq'::regclass);


--
-- Name: id_empresas; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_empresas ALTER COLUMN id_empresas SET DEFAULT nextval('scg_empresas_id_empresas_seq'::regclass);


--
-- Name: id_permiso; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_permisos ALTER COLUMN id_permiso SET DEFAULT nextval('scg_permisos_id_permiso_seq'::regclass);


--
-- Name: id_rol; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_rol ALTER COLUMN id_rol SET DEFAULT nextval('scg_rol_id_rol_seq'::regclass);


--
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('scg_usuarios_id_seq'::regclass);


--
-- Data for Name: scg_bancos; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_bancos VALUES (2, 'BANCARIBE', '0212-2618557', 'MARIA ESTHER GOMEZ', '0414-7785696');
INSERT INTO scg_bancos VALUES (3, 'BANCO MERCANTIL', '0212-6002424 0212-5032522', 'JUANITA', '0426-8956578');
INSERT INTO scg_bancos VALUES (4, 'BANCO PROVINCIAL', '500-5087432', '', '');
INSERT INTO scg_bancos VALUES (5, 'BANESCO BANCO UNIVERSAL', '0212-5011111', 'MIGUEL ANGEL MARCANO', '0414-8589674');
INSERT INTO scg_bancos VALUES (6, 'BANK OF THE WEST', '1-800-488-2265', 'CONSULTORES', '1-213-972-0388');
INSERT INTO scg_bancos VALUES (7, 'BARCLAYS', '44-24-7684-2100', 'ATENCION AL CLIENTE', '44-24-7684-2100');
INSERT INTO scg_bancos VALUES (1, 'BANCO DE VENEZUELA', '0212-7629916 0212-4092668', 'CLEOPATRA HERNANDEZ', '0412-1195265');


--
-- Name: scg_bancos_id_bank_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_bancos_id_bank_seq', 7, true);


--
-- Data for Name: scg_empresas; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_empresas VALUES (3, 'MULTISERVICIOS ROS-CAR, C.A.', 'J-29829905-3', '04148684497', 'AV. LIBERTADOR, LOCAL S/N, URB. DOÑA BARBARA, SAN FELIX, EDO. BOLIVAR', '', 'LEONEL CARVAJAL', '04148684497', 1, 1);
INSERT INTO scg_empresas VALUES (4, 'SOHEMAR, C.A.', 'J-9089786-5', '0286-317.70.75', 'Guayana, Puerto Ordaz, Estado Bolivar, Venezuela', 'sohemar.ca@gmail.com', 'TWITTER', '', 1, 1);
INSERT INTO scg_empresas VALUES (5, 'SISTEMAS MJA MARTINEZ FP', 'F16650133-P', '0285-6322815', 'BARRIO JOSE ANTONIO PAEZ', 'julioapo@hotmail.com', 'MARIANNY MARTINEZ', '04148685742', 1, 1);
INSERT INTO scg_empresas VALUES (1, 'Top 5 Corporation', 'J-78098800-9', '0285-6322815', 'SECTOR FUENTE LUMINOSA EST DE SERVICIO LOCAL 5', 'top5corporation@gmail.com', 'Jhon Trout G', '0414-8685742', 1, 1);
INSERT INTO scg_empresas VALUES (6, 'CONSTRUCTORA 3G, C.A.', 'J-4567893-7', '0212-789653', 'AV. VENEZUELA C/C SAN BASILIA
ESQUINA LOS LOROS EDIF. AMAZONAS
MEZZANINA 3 LOCAL CONSTRUCTORA 3G', 'constructorag3@gmail.com', 'ASDRUBAL PEREZ', '0414-7863721', 1, 1);


--
-- Name: scg_empresas_id_empresas_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_empresas_id_empresas_seq', 13, true);


--
-- Data for Name: scg_inf_ban_emp; Type: TABLE DATA; Schema: public; Owner: desarrollo
--



--
-- Data for Name: scg_permisos; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_permisos VALUES (2, 'Tareas de administracion', 'admin_access');
INSERT INTO scg_permisos VALUES (4, 'Editar Empresa', 'editar_empresa');
INSERT INTO scg_permisos VALUES (5, 'Eliminar Empresa', 'eliminar_empresa');
INSERT INTO scg_permisos VALUES (3, 'Agregar Empresas', 'nueva_empresa');
INSERT INTO scg_permisos VALUES (6, 'Ver Empresas', 'empresas');
INSERT INTO scg_permisos VALUES (7, 'Ver Clientes', 'clientes');
INSERT INTO scg_permisos VALUES (8, 'Administrar Permisos de Rol', 'admin_perm_rol');
INSERT INTO scg_permisos VALUES (9, 'Administrar Permisos Usuario', 'admin_perm_user');
INSERT INTO scg_permisos VALUES (10, 'Agregar Permisos', 'agregar_permisos');
INSERT INTO scg_permisos VALUES (11, 'Ver Bancos', 'ver_bancos');
INSERT INTO scg_permisos VALUES (12, 'Agregar Bancos', 'nuevo_banco');
INSERT INTO scg_permisos VALUES (13, 'Editar Permisos', 'editar_permisos');
INSERT INTO scg_permisos VALUES (14, 'Eliminar Permisos', 'eliminar_permisos');
INSERT INTO scg_permisos VALUES (15, 'Editar Bancos', 'editar_banco');
INSERT INTO scg_permisos VALUES (16, 'Eliminar Bancos', 'eliminar_banco');
INSERT INTO scg_permisos VALUES (17, 'Informacion Bancaria Empresas', 'empresa_cuentas');


--
-- Name: scg_permisos_id_permiso_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_permisos_id_permiso_seq', 17, true);


--
-- Data for Name: scg_permisos_role; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_permisos_role VALUES (1, 14, 1);
INSERT INTO scg_permisos_role VALUES (1, 17, 1);
INSERT INTO scg_permisos_role VALUES (1, 2, 1);
INSERT INTO scg_permisos_role VALUES (1, 11, 1);
INSERT INTO scg_permisos_role VALUES (1, 7, 1);
INSERT INTO scg_permisos_role VALUES (1, 6, 1);
INSERT INTO scg_permisos_role VALUES (3, 3, 1);
INSERT INTO scg_permisos_role VALUES (3, 6, 1);
INSERT INTO scg_permisos_role VALUES (2, 8, 0);
INSERT INTO scg_permisos_role VALUES (2, 9, 0);
INSERT INTO scg_permisos_role VALUES (2, 3, 1);
INSERT INTO scg_permisos_role VALUES (2, 10, 0);
INSERT INTO scg_permisos_role VALUES (2, 4, 1);
INSERT INTO scg_permisos_role VALUES (2, 5, 0);
INSERT INTO scg_permisos_role VALUES (2, 2, 1);
INSERT INTO scg_permisos_role VALUES (2, 7, 1);
INSERT INTO scg_permisos_role VALUES (2, 6, 1);
INSERT INTO scg_permisos_role VALUES (1, 8, 1);
INSERT INTO scg_permisos_role VALUES (1, 9, 1);
INSERT INTO scg_permisos_role VALUES (1, 12, 1);
INSERT INTO scg_permisos_role VALUES (1, 3, 1);
INSERT INTO scg_permisos_role VALUES (1, 10, 1);
INSERT INTO scg_permisos_role VALUES (1, 15, 1);
INSERT INTO scg_permisos_role VALUES (1, 4, 1);
INSERT INTO scg_permisos_role VALUES (1, 13, 1);
INSERT INTO scg_permisos_role VALUES (1, 16, 1);
INSERT INTO scg_permisos_role VALUES (1, 5, 1);
INSERT INTO scg_permisos_role VALUES (1, 0, 1);


--
-- Data for Name: scg_permisos_usuario; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_permisos_usuario VALUES (3, 8, 0);
INSERT INTO scg_permisos_usuario VALUES (3, 9, 0);
INSERT INTO scg_permisos_usuario VALUES (3, 10, 0);
INSERT INTO scg_permisos_usuario VALUES (3, 13, 0);
INSERT INTO scg_permisos_usuario VALUES (3, 14, 0);


--
-- Name: scg_permisos_usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_permisos_usuario_id_usuario_seq', 1, false);


--
-- Data for Name: scg_rol; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_rol VALUES (1, 'Administrador');
INSERT INTO scg_rol VALUES (3, 'Usuario');
INSERT INTO scg_rol VALUES (2, 'Gerente');


--
-- Name: scg_rol_id_rol_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_rol_id_rol_seq', 4, true);


--
-- Data for Name: scg_usuarios; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_usuarios VALUES (4, 'Usuario Sistema', '22222222', '0424-8685742', 'URB LOS PRINCIPALES', 'usuariosistema@usuario.com', 'usuariosis', 'dd5a113614a9eb58eaf239ad71a8216b', 3, 5, '2016-06-26', 0);
INSERT INTO scg_usuarios VALUES (3, 'Usuario Prueba', '11111111', '0416-7678990', 'CASA DE MARIA', 'usuario@usuario.com', 'usuario', 'dd5a113614a9eb58eaf239ad71a8216b', 1, 5, '2016-06-26', 0);
INSERT INTO scg_usuarios VALUES (1, 'Julio Cesar Aponte Castro', '13658838', '0414-8685742', 'Barrio Jose Antonio Paez Calle Guarico Casa # 224 - Ciudad Bolívar - Edo Bolívar Venezuela', 'apontejuliocesar@gmail.com', 'julioapo', 'e70d73ac3404c15647c911ae98439527', 1, 5, '2016-01-01', 1);


--
-- Name: scg_usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_usuarios_id_seq', 6, true);


--
-- Name: scg_bancos_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_bancos
    ADD CONSTRAINT scg_bancos_pkey PRIMARY KEY (id_bank);


--
-- Name: scg_empresas_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_empresas
    ADD CONSTRAINT scg_empresas_pkey PRIMARY KEY (id_empresas);


--
-- Name: scg_inf_ban_emp_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_inf_ban_emp
    ADD CONSTRAINT scg_inf_ban_emp_pkey PRIMARY KEY (id_empresa, id_banco);


--
-- Name: scg_permisos_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_permisos
    ADD CONSTRAINT scg_permisos_pkey PRIMARY KEY (id_permiso);


--
-- Name: scg_permisos_role_id_rol_id_permiso_key; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_permisos_role
    ADD CONSTRAINT scg_permisos_role_id_rol_id_permiso_key UNIQUE (id_rol, id_permiso);


--
-- Name: scg_permisos_usuario_id_usuario_id_permiso_key; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_permisos_usuario
    ADD CONSTRAINT scg_permisos_usuario_id_usuario_id_permiso_key UNIQUE (id_usuario, id_permiso);


--
-- Name: scg_rol_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_rol
    ADD CONSTRAINT scg_rol_pkey PRIMARY KEY (id_rol);


--
-- Name: scg_usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_usuarios
    ADD CONSTRAINT scg_usuarios_pkey PRIMARY KEY (id_usuario);


--
-- Name: scg_usuarios_emp_rfk; Type: FK CONSTRAINT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_usuarios
    ADD CONSTRAINT scg_usuarios_emp_rfk FOREIGN KEY (id_empresa) REFERENCES scg_empresas(id_empresas) ON DELETE RESTRICT;


--
-- Name: scg_usuarios_rol_rfk; Type: FK CONSTRAINT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_usuarios
    ADD CONSTRAINT scg_usuarios_rol_rfk FOREIGN KEY (id_rol) REFERENCES scg_rol(id_rol) ON DELETE RESTRICT;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

