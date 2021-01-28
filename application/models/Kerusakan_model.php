<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kerusakan_model extends Main_model
{
	protected $table = 'kerusakan';

	//Related tables
	private $_PERANGKAT_KERAS = 'jenis_perangkat_keras';

	//FOREIGN KEY
	private $_ID_PERANGKAT_KERAS = 'id_perangkat_keras';

	private function getColumns()
    {
        return $this->table . ".*, $this->_PERANGKAT_KERAS.nama_perangkat_keras AS perangkat_keras";
    }

    private function getJoinQueries($where = [])
    {
        $joinTo = " JOIN $this->_PERANGKAT_KERAS USING ($this->_ID_PERANGKAT_KERAS) ";

        $columns = $this->getColumns();
        $query = "SELECT " . $columns . " FROM " . $this->table . " " . $joinTo;

        if (!empty($where)) {
			$column = array_keys($where)[0];
			$value = array_values($where)[0];

			$query .= " WHERE $column = '$value' ";
        }

        return $query;
    }

    public function all()
    {
        $query = $this->getJoinQueries();
        return $this->db->query($query)->result();
    }

    public function findById($where = [], $all = false)
    {
        $query = $this->getJoinQueries($where);

        if ($all == true) {
            return $this->db->query($query)->result();
        }
        return $this->db->query($query)->row();
    }
}

/* End of file Kerusakan_model.php */
