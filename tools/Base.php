<?php
	class Base
	{
		private $host = 'localhost';
		private $usuario = 'root';
		private $password = '';
		private $nombre_base = 'itpv';

		private $conexion;

		public function __construct()
		{
			$this->conexion = $this->conexion();
		}

		function conexion()
		{
			$dbConexion = "mysql:host=".$this->host.";dbname=".$this->nombre_base;

			try {
				$conexion = new PDO($dbConexion,$this->usuario, $this->password, array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				return $conexion;
			} catch (Exception $e) {
				print "¡Error!: " . $e->getMessage() . "<br/>";
				die();
			}

			/*
			$nombre = is_file('../data/person.db') ? '../data/person.db' : 'data/person.db' ;
			try {
				$conexion = $this->db = new PDO('sqlite:'.$nombre, '', '', array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				return $conexion;
			} catch (Exception $e) {
				print "¡Error!: " . $e->getMessage() . "<br/>";
				die();
			}*/
		}

		public function set_names()
		{
			return $this->conexion->exec("SET NAMES 'utf8'");
		}

		public function login($correo, $clave, $tipo)
		{
			$this->set_names();
			if($tipo == 'M')
				$consulta = 'select * from maestro where correo=? and clave=?';
			else
				$consulta = 'select * from alumno where correo=? and clave=?';
			$sql = $this->conexion->prepare($consulta);
			$sql->bindValue(1, $correo);
			$sql->bindValue(2, md5($clave));

			$sql->execute();

			$r = $sql->fetch(PDO::FETCH_OBJ);

			return $r == null ? false : treu;
		}

		public function getUsuario($correo, $tipo)
		{
			$this->set_names();
			if($tipo == 'M')
				$consulta = 'select * from maestro where correo=?';
			else
				$consulta = 'select * from alumno where correo=?';
			$sql = $this->conexion->prepare($consulta);
			$sql->bindValue(1, $correo);

			$sql->execute();

			return $sql->fetch(PDO::FETCH_OBJ);
		}

		public function getCursosMaestro($correo)
		{
			$this->set_names();
			$consulta = "select c.clave, c.curso, c.fecha, count(ac.correo) as no_alumnos
					from curso c left join alumno_curso ac on c.clave=ac.clave
					where c.correo = ?
					group by c.clave, c.curso, c.fecha
					order by c.fecha desc";
			$sql = $this->conexion->prepare($consulta);
			$sql->bindValue(1, $correo);

			$sql->execute();

			return $sql->fetchAll(PDO::FETCH_OBJ);
		}

		public function updateCurso($curso, $clave)
		{
			$this->set_names();
			$consulta = "update curso set curso=? where clave=?";
			$sql = $this->conexion->prepare($consulta);
			$sql->bindValue(1, $curso);
			$sql->bindValue(2, $clave);

			$sql->execute();
		}
	}