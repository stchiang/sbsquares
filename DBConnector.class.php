<?php
	class DBConnector {

		private $_query;
		private $_link;

		public function __construct($link) {
			$this->_link = $link;
			if (!$link) {
				die ("MySQL connection error: " . mysqli_connect_error());
			}
		}

		public function query($query) {
			$this->_query = $query;
			return mysqli_query($this->_link, $query);
		}

		public function fetchArray($result) {
			return mysqli_fetch_array($result);
		}

		public function close() {
			mysqli_close($this->_link);
		}

	}
?>