<?php  

class Data_model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	public function search(){
		$q = $this->input->post('nama');
		$this->db->like('nama',$q);
		return $this->db->get('pamsimas')->result_array();
	}

	public function create($no){
		$data = array(
			'no' => $no,
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'nopel' => $no,
			'gol' => $this->input->post('gol')
		);
		return $this->db->insert('pamsimas',$data);
	}

	public function get_data($no){
		$q = $this->db->get_where('pamsimas', array('no' => $no));
		return $q->row_array();
	}

	public function new(){
		$last_row = $this->db->order_by('no',"desc")
            ->limit(1)
            ->get('pamsimas');
		$data['terakhir'] = $last_row->row_array();
		//return $data['terakhir'];
		$this->db->select('alamat');
		$result = $this->db->get('pamsimas')->result_array();
		$arr = array_map (function($value){
    		return $value['alamat'];
		} , $result);
 		$data['alamat'] = array_unique($arr);
		return $data;
	}

	public function update_data($no){
		$data = array();
		$jumlah = count($this->input->post());
		for ($i=0; $i < $jumlah; $i++) { 
			$data['`'.$i.'`'] = $this->input->post($i);
		}
		$this->db->where('no', $no);
		$this->db->update('pamsimas', $data);
		return $this->db->affected_rows();
	}
}

?>