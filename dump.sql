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
-- Name: scg_abono_cierremat; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_abono_cierremat (
    id_abono integer NOT NULL,
    fecha date NOT NULL,
    tipo_trans_bank integer NOT NULL,
    id_bank integer NOT NULL,
    nro_cuenta character varying NOT NULL,
    monto numeric(10,2) NOT NULL,
    id_closemat integer NOT NULL,
    nro_trans_bank character varying NOT NULL,
    id_cliente integer NOT NULL,
    beneficiario character varying NOT NULL
);


ALTER TABLE public.scg_abono_cierremat OWNER TO desarrollo;

--
-- Name: TABLE scg_abono_cierremat; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_abono_cierremat IS 'Relacion de Abonos a Cierres de Material';


--
-- Name: scg_abono_cierremat_id_abono_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_abono_cierremat_id_abono_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_abono_cierremat_id_abono_seq OWNER TO desarrollo;

--
-- Name: scg_abono_cierremat_id_abono_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_abono_cierremat_id_abono_seq OWNED BY scg_abono_cierremat.id_abono;


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
    status integer DEFAULT 1 NOT NULL,
    id_mamat integer DEFAULT 1 NOT NULL
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
-- Name: scg_close_material; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_close_material (
    id_closemat integer NOT NULL,
    nro_closemat character varying NOT NULL,
    id_mamat integer NOT NULL,
    id_liqdivbsf integer NOT NULL,
    fecha_close date NOT NULL,
    gramas_cierre numeric(10,2) NOT NULL,
    precio_gramas numeric(10,2) NOT NULL,
    monto_total_close numeric(10,2) NOT NULL,
    observacion character varying NOT NULL,
    status integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.scg_close_material OWNER TO desarrollo;

--
-- Name: TABLE scg_close_material; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_close_material IS 'Cierre de Material SCG';


--
-- Name: scg_close_material_id_closemat_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_close_material_id_closemat_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_close_material_id_closemat_seq OWNER TO desarrollo;

--
-- Name: scg_close_material_id_closemat_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_close_material_id_closemat_seq OWNED BY scg_close_material.id_closemat;


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
    concepto character varying NOT NULL,
    status integer DEFAULT 1 NOT NULL
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
-- Name: scg_colocador_div; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_colocador_div (
    id_colocador integer NOT NULL,
    nombre character varying NOT NULL,
    telefono_fijo character varying NOT NULL,
    direccion character varying NOT NULL,
    email character varying NOT NULL,
    representante_legal character varying NOT NULL,
    telefono_repre character varying NOT NULL,
    observaciones character varying
);


ALTER TABLE public.scg_colocador_div OWNER TO desarrollo;

--
-- Name: TABLE scg_colocador_div; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_colocador_div IS 'Colocadores de Divisas';


--
-- Name: scg_colocador_div_id_colocador_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_colocador_div_id_colocador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_colocador_div_id_colocador_seq OWNER TO desarrollo;

--
-- Name: scg_colocador_div_id_colocador_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_colocador_div_id_colocador_seq OWNED BY scg_colocador_div.id_colocador;


--
-- Name: scg_comprador_div; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_comprador_div (
    id_comprador integer NOT NULL,
    nombre character varying NOT NULL,
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
-- Name: scg_entregas_mat; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_entregas_mat (
    id_entrega integer NOT NULL,
    fecha date NOT NULL,
    gramos numeric(10,2) NOT NULL,
    ley numeric(10,2) NOT NULL,
    puro numeric(10,2) NOT NULL,
    id_closemat integer NOT NULL
);


ALTER TABLE public.scg_entregas_mat OWNER TO desarrollo;

--
-- Name: TABLE scg_entregas_mat; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_entregas_mat IS 'Entrega de Material de Cierres en el Sistema Control Gerencial';


--
-- Name: scg_entregas_mat_id_entrega_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_entregas_mat_id_entrega_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_entregas_mat_id_entrega_seq OWNER TO desarrollo;

--
-- Name: scg_entregas_mat_id_entrega_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_entregas_mat_id_entrega_seq OWNED BY scg_entregas_mat.id_entrega;


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
-- Name: scg_inf_ban_col; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_inf_ban_col (
    id_colocador integer NOT NULL,
    id_banco integer NOT NULL,
    nro_cuenta character varying NOT NULL
);


ALTER TABLE public.scg_inf_ban_col OWNER TO desarrollo;

--
-- Name: TABLE scg_inf_ban_col; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_inf_ban_col IS 'Informacion Cuentas Bancarias Colocadores de Divisas';


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
-- Name: scg_inf_ban_mamat; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_inf_ban_mamat (
    id_mamat integer NOT NULL,
    id_banco integer NOT NULL,
    nro_cuenta character varying(20) NOT NULL
);


ALTER TABLE public.scg_inf_ban_mamat OWNER TO desarrollo;

--
-- Name: TABLE scg_inf_ban_mamat; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_inf_ban_mamat IS 'Informacion Bancaria Mayoristas de Material';


--
-- Name: scg_liqdivbsf; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_liqdivbsf (
    id_liqdivbsf integer NOT NULL,
    nro_liqdivbsf character varying NOT NULL,
    id_closediv integer NOT NULL,
    id_comprador integer NOT NULL,
    id_bank integer NOT NULL,
    nro_cuenta character varying NOT NULL,
    id_tipotrans integer NOT NULL,
    id_status integer NOT NULL,
    nro_operacion character varying NOT NULL,
    fecha_opera date NOT NULL,
    monto_dls numeric(10,2) NOT NULL,
    tasa_chan numeric(10,2) NOT NULL,
    monto_bsf numeric(10,2) NOT NULL,
    concepto character varying NOT NULL,
    status_liqdivbsf integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.scg_liqdivbsf OWNER TO desarrollo;

--
-- Name: TABLE scg_liqdivbsf; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_liqdivbsf IS 'Liquidacion de Divisas en BsF';


--
-- Name: scg_liqdivbsf_id_liqdivbsf_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_liqdivbsf_id_liqdivbsf_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_liqdivbsf_id_liqdivbsf_seq OWNER TO desarrollo;

--
-- Name: scg_liqdivbsf_id_liqdivbsf_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_liqdivbsf_id_liqdivbsf_seq OWNED BY scg_liqdivbsf.id_liqdivbsf;


--
-- Name: scg_mamat; Type: TABLE; Schema: public; Owner: desarrollo; Tablespace: 
--

CREATE TABLE scg_mamat (
    id_mamat integer NOT NULL,
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


ALTER TABLE public.scg_mamat OWNER TO desarrollo;

--
-- Name: TABLE scg_mamat; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON TABLE scg_mamat IS 'tabla grupo de empresas';


--
-- Name: scg_mamat_id_mamat_seq; Type: SEQUENCE; Schema: public; Owner: desarrollo
--

CREATE SEQUENCE scg_mamat_id_mamat_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scg_mamat_id_mamat_seq OWNER TO desarrollo;

--
-- Name: scg_mamat_id_mamat_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: desarrollo
--

ALTER SEQUENCE scg_mamat_id_mamat_seq OWNED BY scg_mamat.id_mamat;


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
    id_comprador integer NOT NULL,
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
-- Name: scg_view_abono_mat_tot; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_abono_mat_tot AS
 SELECT abomat.id_abono,
    abomat.fecha,
    abomat.tipo_trans_bank,
    abomat.id_bank,
    abomat.nro_cuenta AS id_nro_cuenta,
    abomat.monto,
    abomat.id_closemat,
    abomat.nro_trans_bank,
    abomat.id_cliente,
    abomat.beneficiario,
    ttb.name_transf,
    ban.name_bank,
    clomat.nro_closemat,
    cli.nombres_apellidos,
    cli.telefono_movil
   FROM scg_abono_cierremat abomat,
    scg_bancos ban,
    scg_tip_trans_bank ttb,
    scg_close_material clomat,
    scg_clientes cli
  WHERE ((((abomat.tipo_trans_bank = ttb.id_tipotrans) AND (abomat.id_bank = ban.id_bank)) AND (abomat.id_closemat = clomat.id_closemat)) AND (abomat.id_cliente = cli.id_cliente));


ALTER TABLE public.scg_view_abono_mat_tot OWNER TO desarrollo;

--
-- Name: VIEW scg_view_abono_mat_tot; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_abono_mat_tot IS 'Abonos a los Cierres de materiales sistema SCG';


--
-- Name: scg_view_bank_cuent; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_bank_cuent AS
 SELECT b.name_bank,
    c.id_mamat AS id_empresa,
    c.id_banco,
    c.nro_cuenta
   FROM scg_inf_ban_mamat c,
    scg_bancos b
  WHERE (c.id_banco = b.id_bank);


ALTER TABLE public.scg_view_bank_cuent OWNER TO desarrollo;

--
-- Name: VIEW scg_view_bank_cuent; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_bank_cuent IS 'Cuentas con Nombres de Bancos';


--
-- Name: scg_view_bank_cuent_col; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_bank_cuent_col AS
 SELECT b.name_bank,
    c.id_colocador,
    c.id_banco,
    c.nro_cuenta
   FROM scg_inf_ban_col c,
    scg_bancos b
  WHERE (c.id_banco = b.id_bank);


ALTER TABLE public.scg_view_bank_cuent_col OWNER TO desarrollo;

--
-- Name: VIEW scg_view_bank_cuent_col; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_bank_cuent_col IS 'Cuentas Colocadores con Nombres de Bancos';


--
-- Name: scg_view_bank_cuent_mmat; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_bank_cuent_mmat AS
 SELECT b.name_bank,
    c.id_mamat,
    c.id_banco,
    c.nro_cuenta
   FROM scg_inf_ban_mamat c,
    scg_bancos b
  WHERE (c.id_banco = b.id_bank);


ALTER TABLE public.scg_view_bank_cuent_mmat OWNER TO desarrollo;

--
-- Name: VIEW scg_view_bank_cuent_mmat; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_bank_cuent_mmat IS 'Cuentas con Nombres de bancos mayorista de material';


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
 SELECT e.nombre AS empresa,
    b.name_bank,
    c.nro_operacion,
    c.id_operacion,
    c.fecha_operacion,
    c.id_cierrediv,
    c.status
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
 SELECT e.nombre AS empresa,
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
-- Name: scg_view_close_mat_nom_mamat; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_close_mat_nom_mamat AS
 SELECT clomat.id_closemat,
    clomat.id_mamat,
    mamat.nombre
   FROM scg_close_material clomat,
    scg_mamat mamat
  WHERE (clomat.id_mamat = mamat.id_mamat);


ALTER TABLE public.scg_view_close_mat_nom_mamat OWNER TO desarrollo;

--
-- Name: VIEW scg_view_close_mat_nom_mamat; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_close_mat_nom_mamat IS 'Cierres de Material con Nombre de Mayoristas';


--
-- Name: scg_view_close_mat_tot; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_close_mat_tot AS
 SELECT clomat.id_closemat,
    clomat.nro_closemat,
    clomat.id_mamat,
    clomat.id_liqdivbsf,
    clomat.fecha_close,
    clomat.gramas_cierre,
    clomat.precio_gramas,
    clomat.monto_total_close,
    clomat.observacion,
    clomat.status,
    mm.nombre,
    mm.contacto,
    mm.telefono_contacto,
    lqdb.nro_liqdivbsf
   FROM scg_close_material clomat,
    scg_liqdivbsf lqdb,
    scg_mamat mm
  WHERE ((clomat.id_mamat = mm.id_mamat) AND (clomat.id_liqdivbsf = lqdb.id_liqdivbsf));


ALTER TABLE public.scg_view_close_mat_tot OWNER TO desarrollo;

--
-- Name: VIEW scg_view_close_mat_tot; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_close_mat_tot IS 'Cierre de Material Completo SCG';


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
-- Name: scg_view_entmat_tot; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_entmat_tot AS
 SELECT ent.id_entrega,
    ent.fecha,
    ent.gramos,
    ent.ley,
    ent.puro,
    ent.id_closemat,
    clomattot.nro_closemat,
    clomattot.nombre
   FROM scg_entregas_mat ent,
    scg_view_close_mat_tot clomattot
  WHERE (ent.id_closemat = clomattot.id_closemat);


ALTER TABLE public.scg_view_entmat_tot OWNER TO desarrollo;

--
-- Name: VIEW scg_view_entmat_tot; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_entmat_tot IS 'Entrega de Materiales completa SISCG';


--
-- Name: scg_view_liqui_cuent; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_liqui_cuent AS
 SELECT b.name_bank,
    co.id_colocador,
    co.id_banco,
    co.nro_cuenta
   FROM scg_inf_ban_col co,
    scg_bancos b
  WHERE (co.id_banco = b.id_bank);


ALTER TABLE public.scg_view_liqui_cuent OWNER TO desarrollo;

--
-- Name: VIEW scg_view_liqui_cuent; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_liqui_cuent IS 'Cuentas con Nombres de Bancos Liquidadores';


--
-- Name: scg_view_liqui_divbsf_tot; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_liqui_divbsf_tot AS
 SELECT liq.id_liqdivbsf,
    liq.id_closediv,
    liq.id_comprador,
    liq.id_bank,
    liq.nro_liqdivbsf,
    liq.nro_cuenta,
    liq.id_tipotrans,
    liq.id_status,
    liq.nro_operacion,
    liq.fecha_opera,
    liq.monto_dls,
    liq.tasa_chan,
    liq.monto_bsf,
    liq.concepto,
    clo.id_operacion,
    comp.nombre,
    comp.representante_legal,
    comp.telefono_repre,
    ban.name_bank,
    ttb.name_transf,
    stb.name_status
   FROM scg_liqdivbsf liq,
    scg_closediv clo,
    scg_comprador_div comp,
    scg_bancos ban,
    scg_status_trans_bank stb,
    scg_tip_trans_bank ttb
  WHERE (((((liq.id_closediv = clo.id_cierrediv) AND (liq.id_comprador = comp.id_comprador)) AND (liq.id_bank = ban.id_bank)) AND (liq.id_status = stb.id_status)) AND (liq.id_tipotrans = ttb.id_tipotrans));


ALTER TABLE public.scg_view_liqui_divbsf_tot OWNER TO desarrollo;

--
-- Name: VIEW scg_view_liqui_divbsf_tot; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_liqui_divbsf_tot IS 'Liquidacion de Divisas Completo';


--
-- Name: scg_view_status_closediv; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_status_closediv AS
 SELECT clodiv.id_operacion,
    clodiv.fecha_operacion,
    clodiv.monto_operacion,
    clodiv.status,
    clodiv.id_cierrediv,
    liqdiv.nro_liqdivbsf,
    liqdiv.id_comprador,
    liqdiv.fecha_opera,
    liqdiv.monto_dls,
    liqdiv.tasa_chan,
    liqdiv.monto_bsf,
    stc.name_status,
    comp.nombre
   FROM scg_closediv clodiv,
    scg_liqdivbsf liqdiv,
    scg_status_cierres stc,
    scg_comprador_div comp
  WHERE (((clodiv.id_cierrediv = liqdiv.id_closediv) AND (clodiv.status = stc.id_status)) AND (liqdiv.id_comprador = comp.id_comprador));


ALTER TABLE public.scg_view_status_closediv OWNER TO desarrollo;

--
-- Name: VIEW scg_view_status_closediv; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_status_closediv IS 'Ver estatus e informacion de colocacion de divisas';


--
-- Name: scg_view_status_liqdiv_tot; Type: VIEW; Schema: public; Owner: desarrollo
--

CREATE VIEW scg_view_status_liqdiv_tot AS
 SELECT ldbf.id_liqdivbsf,
    ldbf.nro_liqdivbsf,
    ldbf.fecha_opera,
    ldbf.monto_bsf,
    clomat.nro_closemat,
    clomat.fecha_close,
    clomat.gramas_cierre,
    clomat.precio_gramas,
    clomat.monto_total_close,
    clomat.status,
    clomat.id_mamat,
    mamat.nombre
   FROM scg_liqdivbsf ldbf,
    scg_close_material clomat,
    scg_mamat mamat
  WHERE ((ldbf.id_liqdivbsf = clomat.id_liqdivbsf) AND (clomat.id_mamat = mamat.id_mamat));


ALTER TABLE public.scg_view_status_liqdiv_tot OWNER TO desarrollo;

--
-- Name: VIEW scg_view_status_liqdiv_tot; Type: COMMENT; Schema: public; Owner: desarrollo
--

COMMENT ON VIEW scg_view_status_liqdiv_tot IS 'Ver estatus e informacion de liquidacion de divisas';


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
    u.id_comprador,
    r.nombre AS rol_name,
    e.nombre AS compdiv_name
   FROM scg_usuarios u,
    scg_rol r,
    scg_comprador_div e
  WHERE ((u.id_rol = r.id_rol) AND (u.id_comprador = e.id_comprador));


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
-- Name: id_abono; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_abono_cierremat ALTER COLUMN id_abono SET DEFAULT nextval('scg_abono_cierremat_id_abono_seq'::regclass);


--
-- Name: id_bank; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_bancos ALTER COLUMN id_bank SET DEFAULT nextval('scg_bancos_id_bank_seq'::regclass);


--
-- Name: id_cliente; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_clientes ALTER COLUMN id_cliente SET DEFAULT nextval('scg_clientes_id_clientes_seq'::regclass);


--
-- Name: id_closemat; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_close_material ALTER COLUMN id_closemat SET DEFAULT nextval('scg_close_material_id_closemat_seq'::regclass);


--
-- Name: id_cierrediv; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_closediv ALTER COLUMN id_cierrediv SET DEFAULT nextval('scg_closediv_id_cierrediv_seq'::regclass);


--
-- Name: id_colocador; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_colocador_div ALTER COLUMN id_colocador SET DEFAULT nextval('scg_colocador_div_id_colocador_seq'::regclass);


--
-- Name: id_comprador; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_comprador_div ALTER COLUMN id_comprador SET DEFAULT nextval('scg_comprador_div_id_comprador_seq'::regclass);


--
-- Name: id_entrega; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_entregas_mat ALTER COLUMN id_entrega SET DEFAULT nextval('scg_entregas_mat_id_entrega_seq'::regclass);


--
-- Name: id_liqdivbsf; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_liqdivbsf ALTER COLUMN id_liqdivbsf SET DEFAULT nextval('scg_liqdivbsf_id_liqdivbsf_seq'::regclass);


--
-- Name: id_mamat; Type: DEFAULT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_mamat ALTER COLUMN id_mamat SET DEFAULT nextval('scg_mamat_id_mamat_seq'::regclass);


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
-- Data for Name: scg_abono_cierremat; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_abono_cierremat VALUES (1, '2016-07-21', 1, 1, '78540205000023658', 402000.00, 5, '7855485000002545', 4, 'JUAN DE LA TORRE');


--
-- Name: scg_abono_cierremat_id_abono_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_abono_cierremat_id_abono_seq', 1, true);


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

INSERT INTO scg_clientes VALUES (2, '11785549', 'JUAN DE LA TORRE', 'URB MEDINA ANGARITA', '0285-6322815', '04168955623', 'juandela@hotmail.com', '1', 15, 'Bs. 135.000,00', 100, 2, 4);
INSERT INTO scg_clientes VALUES (5, '87545886', 'PEDRO PEÑA NIETO', 'C.C. CAURA AV PRINCIPAL LOS CARMELOS CABIMAS EDO ZULIA', '', '04246235858', 'pedronietopena@hotmail.com', '5', 45, 'Bs. 250.000,00', 100, 1, 5);
INSERT INTO scg_clientes VALUES (4, '5878956', 'GREGORIO F SALAZAR PEDROZA', 'URB. LOS CARIBES CASA # 35 CALLE ISRAEL EL MANTECO', '0285-6984512', '04249356874', 'gsalazarp@gmail.com', '6', 45, 'Bs. 25.000,00', 100, 1, 5);


--
-- Name: scg_clientes_id_clientes_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_clientes_id_clientes_seq', 5, true);


--
-- Data for Name: scg_close_material; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_close_material VALUES (5, '4-8-20160720-0001', 4, 8, '2016-07-20', 200.00, 35000.00, 7000000.00, 'CIERRE DE MATERIAL MES DE AGOSTO DE 2016', 1);
INSERT INTO scg_close_material VALUES (6, '6-8-20160720-0006', 6, 8, '2016-07-20', 100.00, 32000.00, 3200000.00, 'CIERRE DE MATERIAL MES DE JUNIO 2016', 1);


--
-- Name: scg_close_material_id_closemat_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_close_material_id_closemat_seq', 6, true);


--
-- Data for Name: scg_closediv; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_closediv VALUES (1, 'USA-TRA-23658-20160712-0001', 3, 1, 7, '01010205000023658', '7858966589856635', '2016-07-12', 25000.00, 'ESTE ES EL PRIMER EJEMPLO DE UN CIERRE DE DIVISAS', 1);
INSERT INTO scg_closediv VALUES (3, 'BAH-TRA-52487-20160716-0003', 4, 15, 7, '01000350256000152487', '0256000008758002562', '2016-07-16', 25000.00, 'ESTA ES UNA PRUEBA DE SISTEMAS', 1);
INSERT INTO scg_closediv VALUES (2, 'PAN-DEP-85968-20160716-0002', 2, 2, 6, '78950000025600785968', '789580000528789658', '2016-07-16', 25000.00, 'COLOCACION DE DIVISAS COMPRA DE ORO ESTAMPADO AL 38% TONEL 10', 1);


--
-- Name: scg_closediv_id_cierrediv_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_closediv_id_cierrediv_seq', 3, true);


--
-- Data for Name: scg_colocador_div; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_colocador_div VALUES (2, 'STOKER AMBRUL', '+1 797 85967858', 'DIRECCION DE PRIMERA PRUEBA DE SISTEMA CONTROL GERENCIAL', 'ambrulstoker@stoker.com', 'JHON GRUBER', '0414-7856598', 'PRIMERA OBSERVACION DE SISTEMA CONTROL GERENCIAL');
INSERT INTO scg_colocador_div VALUES (3, 'FRANK STUCKER', '+1 010 785 85002569', '5TA AV MIAMI FLORIDA', 'frankstuckerplus@yahoo.co.us', 'FRANK STUCKER', '0412-0112589', 'ESTANCIA DE PROVINCIA MALTRECHA');
INSERT INTO scg_colocador_div VALUES (4, 'PANAMA CONSTRUCCIONS INC', '+48 263 785965', 'AV LATERAL 35 APTO TORRE CRISTAL CIUDAD DE PANAMA', 'construccionsvideo@gmail.co.pn', 'EDUARDO LOPEZ', '0424-5968578', '');


--
-- Name: scg_colocador_div_id_colocador_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_colocador_div_id_colocador_seq', 4, true);


--
-- Data for Name: scg_comprador_div; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_comprador_div VALUES (2, 'STOP AND GO INC', '+1 797 85967858', 'AVE. FIRTS 1234 STREET FOR LOUDER ALABAMA US', 'stopandgo@gmail.com', 'JUAN ACCORD', '0424-9854675', 'COMPRADOR DE DIVISAS DE SISTEMA DE PRUEBA SISCG_BOT');
INSERT INTO scg_comprador_div VALUES (3, 'TRACK UP STRING, INC', '+4 525 7856898', 'STREET 4567 BRU. STATE CROUP', 'coorptrackstring@hotmail.com', 'WILTON TOVAR', '0424-8685254', 'ESTA ES UNA SEGUNDA PRUEBA DE EMPRESAS COLOCADORAS DE DIVISAS');
INSERT INTO scg_comprador_div VALUES (4, 'JULIO APONTE', '0285-6322815', 'BARRIO JOSE ANTONIO PAEZ', 'apontejuliocesar@gmail.com', 'JULIO APONTE', '0414-8685742', 'LIQUIDADOR DE DIVISAS DE JUAN PETROLIO');


--
-- Name: scg_comprador_div_id_comprador_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_comprador_div_id_comprador_seq', 4, true);


--
-- Data for Name: scg_entregas_mat; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_entregas_mat VALUES (3, '2016-07-21', 80.00, 950.00, 76.00, 5);
INSERT INTO scg_entregas_mat VALUES (4, '2016-07-21', 50.00, 700.00, 35.00, 6);


--
-- Name: scg_entregas_mat_id_entrega_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_entregas_mat_id_entrega_seq', 4, true);


--
-- Data for Name: scg_inf_ban_cli; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_inf_ban_cli VALUES (4, 5, '7898010500085123');
INSERT INTO scg_inf_ban_cli VALUES (2, 5, '7898010500085231');
INSERT INTO scg_inf_ban_cli VALUES (5, 4, '789958000025635');
INSERT INTO scg_inf_ban_cli VALUES (5, 1, '5899415901141872');
INSERT INTO scg_inf_ban_cli VALUES (5, 5, '001423000050895688');
INSERT INTO scg_inf_ban_cli VALUES (4, 1, '78540205000023658');


--
-- Data for Name: scg_inf_ban_col; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_inf_ban_col VALUES (2, 6, '78950000025600785968');
INSERT INTO scg_inf_ban_col VALUES (3, 7, '010360000500254');
INSERT INTO scg_inf_ban_col VALUES (4, 2, '0900250007854968');
INSERT INTO scg_inf_ban_col VALUES (4, 7, '01000350256000152487');


--
-- Data for Name: scg_inf_ban_comp; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_inf_ban_comp VALUES (3, 7, '01010205000023658');
INSERT INTO scg_inf_ban_comp VALUES (3, 6, '7898010400085231');
INSERT INTO scg_inf_ban_comp VALUES (2, 6, '7898010500085231');
INSERT INTO scg_inf_ban_comp VALUES (4, 7, '0100035025700001524');
INSERT INTO scg_inf_ban_comp VALUES (4, 3, '170258900001524');
INSERT INTO scg_inf_ban_comp VALUES (3, 5, '660005800732056');
INSERT INTO scg_inf_ban_comp VALUES (3, 5, '660005800891589');
INSERT INTO scg_inf_ban_comp VALUES (2, 5, '78540205000023658');


--
-- Data for Name: scg_inf_ban_mamat; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_inf_ban_mamat VALUES (6, 2, '7131000100085236');
INSERT INTO scg_inf_ban_mamat VALUES (3, 1, '589415901141872');
INSERT INTO scg_inf_ban_mamat VALUES (3, 1, '5899415571319097');
INSERT INTO scg_inf_ban_mamat VALUES (3, 5, '990109000025879');
INSERT INTO scg_inf_ban_mamat VALUES (4, 3, '990109000025879');
INSERT INTO scg_inf_ban_mamat VALUES (5, 2, '885601600789562');
INSERT INTO scg_inf_ban_mamat VALUES (5, 2, '885601600788500');
INSERT INTO scg_inf_ban_mamat VALUES (5, 1, '77550105200087598');


--
-- Data for Name: scg_liqdivbsf; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_liqdivbsf VALUES (5, 'CHE-78569-001524-20160717-0001', 1, 4, 7, '0100035025700001524', 1, 2, '25008950078569', '2016-07-17', 5000.00, 870.00, 4350000.00, 'LIQUIDACION PARA ENTREGAS DEL MES DE AGOSTO 2016', 1);
INSERT INTO scg_liqdivbsf VALUES (6, 'DEP-75968-085231-20160717-0006', 1, 2, 5, '7898010500085231', 2, 2, '780000589601025875968', '2016-07-17', 5000.00, 970.00, 4850000.00, 'LIQ DIVISAS ENTREGAS MES DE JUNIO 2016 Y ADELANTO MES DE JULIO 2016', 1);
INSERT INTO scg_liqdivbsf VALUES (7, 'TRA-25896-085231-20160717-0007', 1, 3, 6, '7898010400085231', 3, 2, '2000025680000525896', '2016-07-17', 1500.00, 920.00, 1380000.00, 'ENTREGA MES DE AGOSTO 2016', 1);
INSERT INTO scg_liqdivbsf VALUES (8, 'TRA-85898-085231-20160720-0008', 2, 3, 6, '7898010400085231', 3, 2, '7858589985898', '2016-07-20', 20000.00, 970.00, 19400000.00, 'PARA PRUEBAS DE SISTEMAS CON CIERRES INCLUIDOS', 1);


--
-- Name: scg_liqdivbsf_id_liqdivbsf_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_liqdivbsf_id_liqdivbsf_seq', 8, true);


--
-- Data for Name: scg_mamat; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_mamat VALUES (3, 'MULTISERVICIOS ROS-CAR, C.A.', 'J-29829905-3', '04148684497', 'AV. LIBERTADOR, LOCAL S/N, URB. DOÑA BARBARA, SAN FELIX, EDO. BOLIVAR', '', 'LEONEL CARVAJAL', '04148684497', 1, 1);
INSERT INTO scg_mamat VALUES (4, 'SOHEMAR, C.A.', 'J-9089786-5', '0286-317.70.75', 'Guayana, Puerto Ordaz, Estado Bolivar, Venezuela', 'sohemar.ca@gmail.com', 'TWITTER', '', 1, 1);
INSERT INTO scg_mamat VALUES (5, 'SISTEMAS MJA MARTINEZ FP', 'F16650133-P', '0285-6322815', 'BARRIO JOSE ANTONIO PAEZ', 'julioapo@hotmail.com', 'MARIANNY MARTINEZ', '04148685742', 1, 1);
INSERT INTO scg_mamat VALUES (1, 'Top 5 Corporation', 'J-78098800-9', '0285-6322815', 'SECTOR FUENTE LUMINOSA EST DE SERVICIO LOCAL 5', 'top5corporation@gmail.com', 'Jhon Trout G', '0414-8685742', 1, 1);
INSERT INTO scg_mamat VALUES (6, 'CONSTRUCTORA 3G, C.A.', 'J-4567893-7', '0212-789653', 'AV. VENEZUELA C/C SAN BASILIA
ESQUINA LOS LOROS EDIF. AMAZONAS
MEZZANINA 3 LOCAL CONSTRUCTORA 3G', 'constructorag3@gmail.com', 'ASDRUBAL PEREZ', '0414-7863721', 1, 1);


--
-- Name: scg_mamat_id_mamat_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_mamat_id_mamat_seq', 14, true);


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
INSERT INTO scg_permisos VALUES (20, 'Agregar Cliente', 'nuevo_cliente');
INSERT INTO scg_permisos VALUES (21, 'Editar Clientes', 'editar_cliente');
INSERT INTO scg_permisos VALUES (22, 'Eliminar Clientes', 'eliminar_cliente');
INSERT INTO scg_permisos VALUES (23, 'Informacion Bancaria Clientes', 'clientes_cuentas');
INSERT INTO scg_permisos VALUES (24, 'Agregar Cuentas Clientes', 'new_cuen_cli');
INSERT INTO scg_permisos VALUES (25, 'Eliminar Cuenta Cliente', 'drop_cue_cli');
INSERT INTO scg_permisos VALUES (27, 'Ver Compradores', 'compradores');
INSERT INTO scg_permisos VALUES (29, 'Agregar Comprador Div', 'nuevo_comprador');
INSERT INTO scg_permisos VALUES (30, 'Editar Comprador Div', 'editar_comprador');
INSERT INTO scg_permisos VALUES (31, 'Eliminar Comprador Div', 'eliminar_comprador');
INSERT INTO scg_permisos VALUES (32, 'Agregar Cuentas Comprador Div', 'new_cuen_comp');
INSERT INTO scg_permisos VALUES (33, 'Informacion Bancaria Comprador Div', 'comprador_cuentas');
INSERT INTO scg_permisos VALUES (34, 'Eliminar Cuenta Comprador', 'drop_cue_comp');
INSERT INTO scg_permisos VALUES (35, 'Cierres de Divisas', 'closediv');
INSERT INTO scg_permisos VALUES (36, 'Agregar Cierre Divisas', 'nuevo_cierrediv');
INSERT INTO scg_permisos VALUES (37, 'Cierres de BsF', 'closebsf');
INSERT INTO scg_permisos VALUES (38, 'Agregar Cierre Bsf', 'nuevo_cierrebsf');
INSERT INTO scg_permisos VALUES (39, 'Colocadores de Divisas', 'colocador');
INSERT INTO scg_permisos VALUES (40, 'Agregar Colocador de Divisas', 'nuevo_colocador');
INSERT INTO scg_permisos VALUES (41, 'Editar Colocadores', 'editar_colocador');
INSERT INTO scg_permisos VALUES (42, 'Eliminar Colocador Divisas', 'eliminar_colocador');
INSERT INTO scg_permisos VALUES (43, 'Informacion Bancaria Colocador', 'colocador_cuentas');
INSERT INTO scg_permisos VALUES (44, 'Agregar Cuentas Colocador Div', 'new_cuen_col');
INSERT INTO scg_permisos VALUES (45, 'Eliminar Cuenta Colocador', 'drop_cue_col');
INSERT INTO scg_permisos VALUES (4, 'Editar M.M.', 'editar_mamat');
INSERT INTO scg_permisos VALUES (3, 'Agregar M.M.', 'nueva_mamat');
INSERT INTO scg_permisos VALUES (5, 'Eliminar M.M.', 'eliminar_mamat');
INSERT INTO scg_permisos VALUES (6, 'Ver M.M', 'mamat');
INSERT INTO scg_permisos VALUES (17, 'Informacion Bancaria M.M.', 'mamat_cuentas');
INSERT INTO scg_permisos VALUES (18, 'Agregar Cuentas M.M.', 'new_cuen_mamat');
INSERT INTO scg_permisos VALUES (26, 'Eliminar Cuenta M.M.', 'drop_cue_mamat');
INSERT INTO scg_permisos VALUES (46, 'Cierre de Material', 'closemat');
INSERT INTO scg_permisos VALUES (47, 'Agregar Cierre Material', 'nuevo_cierremat');
INSERT INTO scg_permisos VALUES (48, 'Entrega de Material', 'entmat');
INSERT INTO scg_permisos VALUES (49, 'Agregar Entrega de Material', 'nueva_entmat');
INSERT INTO scg_permisos VALUES (50, 'Abono de Cierre Material', 'abomat');
INSERT INTO scg_permisos VALUES (51, 'Nuevo Abono de Cierre', 'nuevo_abomat');


--
-- Name: scg_permisos_id_permiso_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_permisos_id_permiso_seq', 51, true);


--
-- Data for Name: scg_permisos_role; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_permisos_role VALUES (1, 16, 1);
INSERT INTO scg_permisos_role VALUES (1, 22, 1);
INSERT INTO scg_permisos_role VALUES (1, 31, 1);
INSERT INTO scg_permisos_role VALUES (1, 25, 1);
INSERT INTO scg_permisos_role VALUES (1, 34, 1);
INSERT INTO scg_permisos_role VALUES (1, 26, 1);
INSERT INTO scg_permisos_role VALUES (1, 5, 1);
INSERT INTO scg_permisos_role VALUES (3, 3, 1);
INSERT INTO scg_permisos_role VALUES (3, 6, 1);
INSERT INTO scg_permisos_role VALUES (1, 14, 1);
INSERT INTO scg_permisos_role VALUES (2, 8, 0);
INSERT INTO scg_permisos_role VALUES (2, 9, 0);
INSERT INTO scg_permisos_role VALUES (2, 3, 1);
INSERT INTO scg_permisos_role VALUES (2, 10, 0);
INSERT INTO scg_permisos_role VALUES (2, 4, 1);
INSERT INTO scg_permisos_role VALUES (2, 5, 0);
INSERT INTO scg_permisos_role VALUES (2, 2, 1);
INSERT INTO scg_permisos_role VALUES (2, 7, 1);
INSERT INTO scg_permisos_role VALUES (2, 6, 1);
INSERT INTO scg_permisos_role VALUES (1, 44, 1);
INSERT INTO scg_permisos_role VALUES (1, 39, 1);
INSERT INTO scg_permisos_role VALUES (1, 41, 1);
INSERT INTO scg_permisos_role VALUES (1, 42, 1);
INSERT INTO scg_permisos_role VALUES (1, 45, 1);
INSERT INTO scg_permisos_role VALUES (1, 43, 1);
INSERT INTO scg_permisos_role VALUES (1, 24, 1);
INSERT INTO scg_permisos_role VALUES (1, 49, 1);
INSERT INTO scg_permisos_role VALUES (1, 48, 1);
INSERT INTO scg_permisos_role VALUES (1, 8, 1);
INSERT INTO scg_permisos_role VALUES (1, 9, 1);
INSERT INTO scg_permisos_role VALUES (1, 12, 1);
INSERT INTO scg_permisos_role VALUES (1, 23, 1);
INSERT INTO scg_permisos_role VALUES (1, 33, 1);
INSERT INTO scg_permisos_role VALUES (1, 20, 1);
INSERT INTO scg_permisos_role VALUES (1, 40, 1);
INSERT INTO scg_permisos_role VALUES (1, 4, 1);
INSERT INTO scg_permisos_role VALUES (1, 13, 1);
INSERT INTO scg_permisos_role VALUES (1, 32, 1);
INSERT INTO scg_permisos_role VALUES (1, 18, 1);
INSERT INTO scg_permisos_role VALUES (1, 3, 1);
INSERT INTO scg_permisos_role VALUES (1, 10, 1);
INSERT INTO scg_permisos_role VALUES (1, 17, 1);
INSERT INTO scg_permisos_role VALUES (1, 0, 1);
INSERT INTO scg_permisos_role VALUES (1, 2, 1);
INSERT INTO scg_permisos_role VALUES (1, 11, 1);
INSERT INTO scg_permisos_role VALUES (1, 7, 1);
INSERT INTO scg_permisos_role VALUES (1, 27, 1);
INSERT INTO scg_permisos_role VALUES (1, 6, 1);
INSERT INTO scg_permisos_role VALUES (1, 29, 1);
INSERT INTO scg_permisos_role VALUES (1, 50, 1);
INSERT INTO scg_permisos_role VALUES (1, 38, 1);
INSERT INTO scg_permisos_role VALUES (1, 36, 1);
INSERT INTO scg_permisos_role VALUES (1, 47, 1);
INSERT INTO scg_permisos_role VALUES (1, 46, 1);
INSERT INTO scg_permisos_role VALUES (1, 37, 1);
INSERT INTO scg_permisos_role VALUES (1, 35, 1);
INSERT INTO scg_permisos_role VALUES (1, 51, 1);
INSERT INTO scg_permisos_role VALUES (1, 15, 1);
INSERT INTO scg_permisos_role VALUES (1, 21, 1);
INSERT INTO scg_permisos_role VALUES (1, 30, 1);


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
INSERT INTO scg_tip_trans_bank VALUES (4, 'EFECTIVO');


--
-- Name: scg_tip_trans_bank_id_tipotrans_seq; Type: SEQUENCE SET; Schema: public; Owner: desarrollo
--

SELECT pg_catalog.setval('scg_tip_trans_bank_id_tipotrans_seq', 4, true);


--
-- Data for Name: scg_usuarios; Type: TABLE DATA; Schema: public; Owner: desarrollo
--

INSERT INTO scg_usuarios VALUES (4, 'Usuario Sistema', '22222222', '0424-8685742', 'URB LOS PRINCIPALES', 'usuariosistema@usuario.com', 'usuariosis', 'dd5a113614a9eb58eaf239ad71a8216b', 3, 4, '2016-06-26', 0);
INSERT INTO scg_usuarios VALUES (3, 'Usuario Prueba', '11111111', '0416-7678990', 'CASA DE MARIA', 'usuario@usuario.com', 'usuario', 'dd5a113614a9eb58eaf239ad71a8216b', 1, 4, '2016-06-26', 0);
INSERT INTO scg_usuarios VALUES (1, 'Julio Cesar Aponte Castro', '13658838', '0414-8685742', 'Barrio Jose Antonio Paez Calle Guarico Casa # 224 - Ciudad Bolívar - Edo Bolívar Venezuela', 'apontejuliocesar@gmail.com', 'julioapo', 'e70d73ac3404c15647c911ae98439527', 1, 4, '2016-01-01', 1);


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
-- Name: scg_abono_cierremat_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_abono_cierremat
    ADD CONSTRAINT scg_abono_cierremat_pkey PRIMARY KEY (id_abono);


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
-- Name: scg_close_material_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_close_material
    ADD CONSTRAINT scg_close_material_pkey PRIMARY KEY (id_closemat);


--
-- Name: scg_closediv_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_closediv
    ADD CONSTRAINT scg_closediv_pkey PRIMARY KEY (id_cierrediv);


--
-- Name: scg_colocador_div_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_colocador_div
    ADD CONSTRAINT scg_colocador_div_pkey PRIMARY KEY (id_colocador);


--
-- Name: scg_comprador_div_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_comprador_div
    ADD CONSTRAINT scg_comprador_div_pkey PRIMARY KEY (id_comprador);


--
-- Name: scg_entregas_mat_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_entregas_mat
    ADD CONSTRAINT scg_entregas_mat_pkey PRIMARY KEY (id_entrega);


--
-- Name: scg_inf_ban_cli_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_inf_ban_cli
    ADD CONSTRAINT scg_inf_ban_cli_pkey PRIMARY KEY (id_cliente, id_banco, nro_cuenta);


--
-- Name: scg_inf_ban_col_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_inf_ban_col
    ADD CONSTRAINT scg_inf_ban_col_pkey PRIMARY KEY (id_colocador, id_banco, nro_cuenta);


--
-- Name: scg_inf_ban_comp_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_inf_ban_comp
    ADD CONSTRAINT scg_inf_ban_comp_pkey PRIMARY KEY (id_comprador, id_banco, nro_cuenta);


--
-- Name: scg_inf_ban_emp_id_empresa_id_banco_nro_cuenta_key; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_inf_ban_mamat
    ADD CONSTRAINT scg_inf_ban_emp_id_empresa_id_banco_nro_cuenta_key UNIQUE (id_mamat, id_banco, nro_cuenta);


--
-- Name: scg_liqdivbsf_pkey; Type: CONSTRAINT; Schema: public; Owner: desarrollo; Tablespace: 
--

ALTER TABLE ONLY scg_liqdivbsf
    ADD CONSTRAINT scg_liqdivbsf_pkey PRIMARY KEY (id_liqdivbsf);


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
-- Name: scg_usuarios_id_comprador_fkey; Type: FK CONSTRAINT; Schema: public; Owner: desarrollo
--

ALTER TABLE ONLY scg_usuarios
    ADD CONSTRAINT scg_usuarios_id_comprador_fkey FOREIGN KEY (id_comprador) REFERENCES scg_comprador_div(id_comprador) ON DELETE CASCADE;


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

