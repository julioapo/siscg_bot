<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 08/07/16
 * Time: 09:52 PM
 */

class clientesModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getClientes()
    {
        $clientes = $this->_db->query("SELECT * FROM scg_clientes");
        return $clientes->fetchAll();
    }

    public function getCliente($id)
    {
        $id = (int) $id;
        $cliente = $this->_db->query("SELECT * FROM scg_clientes WHERE id_cliente=$id");
        return $cliente->fetch();
    }

    public function getNomCliente($id)
    {
        $id = (int) $id;
        $cliente = $this->_db->query("SELECT nombres_apellidos FROM scg_clientes WHERE id_cliente=$id");
        return $cliente->fetch();
    }

    public function insertarCliente($cedula_identidad,$nombres_apellidos,$direccion,$telefono_fijo,$telefono_movil,$email,$zona_trabajo,$dias_max_credito,$monto_max_credito,$gramas_max_entrega,$status,$id_mamat)
    {
        $this->_db->prepare("INSERT INTO scg_clientes(cedula_identidad,nombres_apellidos,direccion,telefono_fijo,telefono_movil,email,zona_trabajo,dias_max_credito,monto_max_credito,gramas_max_entrega,status,id_mamat) " .
            "VALUES (:cedula_identidad, :nombres_apellidos, :direccion, :telefono_fijo, :telefono_movil, :email, :zona_trabajo, :dias_max_credito, :monto_max_credito, :gramas_max_entrega, :status, :id_mamat)")
            ->execute(
                array(':cedula_identidad' => $cedula_identidad,
                    ':nombres_apellidos' => $nombres_apellidos,
                    ':direccion' => $direccion,
                    ':telefono_fijo' => $telefono_fijo,
                    ':telefono_movil' => $telefono_movil,
                    ':email' => $email,
                    ':zona_trabajo' => $zona_trabajo,
                    ':dias_max_credito' => $dias_max_credito,
                    ':monto_max_credito' => $monto_max_credito,
                    ':gramas_max_entrega' => $gramas_max_entrega,
                    ':status' => $status,
                    ':id_mamat' => $id_mamat
                ));
    }

    public function editarCliente($id_cliente,$nombres_apellidos,$direccion,$telefono_fijo,$telefono_movil,$email,$zona_trabajo,$dias_max_credito,$monto_max_credito,$gramas_max_entrega,$status)
    {
        $id_cliente = (int) $id_cliente;

        $this->_db->prepare(
            "UPDATE scg_clientes SET nombres_apellidos = :nombres_apellidos, direccion = :direccion, " .
            "telefono_fijo = :telefono_fijo, telefono_movil = :telefono_movil, email = :email, " .
            "zona_trabajo = :zona_trabajo, dias_max_credito = :dias_max_credito, " .
            "monto_max_credito = :monto_max_credito, gramas_max_entrega = :gramas_max_entrega, status = :status " .
            " WHERE id_cliente = :id_cliente")
            ->execute(
                array( ':id_cliente' => $id_cliente,
                    ':nombres_apellidos' => $nombres_apellidos,
                    ':direccion' => $direccion,
                    ':telefono_fijo' => $telefono_fijo,
                    ':telefono_movil' => $telefono_movil,
                    ':email' => $email,
                    ':zona_trabajo' => $zona_trabajo,
                    ':dias_max_credito' => $dias_max_credito,
                    ':monto_max_credito' => $monto_max_credito,
                    ':gramas_max_entrega' => $gramas_max_entrega,
                    ':status' => $status
                ));
    }

    public function eliminarCliente($id_cliente)
    {
        $id_cliente = (int) $id_cliente;
        $this->_db->query("DELETE FROM scg_clientes WHERE id_cliente=$id_cliente");
    }

    public function getStatus()
    {
        $status = $this->_db->query("SELECT * FROM scg_status_cliente ORDER BY name_status ASC");
        return $status->fetchAll();
    }

    public function getZonas()
    {
        $zonas = $this->_db->query("SELECT * FROM scg_zona_trabajo ORDER BY name_zona ASC");
        return $zonas->fetchAll();
    }

    public function getCuentasCli($id_cliente)
    {
        $id_cliente = (int) $id_cliente;
        $cliente_cuen = $this->_db->query("SELECT * FROM scg_view_cliente_cuent WHERE id_cliente=$id_cliente");
        return $cliente_cuen->fetchAll();
    }

    public function getCuentaCli($id_cliente,$id_bank)
    {
        $id_cliente = (int) $id_cliente;
        $id_bank = (int) $id_bank;
        $cliente_cue = $this->_db->query("SELECT * FROM scg_inf_ban_cli WHERE id_cliente=$id_cliente " .
            "AND id_banco=$id_bank");
        return $cliente_cue->fetch();
    }

    public function saveCuentaCli($id_cliente,$id_bank,$cuenta)
    {
        $this->_db->prepare(
            "INSERT INTO scg_inf_ban_cli(id_cliente,id_banco,nro_cuenta) " .
            "VALUES (:id_cliente, :id_banco, :nro_cuenta)")
            ->execute(
                array(':id_cliente' => $id_cliente,
                    ':id_banco' => $id_bank,
                    ':nro_cuenta' => $cuenta
                ));
    }

    public function dropCuentaCli($id_cliente,$id_bank,$cuenta)
    {
        $id_cliente = (int) $id_cliente;
        $id_bank = (int) $id_bank;
        $cuenta = trim($cuenta);
        $this->_db->query("DELETE FROM scg_inf_ban_cli WHERE id_cliente=$id_cliente AND " .
            "id_banco=$id_bank AND nro_cuenta='$cuenta'");
    }

    public function verificarCuentaCli($id_bank,$cuenta)
    {
        $id = $this->_db->query(
            "SELECT id_banco FROM scg_inf_ban_cli WHERE id_banco='$id_bank' " .
            "AND nro_cuenta='$cuenta'"
        );

        if($id->fetch()){
            return true;
        }

        return false;
    }

    public function verificarEmailCli($email)
    {
        $id = $this->_db->query(
            "SELECT id_cliente FROM scg_clientes WHERE email='$email'"
        );

        if($id->fetch()){
            return true;
        }

        return false;
    }

    public function verificarCedulaCli($cedula)
    {
        $id = $this->_db->query(
            "SELECT id_cliente FROM scg_clientes WHERE cedula_identidad='$cedula'"
        );

        if($id->fetch()){
            return true;
        }

        return false;
    }

    public function getMaMat()
    {
        $nommamat = $this->_db->query("SELECT id_mamat,nombre FROM scg_mamat ORDER BY nombre ASC");
        return $nommamat->fetchAll();
    }

} 