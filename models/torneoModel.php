<?php 

    class torneoModel extends Model {

        public function __construct() {

            parent::__construct();
            
        }

        public function get() {
            try {
                $consultaSQL = "SELECT * FROM torneo ORDER BY id";
    
                $pdo = $this->db->connect();
    
                $stmt = $pdo->prepare($consultaSQL);
                $stmt->setFetchMode(PDO::FETCH_OBJ);
    
                $stmt->execute();
    
                $articulos = $stmt->fetchAll();
    
                return $articulos;
                
            } catch(PDOException $e) {
    
                $error = 'Error al leer registros '.$e->getMessage().' en la línea '.$e->getLine();
    
            }
        }

        public function getCategorias() {
            try {
                $consultaSQL = "SELECT * FROM categorias ORDER BY id";
    
                $pdo = $this->db->connect();
                $stmt = $pdo->prepare($consultaSQL);
                $stmt->setFetchMode(PDO::FETCH_OBJ);
    
                $stmt->execute();
    
                return $stmt;
                
            } catch(PDOException $e) {
    
                $error = 'Error al leer registros '.$e->getMessage().' en la línea '.$e->getLine();
    
            }
        }

        
        public function cabeceraTabla() {
            $cabecera = [
                "Id",
                "Nombre",
                "Fecha de Inicio",
                "Fecha de Fin"
            ];

            return $cabecera;
        }

    }
?>  