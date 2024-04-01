
<?php 
	class database {
		var $_dbh = '';
		var $_sql = '';
		var $_cursor = NULL;

		public function __construct() {
			try {
				$this -> _dbh = new PDO('mysql:host=localhost;dbname=ql_nhahang', 'root', '');
				$this -> _dbh -> query('set names "utf8"');
			} catch (PDOException $ex) {
				die($ex -> getMessage());
			}
		}

		public function setQuery($sql) {
			$this -> _sql = $sql;
		}

		public function execute($options = array()) {
			$this -> _cursor = $this -> _dbh -> prepare($this -> _sql);
			if ($options) {
				for ($i=0; $i < count($options); $i++) { 
					$this -> _cursor -> bindParam($i + 1, $options[$i]);
				}
			}
			$this -> _cursor -> execute();
			return $this -> _cursor;
		}

		public function loadAllRows($options =  array()) {
			if (!$options) {
				if (!$result = $this -> execute())
					return false;
			}
			else {
				if (!$result = $this -> execute($options))
					return false;
			}
			return $result -> fetchAll(PDO::FETCH_OBJ);
		}

		public function loadRow($options =  array()) {
			if (!$options) {
				if (!$result = $this -> execute())
					return false;
			}
			else {
				if (!$result = $this -> execute($options))
					return false;
			}
			return $result -> fetch(PDO::FETCH_OBJ);
		}

		public function loadRecord($options =  array()) {
			if (!$options) {
				if (!$result = $this -> execute())
					return false;
			}
			else {
				if (!$result = $this -> execute($options))
					return false;
			}
			return $result -> fetch(PDO::FETCH_COLUMN);
		}

		public function getLastId() {
			return $this -> _dbh -> lastInsertId();
		}

		public function disconnect() {
			 $this -> _dbh = NULL;
		}
	}