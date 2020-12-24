<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    
    public function getAll()
    {   
        $query = $this->db->query(" select * from tb_user_role");
        $data = [];
        foreach($query->result() as $d) {
            $data[] = $d;
        }  
        return $data;
    }
    
    public function getById($id)
    {
        $query = $this->db->query(" select * from tb_user_role where id_pegawai='$id'");
        foreach($query->result() as $d) {
            $data = $d;
        }  
        return $data;
    }

    public function save($id_pegawai,$nik,$id_level,$description,$full_name,$status)
    {
        $this->db->query(" insert into tb_user_role (
            `id_pegawai`,
            `nik`,
            `id_level`,
            `description`,
            `full_name`,
            `status`
        ) values (
            '$id_pegawai',
            '$nik',
            '$id_level',
            '$description',
            '$full_name',
            '$status'
        ) ");
    }

    public function update($id_pegawai,$id_level,$desc,$status)
    {   
        $this->db->query("
        update tb_user_role set
        id_level = '$id_level',
        description = '$desc',
        status = '$status'
        where id_pegawai = '$id_pegawai' 
        ");
    }

    public function status($id_pegawai,$status)
    {
        $this->db->query("update tb_user_role set status = '$status' where id_pegawai = '$id_pegawai'");
    }
}