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

        $sql = "INSERT INTO lIBROS (nombre,descripcion,valor,id_categoria,id_autor,id_comentario,fecha_publicacion) values ('$nombre','$descripcion','$valor','$id_categoria','$id_autor','$id_comentario','$fecha_publicacion')";
        $res = mysqli_query($this->conn, $sql);
        var_dump($res);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    function traerLibros()
    {
        $sql = "SELECT libros.id, libros.nombre as nombre, imagen, categorias.nombre as categoria, autores.nombre as nombre_autor, autores.apellido as apellido_autor, comentarios.descripcion as comentario, libros.descripcion as descripcion, libros.valor as valor, libros.fecha_publicacion as fecha_publicacion FROM libros 
        INNER JOIN categorias on categorias.id = libros.id_categoria 
        INNER JOIN comentarios on comentarios.id = libros.id_comentario 
        INNER JOIN autores on autores.id = libros.id_autor
        ";
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

        $foto = '';
if (isset($_FILES['imagen'])) {
  $errors = array();
  $file_name = str_replace(' ', '', $_FILES['imagen']['name']);
  $file_tmp = $_FILES['imagen']['tmp_name'];
  $foto = $file_name;
  
  move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . '/bictia/images/' . $foto);
}

        $sql = "UPDATE Libros SET nombre = '$nombre', id_autor ='$id_autor', id_categoria= '$id_categoria', id_comentario = '$id_comentario', descripcion = '$descripcion', valor = '$valor', fecha_publicacion = '$fecha_publicacion', imagen='$foto' WHERE id = $id";
        $update = mysqli_query($this->conn, $sql);
        var_dump($foto);
        echo  $sql;
        if ($update) {
            return true;
        } else {
            return false;
        }
    }
}