<?php

namespace App\Models;

use CodeIgniter\Model;

class bkkmodel extends Model

{
    protected $allowedFields = []; 

    public function query($query)
{
    return $this->db->query($query)
                      ->getResult();

}

	public function tampil($tabel){
     return $this->db->table($tabel)  
     				 ->get()
          			 ->getResult();   
	}

    public function tampil2($tabel) {
        return $this->db->table($tabel)
                         ->where('deleted_at', NULL) 
                         ->get()
                         ->getResult();
    }

   
	public function tambah($tabel,$isi){
		return $this->db->table($tabel)
						->insert($isi);
	}

	public function hapus($tabel,$where){
        return $this->db->table($tabel)
                        ->delete($where);
    }
    public function edit($tabel,$isi,$where){
        return $this->db->table($tabel)
                        ->update($isi,$where);
    }

    public function getWhere($tabel,$where){
        return $this->db->table($tabel)
                        ->getwhere($where)
                        ->getRow();
    }

    public function getWhereAll($tabel, $where)
{
    return $this->db->table($tabel)
                    ->where($where)
                    ->get()
                    ->getResult(); // Multiple rows result
}


    public function getLogData()
    {
        $builder = $this->db->table('log');
        $builder->select('log.*, user.username');
        $builder->join('user', 'log.id_user = user.id_user');
        $builder->orderBy('time', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getTotalLogs()
    {
        return $this->db->table('log')->countAllResults();
    }
    
    public function logActivity($data)
    {
        return $this->db->table('log')->insert($data);
    }
    
    public function getBackupData()
{
    return $this->db->table('user_backup')->get()->getResult();
}

public function getProductById($id) {
    return $this->db->table('user')->where('id_user', $id)->get()->getRowArray();
}

public function getPerusahaanWithLowongan()
{
    $query = $this->db->table('perusahaan')
        ->select('perusahaan.id_perusahaan, perusahaan.nama_perusahaan, perusahaan.deskripsi, perusahaan.foto, COUNT(lowongan.id_lowongan) as jumlah_lowongan')
        ->join('lowongan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan', 'right') 
        ->groupBy('perusahaan.id_perusahaan')  
        ->get();

   
    if ($query) {
        return $query->getResultArray();
    } else {
        return false;
    }
}

public function getLowonganByKategori($kategori)
{
    return $this->db->table('lowongan')
        ->select('lowongan.id_lowongan, lowongan.id_perusahaan, lowongan.pekerjaan, lowongan.deskripsi, lowongan.persyaratan, lowongan.deadline, lowongan.kategori, perusahaan.nama_perusahaan')
        ->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan')
        ->where('lowongan.kategori', $kategori)
        ->get()
        ->getResultArray();
}

public function getJobById($id)
    {
        return $this->db->table('lowongan')
            ->select('lowongan.id_lowongan, lowongan.id_perusahaan, lowongan.pekerjaan, lowongan.deskripsi, lowongan.persyaratan, lowongan.deadline, lowongan.kategori, perusahaan.nama_perusahaan')
            ->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan')
            ->where('lowongan.id_lowongan', $id)
            ->get()
            ->getRowArray();
    }

    public function searchCompanies($searchTerm)
    {
        return $this->db->table('perusahaan')
                        ->like('nama_perusahaan', $searchTerm)
                        ->get()
                        ->getResult(); // Multiple rows result
    }
    
    public function insertLowongan($data)
{
    return $this->db->table('lowongan')->insert($data);
}

public function getLamaranByPerusahaan($id_perusahaan)
{
    return $this->db->table('lamaran')
        ->select('lamaran.*, siswa.nama_siswa, lowongan.pekerjaan as judul_lowongan')
        ->join('lowongan', 'lamaran.id_lowongan = lowongan.id_lowongan')
        ->join('siswa', 'lamaran.id_siswa = siswa.id_siswa')
        ->join('perusahaan', 'perusahaan.id_perusahaan = lowongan.id_perusahaan')
        ->where('lowongan.id_perusahaan', $id_perusahaan)  // Filter by perusahaan
        ->where('lamaran.status', 'Sedang Diproses')  // Filter by status
        ->get()->getResult();  // Execute the query and return the result
}


public function getUserById($id_user)
{
    return $this->db->table('user')->where('id_user', $id_user)->get()->getRowArray();
}


public function resetPassword($id_user)
{
    $user = $this->getUserById($id_user);
    $newPassword = $user['username']; // Reset to username
    $this->db->table('user')->where('id_user', $id_user)->update(['password' => password_hash($newPassword, PASSWORD_BCRYPT)]);
}

public function getSiswaByUserId($id_user)
    {
        return $this->db->table('siswa')->where('id_user', $id_user)->get()->getRowArray();
    }


    public function getLevelById($id_level)
    {
        return $this->db->table('level')->where('id_level', $id_level)->get()->getRowArray();
    }


    public function getUsersWithLevels()
    {
        return $this->db->table('user')
            ->select('user.id_user, user.username, level.level') // Assuming level_name is the column in the level table
            ->join('level', 'user.id_level = level.id_level') // Adjust if needed
            ->where('deleted_at', NULL)
            ->get()
            ->getResult();
    }
    
    public function getDeletedUsers()
    {
        // Adjust this query according to your database schema
        return $this->db->table('user')
                        ->where('deleted_at IS NOT NULL')
                        ->get()
                        ->getResult(); // Assuming deleted users are marked with 'deleted_at'
    }

    public function restoreUser($id_user)
    {
        // Logic to restore the user (set deleted_at to null or delete the record)
        $this->db->table('user')
                 ->where('id_user', $id_user)
                 ->update(['deleted_at' => null]); // Assuming this restores the user
    }

    
}