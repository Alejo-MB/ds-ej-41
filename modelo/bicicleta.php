<?php
require_once __DIR__ . '/../core/Database.php';

class Bicicleta {
    private const NOMBRE_CLASE = 'Bicicleta';

    public $id;
    public $marca;
    public $modelo;
    public $rodado;
    public $cantidadCambios;
    public $color;
    public $precio;

    public function __construct() {
        // Constructor vacío para que FETCH_CLASS funcione correctamente
    }

    /**
     * Obtener todas las bicicletas desde la BD
     * Usando FETCH_CLASS para mapear automáticamente a objetos Bicicleta (ORM)
     */
    public static function obtenerTodas() {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT id, marca, modelo, rodado, cantidadCambios, color, precio FROM bicicletas ORDER BY id DESC');
            $stmt->execute();

            // PDO mapea automáticamente las columnas a las propiedades de la clase
            return $stmt->fetchAll(PDO::FETCH_CLASS, self::NOMBRE_CLASE);
        } catch (PDOException $e) {
            error_log("Error al obtener bicicletas: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obtener una bicicleta por ID
     * Usando FETCH_CLASS para mapear automáticamente a objeto Bicicleta (ORM)
     */
    public static function obtenerPorId($id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT id, marca, modelo, rodado, cantidadCambios, color, precio FROM bicicletas WHERE id = :id');
            $stmt->execute([':id' => $id]);

            // PDO mapea automáticamente las columnas a las propiedades de la clase
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::NOMBRE_CLASE);
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Error al obtener bicicleta: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Agregar una nueva bicicleta
     */
    public static function agregar($marca, $modelo, $rodado, $cantidadCambios, $color, $precio) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('INSERT INTO bicicletas (marca, modelo, rodado, cantidadCambios, color, precio) VALUES (:marca, :modelo, :rodado, :cantidadCambios, :color, :precio)');

            return $stmt->execute([
                ':marca' => $marca,
                ':modelo' => $modelo,
                ':rodado' => $rodado,
                ':cantidadCambios' => $cantidadCambios,
                ':color' => $color,
                ':precio' => $precio
            ]);
        } catch (PDOException $e) {
            error_log("Error al agregar bicicleta: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Editar una bicicleta existente
     */
    public static function editar($id, $marca, $modelo, $rodado, $cantidadCambios, $color, $precio) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('UPDATE bicicletas SET marca = :marca, modelo = :modelo, rodado = :rodado, cantidadCambios = :cantidadCambios, color = :color, precio = :precio WHERE id = :id');

            return $stmt->execute([
                ':id' => $id,
                ':marca' => $marca,
                ':modelo' => $modelo,
                ':rodado' => $rodado,
                ':cantidadCambios' => $cantidadCambios,
                ':color' => $color,
                ':precio' => $precio
            ]);
        } catch (PDOException $e) {
            error_log("Error al editar bicicleta: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Eliminar una bicicleta
     */
    public static function eliminar($id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('DELETE FROM bicicletas WHERE id = :id');

            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log("Error al eliminar bicicleta: " . $e->getMessage());
            return false;
        }
    }
}
?>
