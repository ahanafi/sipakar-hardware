<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi_model extends Main_model
{
	protected $table = 'konsultasi';

	//Related tables
	private $_PERANGKAT_KERAS = 'jenis_perangkat_keras',
			$_KERUSAKAN = 'kerusakan';

	//FOREIGN KEY
	private $_ID_PERANGKAT_KERAS = 'id_perangkat_keras',
			$_ID_KERUSAKAN = 'id_kerusakan';

	private function getColumns()
    {
        $columns = $this->table . ".*, $this->_KERUSAKAN.nama_kerusakan AS kerusakan, ";
        $columns .= $this->_PERANGKAT_KERAS . ".nama_perangkat_keras AS perangkat_keras";

        return $columns;
    }

    private function getJoinQueries($where = [])
    {
        $joinTo = " JOIN $this->_PERANGKAT_KERAS USING ($this->_ID_PERANGKAT_KERAS) ";
        $joinTo .= " JOIN $this->_KERUSAKAN USING ($this->_ID_KERUSAKAN) ";

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

/* End of file Konsultasi_model.php */
