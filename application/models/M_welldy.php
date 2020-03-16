<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');
class M_welldy extends CI_Model
{
    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function get_data_where($where,$table){
        return $this->db->get_where($table,$where);
        
    }
    function get_data($table)
    {
        return $this->db->get($table);
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function calculate($nip){
        $this->db->query("insert into gaji(
            SELECT '' AS kode_sal,K.nip,K.nama,CURRENT_DATE AS rec_date,J.std_gaji+R.insentif+R.bonus AS amt FROM KARYAWAN K 
            LEFT JOIN JABATAN J ON K.kode_jab=J.kode_jab
            LEFT JOIN rule R ON K.kode_jab=R.kode_jab AND K.masa_kerja=R.masa_kerja 
            WHERE K.NIP='$nip')");
    }
}