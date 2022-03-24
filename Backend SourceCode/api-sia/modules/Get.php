<?php
	class Get {
		protected $pdo, $gm;

		public function __construct(\PDO $pdo) {
			$this->gm = new GlobalMethods($pdo);
			$this->pdo = $pdo;
		}

		public function getStudents($dt) {
			$payload = [];
			$code = 404;
			$remarks = "failed";
			$message = "Unable to retrieve data";

			$sql = "SELECT * FROM students_tbl";
			if ($dt!=null) {
				$sql.=" WHERE recno_fld=$dt";
			}

			$res = $this->gm->executeQuery($sql);
			if ($res['code']==200) {
				$payload = $res['data'];
				$code = 200;
				$remarks = "success";
				$message = "Successfully retrieved requested records";
			}
			return $this->gm->response($payload, $remarks, $message, $code);
		}
	}
?>