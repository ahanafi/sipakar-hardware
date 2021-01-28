<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	protected $table = "";

	public function all()
	{
		$sql = $this->db->get($this->table);
		return $sql->result();
	}

	public function findById($where = [], $all = FALSE)
	{
		$sql = $this->db->where($where)->get($this->table);
		if($all == true) {
			return $sql->result();
		}
		return $sql->row();
	}

	public function getBy($column, $value, $all = FALSE)
	{
		$sql = $this->db->select('*')->from($this->table)->where($column, $value)->get();
		if ($all != FALSE) {
			$result = $sql->result();
		} else {
			$result = $sql->row();
		}
		return $result;
	}

	public function insert($data = [], $bacth = FALSE)
	{
		if ($bacth == TRUE) {
			$insert = $this->db->insert_batch($this->table, $data);
		} else {
			$insert = $this->db->insert($this->table, $data);
		}
		return $insert;
	}

	public function update($data = [], $where = [])
	{
		$column = array_keys($where)[0];
		$value = array_values($where)[0];
		return $this->db->where($column, $value)->update($this->table, $data);
	}

	public function updateBy($col, $val, $data = [])
	{
		return $this->db->where($col, $val)->update($this->table, $data);
	}

	public function delete($where = [])
	{
		$column = array_keys($where)[0];
		$value = array_values($where)[0];
		return $this->db->where($column, $value)->delete($this->table);
	}


	public function only($table, $where = NULL)
	{
		$sql = $this->db->select('*')->from($table);
		if ($where != NULL) {
			$sql->where($where);
		}
		return $sql->get()->result();
	}

	public function count()
	{
		$sql = $this->db->get($this->table);
		return $sql->num_rows();
	}

	public function sum($column, $where = NULL)
	{
		$sql = $this->db->select_sum($column)->from($this->table);
		if ($where != NULL) {
			$sql->where($where);
		}
		return $sql->get()->row();
	}

	public function getLastInsertId($id = 'id')
	{
		$sql = $this->db->select("MAX($id) as id")->from($this->table)->get()->row();
		return $sql->id;
	}

	public function getIdBy($column, $value)
	{
		$sql = $this->db->select('id')->from($this->table)->where($column, $value)->limit(1)->get();
		return $sql->row();
	}

	public function getById($id)
	{
		return $this->findById($id);
	}

	public function first()
	{
		return $this->db->limit(1)->get($this->table)->row();
	}

	public function get($rows)
	{
		$sql = $this->db->limit($rows)->get($this->table);
		return $sql->result();
	}

	public function getSumOfColumn($column, $conditions = [])
	{
		return $this->db->select_sum($column)
			->where($conditions)
			->get($this->table)->row();
	}

	public function executeQuery($query, $single = false)
	{
		$query = $this->db->query($query);
		if($single == true) {
			return $query->row();
		}
		return $query->result();
	}

}

/* End of file Main_model.php */
