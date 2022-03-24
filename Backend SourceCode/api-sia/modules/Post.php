<?php 
	class Post {
		protected $pdo, $gm, $get;

		public function __construct(\PDO $pdo) {
			$this->gm = new GlobalMethods($pdo);
			$this->get = new Get($pdo);
			$this->pdo = $pdo;
		}

		public function addStudent($dt) {
			$payload = [];
			$code = 404;
			$remarks = "failed";
			$message = "Unable to save data";

			$students = $dt->students;
			$accounts = $dt->accounts;

			$sql = "SELECT accountsctr_fld FROM settings_tbl";
			$res = $this->gm->executeQuery($sql);

			$ctr = $res['data'][0]['accountsctr_fld'];

			$newStudNum = date("Y").$ctr;
			$students->studnum_fld = $newStudNum;
			$accounts->studnum_fld = $newStudNum;

			try {
				$this->pdo->beginTransaction();

				$studentsSQL = "INSERT INTO students_tbl(studnum_fld, fname_fld, mname_fld, lname_fld, extname_fld, dept_fld, program_fld) VALUES (?, ?, ?, ?, ?, ?, ?)";
				$studentsSQL = $this->pdo->prepare($studentsSQL);
				$studentsSQL->execute([$students->studnum_fld, $students->fname_fld, $students->mname_fld, $students->lname_fld, $students->extname_fld, $students->dept_fld, $students->program_fld]);

				$accountsSQL = "INSERT INTO accounts_tbl(studnum_fld, pword_fld) VALUES (?, ?)";
				$accountsSQL = $this->pdo->prepare($accountsSQL);
				$accountsSQL->execute([$accounts->studnum_fld, $accounts->pword_fld]);

				$settingsSQL = "UPDATE settings_tbl SET accountsctr_fld=accountsctr_fld+1";
				$settingsSQL = $this->pdo->prepare($settingsSQL);
				$settingsSQL->execute();

				$this->pdo->commit();

				$code = 200;
				$remarks = "success";
				$message = "Successfully retrieved requested records";
				return $this->get->getStudents(null);

			} catch (\PDOException $er) {
				$this->pdo->rollback();
				throw $er;
			}

			return $this->gm->response($payload, $remarks, $message, $code);
		}

		public function updateStudent($dt, $studnum) {
			$payload = [];
			$code = 404;
			$remarks = "failed";
			$message = "Unable to save data";
			$res = $this->gm->update("students_tbl", $dt, "studnum_fld='$studnum'");
			if ($res['code']==200) {
				$code = 200;
				$remarks = "success";
				$message = "Successfully retrieved requested records";
				return $this->get->getStudents(null);
			}
			return $this->gm->response($payload, $remarks, $message, $code);
		}
	}
?>