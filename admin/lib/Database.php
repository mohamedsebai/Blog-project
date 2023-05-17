<?php
Class Database{
	public $host   = DB_HOST; // this from config file as define || const
	public $user   = DB_USER;
	public $pass   = DB_PASS;
	public $dbname = DB_NAME;

	public $link;
	public $error;

	public function __construct(){
		$this->connectDB();
	}

	private function connectDB(){
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if(!$this->link){
			$this->error ="Connection fail".$this->link->connect_error;
			return false;
		}
 }

	// Select or Read data

	public function select($query){
			$result = $this->link->query($query) or die($this->link->error.__LINE__); // __LINE__ for error line number
			if($result->num_rows > 0){
				return $result;
			} else {
				return false;
			}
	}

	// Insert data
	public function insert($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if(!$insert_row){
			die("Error :(".$this->link->errno.")".$this->link->error);
		}
  }

    // Update data
  	public function update($query){
			$update_row = $this->link->query($query) or die($this->link->error.__LINE__); // __LINE__ for error line number
			if(!$update_row){
				die("Error :(".$this->link->errno.")".$this->link->error);
			}
  }

  // Delete data
   public function delete($query){
			$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
  }

}
