<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 02/07/16
 * Time: 01:50 PM
 */

class ColocadorModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * [getEmpresas Obtner todos los registros de empresas]
     * @return [type] [description]
     */
    public function getColocadores()
    {
        $empresas = $this->_db->query("SELECT * FROM scg_colocador_div");
        return $empresas->fetchAll();
    }

    public function getColocador($id)
    {
        $id = (int) $id;
        $empresa = $this->_db->query("SELECT * FROM scg_colocador_div WHERE id_colocador=$id");
        return $empresa->fetch();
    }

    public function getNomColocador($id)
    {
        $id = (int) $id;
        $empresa = $this->_db->query("SELECT nombre FROM scg_colocador_div WHERE id_colocador=$id");
        return $empresa->fetch();
    }

    public function insertarColocador($nombre,$telefono_fijo,$direccion,$email,$representante_legal,$telefono_repre,$observaciones)
    {
        $this->_db->prepare(
            "INSERT INTO scg_colocador_div(nombre,telefono_fijo,direccion,email,representante_legal,telefono_repre,observaciones) " .
            "VALUES (:nombre, :telefono_fijo, :direccion, :email, :representante_legal, :telefono_repre, :observaciones)")
            ->execute(
                array(':nombre' => $nombre,
                    ':telefono_fijo' => $telefono_fijo,
                    ':direccion' => $direccion,
                    ':email' => $email,
                    ':representante_legal' => $representante_legal,
                    ':telefono_repre' => $telefono_repre,
                    'observaciones' => $observaciones
                ));
    }

    public function editarColocador($id_colocador,$telefono_fijo,$direccion,$email,$representante_legal,$telefono_repre,$observaciones)
    {
        $id_colocador = (int) $id_colocador;

        $this->_db->prepare(
            "UPDATE scg_colocador_div SET telefono_fijo = :telefono_fijo, direccion = :direccion, email = :email, " .
            "representante_legal = :representante_legal, telefono_repre = :telefono_repre, " .
            "observaciones = :observaciones WHERE id_colocador = :id_colocador")
            ->execute(
                array( ':id_colocador' => $id_colocador,
                    ':telefono_fijo' => $telefono_fijo,
                    ':direccion' => $direccion,
                    ':email' => $email,
                    ':representante_legal' => $representante_legal,
                    ':telefono_repre' => $telefono_repre,
                    ':observaciones' => $observaciones
                ));
    }

    public function eliminarColocador($id_colocador)
    {
        $id_colocador = (int) $id_colocador;
        $this->_db->query("DELETE FROM scg_colocador_div WHERE id_colocador=$id_colocador");
    }

    public function getCuentas($id_colocador)
    {
        $id_colocador = (int) $id_colocador;
        $colocador_cue = $this->_db->query("SELECT * FROM scg_view_bank_cuent_col WHERE id_colocador=$id_colocador");
        return $colocador_cue->fetchAll();
    }

    public function getCuenta($id_colocador,$id_bank)
    {
        $id_colocador = (int) $id_colocador;
        $id_bank = (int) $id_bank;
        $colocador_cue = $this->_db->query("SELECT * FROM scg_inf_ban_col WHERE id_colocador=$id_colocador " .
        "AND id_banco=$id_bank");
        return $colocador_cue->fetch();
    }

    public function saveCuenta($id_colocador,$id_bank,$cuenta)
    {
        $this->_db->prepare(
            "INSERT INTO scg_inf_ban_col(id_colocador,id_banco,nro_cuenta) " .
            "VALUES (:id_colocador, :id_banco, :nro_cuenta)")
            ->execute(
                array(':id_colocador' => $id_colocador,
                    ':id_banco' => $id_bank,
                    ':nro_cuenta' => $cuenta
                ));
    }

    public function dropCuenta($id_colocador,$id_bank,$cuenta)
    {
        $id_colocador = (int) $id_colocador;
        $id_bank = (int) $id_bank;
        $cuenta = trim($cuenta);
        $this->_db->query("DELETE FROM scg_inf_ban_col WHERE id_colocador=$id_colocador AND " .
        "id_banco=$id_bank AND nro_cuenta='$cuenta'");
    }

    public function verificarCuenta($id_bank,$cuenta)
    {
        $id = $this->_db->query(
            "SELECT id_banco FROM scg_inf_ban_col WHERE id_banco='$id_bank' " .
            "AND nro_cuenta='$cuenta'"
        );

        if($id->fetch()){
            return true;
        }

        return false;
    }

    public function verificarEmail($email)
    {
        $id = $this->_db->query(
            "SELECT id_colocador FROM scg_colocador_div WHERE email='$email'"
        );

        if($id->fetch()){
            return true;
        }

        return false;
    }

} 