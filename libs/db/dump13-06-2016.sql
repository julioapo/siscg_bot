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
-- Name: scg_clientes; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_clientes (
    id_cliente integer NOT NULL,
    cedula_identidad character varying(20) NOT NULL,
    nombres_apellidos character varying NOT NULL,
    direccion character varying NOT NULL,
    telefono_fijo character varying,
    telefono_movil character varying NOT NULL,
    email character varying NOT NULL,
    zona_trabajo character varying,
    dias_max_credito integer,
    monto_max_credito money,
    gramas_max_entrega integer,
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.scg_clientes OWNER TO desarrollo;

--
-- Name: TABLE scg_clientes; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_clientes IS 'Clientes sistema control gerencial';


--
-- Name: scg_clientes_id_clientes_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_clientes_id_clientes_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_clientes_id_clientes_seq OWNER TO desarrollo;

--
-- Name: scg_clientes_id_clientes_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_clientes_id_clientes_seq OWNED BY scg_clientes.id_cliente;


--
-- Name: scg_closediv; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_closediv (
    id_cierrediv integer NOT NULL,
    id_operacion character varying NOT NULL,
    id_liquidador integer NOT NULL,
    id_pais integer NOT NULL,
    id_bank integer NOT NULL,
    nro_cuenta character varying NOT NULL,
    nro_operacion character varying NOT NULL,
    fecha_operacion date NOT NULL,
    monto_operacion numeric(10,2) NOT NULL,
    concepto character varying NOT NULL
);


ALTER TABLE public.scg_closediv OWNER TO desarrollo;

--
-- Name: TABLE scg_closediv; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_closediv IS 'Cierre de Divisas siscg';


--
-- Name: scg_closediv_id_cierrediv_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_closediv_id_cierrediv_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_closediv_id_cierrediv_seq OWNER TO desarrollo;

--
-- Name: scg_closediv_id_cierrediv_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_closediv_id_cierrediv_seq OWNED BY scg_closediv.id_cierrediv;


--
-- Name: scg_comprador_div; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_comprador_div (
    id_comprador integer NOT NULL,
    empresa character varying NOT NULL,
    telefono_fijo character varying NOT NULL,
    direccion character varying NOT NULL,
    email character varying NOT NULL,
    representante_legal character varying NOT NULL,
    telefono_repre character varying NOT NULL,
    observaciones character varying
);


ALTER TABLE public.scg_comprador_div OWNER TO desarrollo;

--
-- Name: TABLE scg_comprador_div; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_comprador_div IS 'Compradores de Divisas';


--
-- Name: scg_comprador_div_id_comprador_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_comprador_div_id_comprador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_comprador_div_id_comprador_seq OWNER TO desarrollo;

--
-- Name: scg_comprador_div_id_comprador_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_comprador_div_id_comprador_seq OWNED BY scg_comprador_div.id_comprador;


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
-- Name: scg_inf_ban_cli; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_inf_ban_cli (
    id_cliente integer NOT NULL,
    id_banco integer NOT NULL,
    nro_cuenta character varying NOT NULL
);


ALTER TABLE public.scg_inf_ban_cli OWNER TO desarrollo;

--
-- Name: TABLE scg_inf_ban_cli; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_inf_ban_cli IS 'Informacion Cuentas Bancarias clientes';


--
-- Name: scg_inf_ban_comp; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_inf_ban_comp (
    id_comprador integer NOT NULL,
    id_banco integer NOT NULL,
    nro_cuenta character varying NOT NULL
);


ALTER TABLE public.scg_inf_ban_comp OWNER TO desarrollo;

--
-- Name: TABLE scg_inf_ban_comp; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_inf_ban_comp IS 'Informacion Bancaria Compradores de Divisas';


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
-- Name: scg_paises; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_paises (
    id_pais integer NOT NULL,
    name_country character varying NOT NULL
);


ALTER TABLE public.scg_paises OWNER TO desarrollo;

--
-- Name: TABLE scg_paises; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_paises IS 'Paises Sistema SISCG';


--
-- Name: scg_paises_id_pais_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_paises_id_pais_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_paises_id_pais_seq OWNER TO desarrollo;

--
-- Name: scg_paises_id_pais_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_paises_id_pais_seq OWNED BY scg_paises.id_pais;


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
-- Name: scg_status_cierres; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_status_cierres (
    id_status integer NOT NULL,
    name_status character varying NOT NULL
);


ALTER TABLE public.scg_status_cierres OWNER TO desarrollo;

--
-- Name: TABLE scg_status_cierres; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_status_cierres IS 'Status de los cierres';


--
-- Name: scg_status_cierres_id_status_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_status_cierres_id_status_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_status_cierres_id_status_seq OWNER TO desarrollo;

--
-- Name: scg_status_cierres_id_status_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_status_cierres_id_status_seq OWNED BY scg_status_cierres.id_status;


--
-- Name: scg_status_cliente; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_status_cliente (
    id_status integer NOT NULL,
    name_status character varying NOT NULL
);


ALTER TABLE public.scg_status_cliente OWNER TO desarrollo;

--
-- Name: TABLE scg_status_cliente; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_status_cliente IS 'Status de Clientes SISCG';


--
-- Name: scg_status_cliente_id_status_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_status_cliente_id_status_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_status_cliente_id_status_seq OWNER TO desarrollo;

--
-- Name: scg_status_cliente_id_status_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_status_cliente_id_status_seq OWNED BY scg_status_cliente.id_status;


--
-- Name: scg_status_trans_bank; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_status_trans_bank (
    id_status integer NOT NULL,
    name_status character varying NOT NULL
);


ALTER TABLE public.scg_status_trans_bank OWNER TO desarrollo;

--
-- Name: TABLE scg_status_trans_bank; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_status_trans_bank IS 'Status de transacciones bancarias';


--
-- Name: scg_status_trans_bank_id_status_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_status_trans_bank_id_status_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_status_trans_bank_id_status_seq OWNER TO desarrollo;

--
-- Name: scg_status_trans_bank_id_status_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_status_trans_bank_id_status_seq OWNED BY scg_status_trans_bank.id_status;


--
-- Name: scg_tip_trans_bank; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_tip_trans_bank (
    id_tipotrans integer NOT NULL,
    name_transf character varying NOT NULL
);


ALTER TABLE public.scg_tip_trans_bank OWNER TO desarrollo;

--
-- Name: TABLE scg_tip_trans_bank; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_tip_trans_bank IS 'Tipo de transferencia bancaria';


--
-- Name: scg_tip_trans_bank_id_tipotrans_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_tip_trans_bank_id_tipotrans_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_tip_trans_bank_id_tipotrans_seq OWNER TO desarrollo;

--
-- Name: scg_tip_trans_bank_id_tipotrans_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_tip_trans_bank_id_tipotrans_seq OWNED BY scg_tip_trans_bank.id_tipotrans;


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
-- Name: scg_view_cliente_cuent; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_cliente_cuent AS
 SELECT b.name_bank,
    cl.id_cliente,
    cl.id_banco,
    cl.nro_cuenta
   FROM scg_inf_ban_cli cl,
    scg_bancos b
  WHERE (cl.id_banco = b.id_bank);


ALTER TABLE public.scg_view_cliente_cuent OWNER TO desarrollo;

--
-- Name: VIEW scg_view_cliente_cuent; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_cliente_cuent IS 'Cuentas con Nombres de Bancos Clientes';


--
-- Name: scg_view_close_div; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_close_div AS
 SELECT e.empresa,
    b.name_bank,
    c.nro_operacion,
    c.fecha_operacion,
    c.id_cierrediv
   FROM scg_closediv c,
    scg_comprador_div e,
    scg_bancos b
  WHERE ((c.id_liquidador = e.id_comprador) AND (c.id_bank = b.id_bank));


ALTER TABLE public.scg_view_close_div OWNER TO desarrollo;

--
-- Name: VIEW scg_view_close_div; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_close_div IS 'Vista de Cierres Divisas SISCG';


--
-- Name: scg_view_close_div_tot; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_close_div_tot AS
 SELECT e.empresa,
    e.representante_legal,
    e.telefono_repre,
    p.name_country,
    b.name_bank,
    c.nro_operacion,
    c.fecha_operacion,
    c.monto_operacion,
    c.nro_cuenta,
    c.id_operacion,
    c.concepto,
    c.id_cierrediv
   FROM scg_closediv c,
    scg_comprador_div e,
    scg_bancos b,
    scg_paises p
  WHERE (((c.id_liquidador = e.id_comprador) AND (c.id_bank = b.id_bank)) AND (c.id_pais = p.id_pais));


ALTER TABLE public.scg_view_close_div_tot OWNER TO desarrollo;

--
-- Name: VIEW scg_view_close_div_tot; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_close_div_tot IS 'Consulta Global de Cierre de Divisas';


--
-- Name: scg_view_comp_cuent; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_comp_cuent AS
 SELECT b.name_bank,
    co.id_comprador,
    co.id_banco,
    co.nro_cuenta
   FROM scg_inf_ban_comp co,
    scg_bancos b
  WHERE (co.id_banco = b.id_bank);


ALTER TABLE public.scg_view_comp_cuent OWNER TO desarrollo;

--
-- Name: VIEW scg_view_comp_cuent; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_comp_cuent IS 'Cuentas con Nombres de Bancos Compradores';


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
-- Name: scg_zona_trabajo; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_zona_trabajo (
    id_zona integer NOT NULL,
    name_zona character varying NOT NULL
);


ALTER TABLE public.scg_zona_trabajo OWNER TO desarrollo;

--
-- Name: TABLE scg_zona_trabajo; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_zona_trabajo IS 'Zonas de Trabajo SISCG';


--
-- Name: scg_zona_trabajo_id_zona_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_zona_trabajo_id_zona_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_zona_trabajo_id_zona_seq OWNER TO desarrollo;

--
-- Name: scg_zona_trabajo_id_zona_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_zona_trabajo_id_zona_seq OWNED BY scg_zona_trabajo.id_zona;


--
-- Name: id_bank; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_bancos ALTER COLUMN id_bank SET DEFAULT nextval('scg_bancos_id_bank_seq'::regclass);


--
-- Name: id_cliente; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_clientes ALTER COLUMN id_cliente SET DEFAULT nextval('scg_clientes_id_clientes_seq'::regclass);


--
-- Name: id_cierrediv; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_closediv ALTER COLUMN id_cierrediv SET DEFAULT nextval('scg_closediv_id_cierrediv_seq'::regclass);


--
-- Name: id_comprador; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_comprador_div ALTER COLUMN id_comprador SET DEFAULT nextval('scg_comprador_div_id_comprador_seq'::regclass);


--
-- Name: id_empresas; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_empresas ALTER COLUMN id_empresas SET DEFAULT nextval('scg_empresas_id_empresas_seq'::regclass);


--
-- Name: id_pais; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_paises ALTER COLUMN id_pais SET DEFAULT nextval('scg_paises_id_pais_seq'::regclass);


--
-- Name: id_permiso; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_permisos ALTER COLUMN id_permiso SET DEFAULT nextval('scg_permisos_id_permiso_seq'::regclass);


--
-- Name: id_rol; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_rol ALTER COLUMN id_rol SET DEFAULT nextval('scg_rol_id_rol_seq'::regclass);


--
-- Name: id_status; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_status_cierres ALTER COLUMN id_status SET DEFAULT nextval('scg_status_cierres_id_status_seq'::regclass);


--
-- Name: id_status; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_status_cliente ALTER COLUMN id_status SET DEFAULT nextval('scg_status_cliente_id_status_seq'::regclass);


--
-- Name: id_status; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_status_trans_bank ALTER COLUMN id_status SET DEFAULT nextval('scg_status_trans_bank_id_status_seq'::regclass);


--
-- Name: id_tipotrans; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_tip_trans_bank ALTER COLUMN id_tipotrans SET DEFAULT nextval('scg_tip_trans_bank_id_tipotrans_seq'::regclass);


--
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('scg_usuarios_id_seq'::regclass);


--
-- Name: id_zona; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_zona_trabajo ALTER COLUMN id_zona SET DEFAULT nextval('scg_zona_trabajo_id_zona_seq'::regclass);


--
-- Data for Name: scg_bancos; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_bancos VALUES (2, 'BANCARIBE', '0212-2618557', 'MARIA ESTHER GOMEZ', '0414-7785696');
INSERT INTO scg_bancos VALUES (4, 'BANCO PROVINCIAL', '500-5087432', '', '');
INSERT INTO scg_bancos VALUES (6, 'BANK OF THE WEST', '1-800-488-2265', 'CONSULTORES', '1-213-972-0388');
INSERT INTO scg_bancos VALUES (7, 'BARCLAYS', '44-24-7684-2100', 'ATENCION AL CLIENTE', '44-24-7684-2100');
INSERT INTO scg_bancos VALUES (5, 'BANESCO', '0212-5011111', 'MIGUEL ANGEL MARCANO', '0414-8589674');
INSERT INTO scg_bancos VALUES (1, 'BANCO DE VENEZUELA', '0212-7629916', 'CLEOPATRA HERNANDEZ', '0412-1195265');
INSERT INTO scg_bancos VALUES (3, 'BANCO MERCANTIL', '0212-6002424', 'JUANITA', '0426-8956578');


--
-- Name: scg_bancos_id_bank_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_bancos_id_bank_seq', 7, true);


--
-- Data for Name: scg_clientes; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_clientes VALUES (4, '5878956', 'GREGORIO F SALAZAR PEDROZA', 'URB. LOS CARIBES CASA # 35 CALLE ISRAEL EL MANTECO', '0285-6984512', '04249356874', 'gsalazarp@gmail.com', '6', 45, 'Bs. 25.000,00', 100, 1);
INSERT INTO scg_clientes VALUES (2, '11785549', 'JUAN DE LA TORRE', 'URB MEDINA ANGARITA', '0285-6322815', '04168955623', 'juandela@hotmail.com', '1', 15, 'Bs. 135.000,00', 100, 2);


--
-- Name: scg_clientes_id_clientes_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_clientes_id_clientes_seq', 4, true);


--
-- Data for Name: scg_closediv; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_closediv VALUES (1, 'USA-TRA-23658-20160712-0001', 3, 1, 7, '01010205000023658', '7858966589856635', '2016-07-12', 25000.00, 'ESTE ES EL PRIMER EJEMPLO DE UN CIERRE DE DIVISAS');


--
-- Name: scg_closediv_id_cierrediv_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_closediv_id_cierrediv_seq', 1, true);


--
-- Data for Name: scg_comprador_div; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_comprador_div VALUES (2, 'STOP AND GO INC', '+1 797 85967858', 'AVE. FIRTS 1234 STREET FOR LOUDER ALABAMA US', 'stopandgo@gmail.com', 'JUAN ACCORD', '0424-9854675', 'COMPRADOR DE DIVISAS DE SISTEMA DE PRUEBA SISCG_BOT');
INSERT INTO scg_comprador_div VALUES (3, 'TRACK UP STRING, INC', '+4 525 7856898', 'STREET 4567 BRU. STATE CROUP', 'coorptrackstring@hotmail.com', 'WILTON TOVAR', '0424-8685254', 'ESTA ES UNA SEGUNDA PRUEBA DE EMPRESAS COLOCADORAS DE DIVISAS');


--
-- Name: scg_comprador_div_id_comprador_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_comprador_div_id_comprador_seq', 3, true);


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
-- Data for Name: scg_inf_ban_cli; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_inf_ban_cli VALUES (4, 5, '7898010500085123');
INSERT INTO scg_inf_ban_cli VALUES (2, 5, '7898010500085231');


--
-- Data for Name: scg_inf_ban_comp; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_inf_ban_comp VALUES (2, 5, '7898010500085231');
INSERT INTO scg_inf_ban_comp VALUES (3, 7, '01010205000023658');
INSERT INTO scg_inf_ban_comp VALUES (3, 6, '7898010400085231');
INSERT INTO scg_inf_ban_comp VALUES (2, 6, '7898010500085231');


--
-- Data for Name: scg_inf_ban_emp; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_inf_ban_emp VALUES (6, 2, '7131000100085236');
INSERT INTO scg_inf_ban_emp VALUES (3, 1, '589415901141872');
INSERT INTO scg_inf_ban_emp VALUES (3, 1, '5899415571319097');
INSERT INTO scg_inf_ban_emp VALUES (3, 5, '990109000025879');
INSERT INTO scg_inf_ban_emp VALUES (4, 3, '990109000025879');
INSERT INTO scg_inf_ban_emp VALUES (5, 2, '885601600789562');
INSERT INTO scg_inf_ban_emp VALUES (5, 2, '885601600788500');


--
-- Data for Name: scg_paises; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_paises VALUES (1, 'USA');
INSERT INTO scg_paises VALUES (2, 'PANAMA');
INSERT INTO scg_paises VALUES (3, 'COLOMBIA');
INSERT INTO scg_paises VALUES (4, 'BRASIL');
INSERT INTO scg_paises VALUES (5, 'ECUADOR');
INSERT INTO scg_paises VALUES (6, 'PERU');
INSERT INTO scg_paises VALUES (7, 'ARGENTINA');
INSERT INTO scg_paises VALUES (8, 'VENEZUELA');
INSERT INTO scg_paises VALUES (9, 'CANADA');
INSERT INTO scg_paises VALUES (11, 'ESPAÑA');
INSERT INTO scg_paises VALUES (12, 'MEXICO');
INSERT INTO scg_paises VALUES (13, 'COSTA RICA');
INSERT INTO scg_paises VALUES (14, 'PUERTO RICO');
INSERT INTO scg_paises VALUES (15, 'BAHAMAS');


--
-- Name: scg_paises_id_pais_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_paises_id_pais_seq', 15, true);


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
INSERT INTO scg_permisos VALUES (18, 'Agregar Cuentas Empresas', 'new_cuen_emp');
INSERT INTO scg_permisos VALUES (20, 'Agregar Cliente', 'nuevo_cliente');
INSERT INTO scg_permisos VALUES (21, 'Editar Clientes', 'editar_cliente');
INSERT INTO scg_permisos VALUES (22, 'Eliminar Clientes', 'eliminar_cliente');
INSERT INTO scg_permisos VALUES (23, 'Informacion Bancaria Clientes', 'clientes_cuentas');
INSERT INTO scg_permisos VALUES (24, 'Agregar Cuentas Clientes', 'new_cuen_cli');
INSERT INTO scg_permisos VALUES (25, 'Eliminar Cuenta Cliente', 'drop_cue_cli');
INSERT INTO scg_permisos VALUES (26, 'Eliminar Cuenta Empresa', 'drop_cue_emp');
INSERT INTO scg_permisos VALUES (27, 'Ver Compradores', 'compradores');
INSERT INTO scg_permisos VALUES (29, 'Agregar Comprador Div', 'nuevo_comprador');
INSERT INTO scg_permisos VALUES (30, 'Editar Comprador Div', 'editar_comprador');
INSERT INTO scg_permisos VALUES (31, 'Eliminar Comprador Div', 'eliminar_comprador');
INSERT INTO scg_permisos VALUES (32, 'Agregar Cuentas Comprador Div', 'new_cuen_comp');
INSERT INTO scg_permisos VALUES (33, 'Informacion Bancaria Comprador Div', 'comprador_cuentas');
INSERT INTO scg_permisos VALUES (34, 'Eliminar Cuenta Comprador', 'drop_cue_comp');
INSERT INTO scg_permisos VALUES (35, 'Cierres de Divisas', 'closediv');
INSERT INTO scg_permisos VALUES (36, 'Agregar Cierre Divisas', 'nuevo_cierrediv');


--
-- Name: scg_permisos_id_permiso_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_permisos_id_permiso_seq', 36, true);


--
-- Data for Name: scg_permisos_role; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_permisos_role VALUES (1, 35, 1);
INSERT INTO scg_permisos_role VALUES (1, 15, 1);
INSERT INTO scg_permisos_role VALUES (1, 21, 1);
INSERT INTO scg_permisos_role VALUES (1, 30, 1);
INSERT INTO scg_permisos_role VALUES (1, 4, 1);
INSERT INTO scg_permisos_role VALUES (1, 13, 1);
INSERT INTO scg_permisos_role VALUES (1, 16, 1);
INSERT INTO scg_permisos_role VALUES (1, 22, 1);
INSERT INTO scg_permisos_role VALUES (3, 3, 1);
INSERT INTO scg_permisos_role VALUES (3, 6, 1);
INSERT INTO scg_permisos_role VALUES (1, 31, 1);
INSERT INTO scg_permisos_role VALUES (1, 25, 1);
INSERT INTO scg_permisos_role VALUES (1, 8, 1);
INSERT INTO scg_permisos_role VALUES (1, 9, 1);
INSERT INTO scg_permisos_role VALUES (1, 12, 1);
INSERT INTO scg_permisos_role VALUES (1, 36, 1);
INSERT INTO scg_permisos_role VALUES (1, 20, 1);
INSERT INTO scg_permisos_role VALUES (1, 29, 1);
INSERT INTO scg_permisos_role VALUES (1, 24, 1);
INSERT INTO scg_permisos_role VALUES (1, 32, 1);
INSERT INTO scg_permisos_role VALUES (1, 18, 1);
INSERT INTO scg_permisos_role VALUES (1, 3, 1);
INSERT INTO scg_permisos_role VALUES (2, 8, 0);
INSERT INTO scg_permisos_role VALUES (2, 9, 0);
INSERT INTO scg_permisos_role VALUES (2, 3, 1);
INSERT INTO scg_permisos_role VALUES (2, 10, 0);
INSERT INTO scg_permisos_role VALUES (2, 4, 1);
INSERT INTO scg_permisos_role VALUES (2, 5, 0);
INSERT INTO scg_permisos_role VALUES (2, 2, 1);
INSERT INTO scg_permisos_role VALUES (2, 7, 1);
INSERT INTO scg_permisos_role VALUES (2, 6, 1);
INSERT INTO scg_permisos_role VALUES (1, 26, 1);
INSERT INTO scg_permisos_role VALUES (1, 10, 1);
INSERT INTO scg_permisos_role VALUES (1, 5, 1);
INSERT INTO scg_permisos_role VALUES (1, 14, 1);
INSERT INTO scg_permisos_role VALUES (1, 23, 1);
INSERT INTO scg_permisos_role VALUES (1, 33, 1);
INSERT INTO scg_permisos_role VALUES (1, 17, 1);
INSERT INTO scg_permisos_role VALUES (1, 0, 1);
INSERT INTO scg_permisos_role VALUES (1, 2, 1);
INSERT INTO scg_permisos_role VALUES (1, 11, 1);
INSERT INTO scg_permisos_role VALUES (1, 7, 1);
INSERT INTO scg_permisos_role VALUES (1, 27, 1);
INSERT INTO scg_permisos_role VALUES (1, 6, 1);
INSERT INTO scg_permisos_role VALUES (1, 34, 1);


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
-- Data for Name: scg_status_cierres; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_status_cierres VALUES (1, 'Activo');
INSERT INTO scg_status_cierres VALUES (2, 'Cerrado');
INSERT INTO scg_status_cierres VALUES (3, 'Anulado');


--
-- Name: scg_status_cierres_id_status_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_status_cierres_id_status_seq', 3, true);


--
-- Data for Name: scg_status_cliente; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_status_cliente VALUES (1, 'Activo');
INSERT INTO scg_status_cliente VALUES (2, 'Inactivo');


--
-- Name: scg_status_cliente_id_status_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_status_cliente_id_status_seq', 2, true);


--
-- Data for Name: scg_status_trans_bank; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_status_trans_bank VALUES (1, 'Bloqueado');
INSERT INTO scg_status_trans_bank VALUES (2, 'Efectivo');
INSERT INTO scg_status_trans_bank VALUES (3, 'Devuelto');
INSERT INTO scg_status_trans_bank VALUES (4, 'Diferido');


--
-- Name: scg_status_trans_bank_id_status_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_status_trans_bank_id_status_seq', 4, true);


--
-- Data for Name: scg_tip_trans_bank; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_tip_trans_bank VALUES (1, 'CHEQUE');
INSERT INTO scg_tip_trans_bank VALUES (2, 'DEPOSITO');
INSERT INTO scg_tip_trans_bank VALUES (3, 'TRANSFERENCIA');


--
-- Name: scg_tip_trans_bank_id_tipotrans_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_tip_trans_bank_id_tipotrans_seq', 3, true);


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
-- Data for Name: scg_zona_trabajo; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_zona_trabajo VALUES (1, 'Guayana');
INSERT INTO scg_zona_trabajo VALUES (2, 'Oriente');
INSERT INTO scg_zona_trabajo VALUES (3, 'Centro Occidente');
INSERT INTO scg_zona_trabajo VALUES (4, 'Andes');
INSERT INTO scg_zona_trabajo VALUES (5, 'Zulia');
INSERT INTO scg_zona_trabajo VALUES (6, 'Minas Fronterizas');


--
-- Name: scg_zona_trabajo_id_zona_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_zona_trabajo_id_zona_seq', 6, true);


--
-- Name: scg_bancos_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_bancos
    ADD CONSTRAINT scg_bancos_pkey PRIMARY KEY (id_bank);


--
-- Name: scg_clientes_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_clientes
    ADD CONSTRAINT scg_clientes_pkey PRIMARY KEY (id_cliente);


--
-- Name: scg_closediv_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_closediv
    ADD CONSTRAINT scg_closediv_pkey PRIMARY KEY (id_cierrediv);


--
-- Name: scg_comprador_div_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_comprador_div
    ADD CONSTRAINT scg_comprador_div_pkey PRIMARY KEY (id_comprador);


--
-- Name: scg_empresas_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_empresas
    ADD CONSTRAINT scg_empresas_pkey PRIMARY KEY (id_empresas);


--
-- Name: scg_inf_ban_cli_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_inf_ban_cli
    ADD CONSTRAINT scg_inf_ban_cli_pkey PRIMARY KEY (id_cliente, id_banco, nro_cuenta);


--
-- Name: scg_inf_ban_comp_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_inf_ban_comp
    ADD CONSTRAINT scg_inf_ban_comp_pkey PRIMARY KEY (id_comprador, id_banco, nro_cuenta);


--
-- Name: scg_inf_ban_emp_id_empresa_id_banco_nro_cuenta_key; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_inf_ban_emp
    ADD CONSTRAINT scg_inf_ban_emp_id_empresa_id_banco_nro_cuenta_key UNIQUE (id_empresa, id_banco, nro_cuenta);


--
-- Name: scg_paises_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_paises
    ADD CONSTRAINT scg_paises_pkey PRIMARY KEY (id_pais);


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
-- Name: scg_status_cierres_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_status_cierres
    ADD CONSTRAINT scg_status_cierres_pkey PRIMARY KEY (id_status);


--
-- Name: scg_status_trans_bank_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_status_trans_bank
    ADD CONSTRAINT scg_status_trans_bank_pkey PRIMARY KEY (id_status);


--
-- Name: scg_tip_trans_bank_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_tip_trans_bank
    ADD CONSTRAINT scg_tip_trans_bank_pkey PRIMARY KEY (id_tipotrans);


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

