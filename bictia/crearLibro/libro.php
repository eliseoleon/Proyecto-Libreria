<?php
include('Database.php');

class Libro
{

    /**
     * Atributos
     */
    public $id;
    public $nombre;
    public $id_autor;
    public $id_categoria;
    public $id_comentario;
    public $descripcion;
    public $valor;
    public $fecha_publicacion;
    public $urlImage;
    public $conn;
    
    /**
     * Método por donde empieza nuestra clase.
     */
    function __construct()
    {
        $db = new Database();
        $this->conn = $db->conectarse();
    }

    /**
     * Función para insertar una nueva persona.
     */
    function crearLibro($data)
    {
        $nombre = $data['nombre'];
        $id_autor = $data['id_autor'];
        $id_categoria = $data['id_categoria'];
        $id_comentario = $data['id_comentario'];
        $descripcion = $data['descripcion'];
        $valor = $data['valor'];
       
        $fecha_publicacion = $data['fecha_publicacion'];

      
        
    

 
$foto = '';
if (isset($_FILES['imagen'])) {
  $errors = array();
  $file_name = str_replace(' ', '', $_FILES['imagen']['name']);
  $file_tmp = $_FILES['imagen']['tmp_name'];
  $foto = $file_name;
  move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . '/bictia/images/' . $foto);
var_dump($foto);
  
}

        $sql = "INSERT INTO libros(nombre, descripcion, valor, id_categoria, id_autor, id_comentario, fecha_publicacion, imagen) VALUES ('$nombre','$descripcion','$valor','$id_categoria','$id_autor','$id_comentario','$fecha_publicacion','$foto')";
        $res = mysqli_query($this->conn, $sql);
        echo $sql;
        var_dump($res);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    function traerLibros()
    {
        $sql = "SELECT * from libros LIMIT 1";
        return mysqli_query($this->conn, $sql);
    }

    function traerLibro($id)
    {
        $sql = "SELECT * FROM libros WHERE id = $id";
        return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }


    function eliminarLibro($id)
    {
        $sql = " DELETE FROM Libros WHERE id = $id ";
        return mysqli_query($this->conn, $sql);
    }

    function modificarLibro($data)
    {
        $id = $data['id'];
        $nombre = $data['nombre'];
        $id_autor = $data['id_autor'];
        $id_categoria = $data['id_categoria'];
        $id_comentario = $data['id_comentario'];
        $descripcion = $data['descripcion'];
        $valor = $data['valor'];
        $fecha_publicacion = $data['fecha_publicacion'];

        $sql = "UPDATE Libros SET nombre = '$nombre', id_autor ='$id_autor', id_categoria= '$id_categoria', id_comentario = '$id_comentario', descripcion = '$descripcion', valor = '$valor', fecha_publicacion = '$fecha_publicacion' WHERE id = $id";
        $update = mysqli_query($this->conn, $sql);
        var_dump($update);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }
}