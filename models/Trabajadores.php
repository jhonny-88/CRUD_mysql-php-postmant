<?php
    class Trabajadores extends Conectar{
        public function get_trabajadores(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM trabajadores WHERE estado = 1";
            $sql = $conectar -> prepare($sql);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function get_trabajadores_x_id($tra_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM trabajadores WHERE estado = 1 AND tra_id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $tra_id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_trabajadores($tra_nombres,$tra_apellidos,$tra_cedula){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO trabajadores(tra_id,tra_nombres,tra_apellidos,tra_cedula,estado) VALUES (NULL,?,?,?,'1');";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $tra_nombres);
            $sql -> bindValue(2, $tra_apellidos);
            $sql -> bindValue(3, $tra_cedula);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_trabajadores($tra_id,$tra_nombres,$tra_apellidos,$tra_cedula){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE trabajadores set tra_nombres = ?, tra_apellidos = ?, tra_cedula = ? WHERE tra_id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $tra_nombres);
            $sql -> bindValue(2, $tra_apellidos);
            $sql -> bindValue(3, $tra_cedula);
            $sql -> bindValue(4, $tra_id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_trabajadores($tra_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE trabajadores set estado = '0' WHERE tra_id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1, $tra_id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>