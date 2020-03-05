<?php 

    class jugadoresModel extends Model {

        public function __construct() {

            parent::__construct();
            
        }

        public function get() {
            try {
                $consultaSQL = "SELECT j.id, j.nombre, j.apellidos, e.nombrEquipo nombreEquipo, j.nacionalidad, j.fechaNac, j.draft 
                FROM jugadores j INNER JOIN equipo e ON j.equipo_id = e.id order by j.id";
    
                $pdo = $this->db->connect();
    
                $stmt = $pdo->prepare($consultaSQL);
                $stmt->setFetchMode(PDO::FETCH_OBJ);
    
                $stmt->execute();
    
                $jugadores = $stmt->fetchAll();

                // var_dump($jugadores);
                // exit(0);
    
                return $jugadores;
                
            } catch(PDOException $e) {
    
                $error = 'Error al leer registros '.$e->getMessage().' en la línea '.$e->getLine();
    
            }

    } 

    public function getJugador($id){
        try{ 
            $sql = "SELECT * FROM jugadores WHERE id = :id LIMIT 1";
            $pdo = $this->db->connect();
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            
            $jugadores = $stmt->fetch();
        return $jugadores;
        }
            
        catch (PDOException $e){
        
        exit($e->getMessage());
        }

    }

    public function getEquipos() {
        try{
            $consultaSQL = "SELECT * FROM equipo ORDER BY id";

            $pdo = $this->db->connect();

            $pdoStmt = $pdo->prepare($consultaSQL);
            $pdoStmt->setFetchMode(PDO::FETCH_OBJ);

            $pdoStmt->execute();

            $equipos = $pdoStmt->fetchAll();
            // var_dump($equipos);
            // exit(0);
            return $equipos;

        }   catch(PDOException $e) {
    
            $error = 'Error al leer registros '.$e->getMessage().' en la línea '.$e->getLine();

        }
    }
    
    public function cabeceraTabla() {
        $cabecera = [
            "Id",
            "Nombre",
            "Apellido",
            "Equipo",
            "Nacionalidad",
            "Fecha Nacimiento",
            "Draft"
        ];

        return $cabecera;
    }  

    public function getPabellon(){
        try{
            $consultaSQL = "SELECT * FROM pabellon ORDER BY id";

            $pdo = $this->db->connect();

            $pdoStmt = $pdo->prepare($consultaSQL);
            $pdoStmt->setFetchMode(PDO::FETCH_OBJ);

            $pdoStmt->execute();
            return $pdoStmt;

        }   catch(PDOException $e) {
    
            $error = 'Error al leer registros '.$e->getMessage().' en la línea '.$e->getLine();

        }
    }

    # inserta Jugador
    public function insert($jugador) {

		try 
		{
		
			$insertSQL ="

            INSERT INTO jugadores (nombre, apellidos, equipo_id, nacionalidad, fechaNac, draft)
            VALUES ( :nombre, :apellidos, :equipo_id, :nacionalidad, :fechaNac, :draft)";

            $pdo = $this->db->connect();
            $pdoStmt = $pdo->prepare($insertSQL);

			$pdoStmt->bindParam(':nombre', $jugador['nombre'], PDO::PARAM_STR, 50);
			$pdoStmt->bindParam(':apellidos', $jugador['apellidos'], PDO::PARAM_STR, 50);
			$pdoStmt->bindParam(':equipo_id', $jugador['equipo_id']);
			$pdoStmt->bindParam(':nacionalidad', $jugador['nacionalidad'], PDO::PARAM_STR, 30);
			$pdoStmt->bindParam(':fechaNac', $jugador['fechaNac']);
			$pdoStmt->bindParam(':draft', $jugador['draft']);
	
			$pdoStmt->execute();

			return 'Registro Añadido Con Éxito';
				
		} 

		catch (PDOException $e) 
		{
		
            $error = 'Error al añadir registro: ' . $e->getMessage() . " en la línea: " . $e->getLine();
			return $error;
		}

        
    }
}
?>  