<?php

    class Restaurante{

        public function InsertarRestaurante($nombre,$ubicacion,$telefono,$categoria){

            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("INSERT INTO Restaurante
            (Nombre,Ubicacion,Telefono,Categoria)values(:nombre,:ubicacion,:telefono,:categoria)");
            $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $consulta->bindParam(":ubicacion",$ubicacion,PDO::PARAM_STR);
            $consulta->bindParam(":telefono",$telefono,PDO::PARAM_STR);
            $consulta->bindParam(":categoria",$categoria,PDO::PARAM_STR);
            $consulta->execute();
            return 1;
        }

        public function ConsultarRestaurante(){

            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("SELECT * FROM Restaurante");
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            return $consulta->fetchAll();

            
            
            
        }
        public function ConsultarRestauranteporID($Id){
            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("SELECT * FROM Restaurante WHERE IdRest=:Id");
            $consulta->bindParam(":Id",$Id,PDO::PARAM_STR);
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            return $consulta->fetchAll();
        }
        

        public function ModificarRestaurante($Id,$nombre,$ubicacion,$telefono,$categoria){

            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("UPDATE Restaurante SET Nombre=:nombre,
            Ubicacion=:ubicacion,Telefono=:telefono,Categoria=:categoria WHERE IdRest=:Id");
            $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $consulta->bindParam(":ubicacion",$ubicacion,PDO::PARAM_STR);
            $consulta->bindParam(":telefono",$telefono,PDO::PARAM_STR);
            $consulta->bindParam(":categoria",$categoria,PDO::PARAM_STR);
            $consulta->bindParam(":Id",$Id,PDO::PARAM_STR);
            $consulta->execute();
            return 1;
        }

        public function EliminarRestaurante($Id){

            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("DELETE FROM Restaurante WHERE IdRest=:Id");
            $consulta->bindParam(":Id",$Id,PDO::PARAM_STR);
            $consulta->execute();
            return 1;
        }
    }

    try{
        $server=new SoapServer(
            null,
            ['uri'=>'http://localhost:82/RestaurantesWS/RestaurantesSW.php',]
        );
        $server->setClass('Restaurante');
        $server->handle();
    }catch (SoapFault $e){
        echo 'error:' .$e->getMessage();
        exit;
    }

?>