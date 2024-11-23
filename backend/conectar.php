<?php
    function conexion()
    {
        $servername="localhost";
        $username="root";
        $password="";
        $database="ciencias_politicas";

        //Crear la conexion
        //mysqli_connect(nombreServidor,nombreUsuario,password, basededatos)
        $conn= mysqli_connect($servername,$username,$password,$database);

        //Verificar la conexion
        if(!$conn)
        {
            die("No se realizo la conexion".mysqli_connect_error());
        }
        else
        {
            return $conn;
        }
    }
?>