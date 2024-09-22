<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\bkkmodel;
date_default_timezone_set('Asia/Jakarta');

class Home extends BaseController
{

	public function dashboard()
{
    $model = new bkkmodel(); 
    $id_level = session()->get('id_level');	
    $id_user = session()->get('id');

    if (!$id_level) {
        return redirect()->to('home/login');
    } 

    $data['showRegisterAlert'] = false;

    if ($id_level == 3) {
        // Get user notifications for job applications
        $data['notifications'] = $this->getNotifications();

        // Check if the student has registered
        $siswa = $model->getWhere('siswa', ['id_user' => $id_user]);  
        if (!$siswa) {
            $data['showRegisterAlert'] = true; 
        }
    }

    // Fetching the company and lowongan data
    $data['perusahaan'] = $model->getPerusahaanWithLowongan();  

    // Fetch other settings if needed
    $where = array('id_setting' => 1);
    $data['darren2'] = $model->getWhere('setting', $where);

 // Log aktivitas
 $activityLog = [
    'id_user' => session()->get('id'), // Log activity of the logged-in user
    'activity' => "Masuk Dashboard",
    'time' => date('Y-m-d H:i:s')
];
$model->logActivity($activityLog);
    echo view('header', $data);
    echo view('menu', $data); 
    echo view('dashboard', $data); 
    echo view('footer');
}


public function registerSiswa()
    {
        $id_level = session()->get('id_level');	
        $id_user = session()->get('id');
    
        if (!$id_level) {
            return redirect()->to('home/login');
        } 
        $model = new bkkmodel();
        $where = array('id_setting' => '1');
    $data['darren2'] = $model->getwhere('setting', $where);
     // Log aktivitas
     $activityLog = [
        'id_user' => session()->get('id'), // Log activity of the logged-in user
        'activity' => "Register sebagai Siswa",
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
        echo view('header',$data);
        echo view('registersiswa');
        echo view('footer');
    }

    public function lowongan()
    {
        $model = new bkkmodel();
        $id_level = session()->get('id_level');
        
        if (!$id_level) {
            return redirect()->to('home/login');
        } else {
            $data['fulltime'] =  $model->getLowonganByKategori('Full-time');
            $data['parttime'] =  $model->getLowonganByKategori('Part-time');
            $data['internship'] =  $model->getLowonganByKategori('Internship');
            
            $where = array('id_setting' => '1');
            $data['darren2'] = $model->getwhere('setting', $where);
            $activityLog = [
                'id_user' => session()->get('id'), // Log activity of the logged-in user
                'activity' => "Masuk menu Lowongan",
                'time' => date('Y-m-d H:i:s')
            ];
            $model->logActivity($activityLog);
            echo view('header',$data);
            echo view('menu',$data);
            echo view('lowongan', $data);
            echo view('footer');
        }
    }
    
	public function login()
	{
        $model = new bkkmodel();
        $where = array('id_setting' => 1);
        $data['darren2'] = $model->getWhere('setting', $where);

		echo view('header',$data);
		echo view('login',$data);
	}

    public function error404()
	{
        $model = new bkkmodel();
        $where = array('id_setting' => '1');
        $data['darren2'] = $model->getwhere('setting', $where);
		echo view('header',$data);
		echo view('error404');
	}

	public function aksi_login()
{
    $model = new bkkmodel();
    $name = $this->request->getPost('username');
    $pw = $this->request->getPost('password');
    $captchaResponse = $this->request->getPost('g-recaptcha-response');
    $backupCaptcha = $this->request->getPost('backup_captcha');

    $secretKey = '6LdFhCAqAAAAAM1ktawzN-e2ebDnMnUQgne7cy53';
    $recaptchaSuccess = false;

    if ($this->isInternetAvailable()) {
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captchaResponse");
        $responseKeys = json_decode($response, true);
        $recaptchaSuccess = $responseKeys["success"];
    }
    
    if ($recaptchaSuccess) {
        $hashedPassword = md5($pw);
        $where = [
            'username' => $name,
            'password' => $hashedPassword
        ];

        $check = $model->getWhere('user', $where);

        if ($check) {
            session()->set('username', $check->username);
            session()->set('id', $check->id_user);
            session()->set('id_level', $check->id_level);
            session()->set('foto', $check->foto);

            $id_user = session()->get('id');

            if ($check->id_level == 2) {
                // Check if this user has an associated company
                $company = $model->getWhere('perusahaan', ['id_user' => $id_user]);

                if ($company) {
                    return redirect()->to('home/detailperusahaan/' . $company->id_perusahaan);
                } else {
                    // Redirect to view to add new company data
                    return redirect()->to('home/addperusahaan')->with('message', 'Please add your company details.');
                }
            }

            // Log activity and redirect for other levels
            $activityLog = [
                'id_user' => $id_user,
                'activity' => 'Login',
                'time' => date('Y-m-d H:i:s')
            ];
            $model->logActivity($activityLog);

            return redirect()->to('home/dashboard');
        } else {
            return redirect()->to('home/login')->with('error', 'Invalid username or password.');
        }
    } else {
        // Handle backup CAPTCHA logic here
        return $this->handleBackupCaptchaLogin($model, $name, $pw, $backupCaptcha);
    }
}

private function handleBackupCaptchaLogin($model, $name, $pw, $backupCaptcha)
{
    $storedCaptcha = session()->get('captcha_code');

    if ($storedCaptcha !== null && $storedCaptcha === $backupCaptcha) {
        $where = ['username' => $name, 'password' => $pw];
        $check = $model->getWhere('user', $where);

        if ($check) {
            session()->set('username', $check->username);
            session()->set('id', $check->id_user);
            session()->set('id_level', $check->id_level);

            $id_user = session()->get('id');

            if ($check->id_level == 2) {
                // Check if user has an associated company
                $company = $model->getWhere('perusahaan', ['id_user' => $id_user]);

                if ($company) {
                    return redirect()->to('home/detailperusahaan/' . $company->id_perusahaan);
                } else {
                    return redirect()->to('home/addperusahaan')->with('message', 'Please add your company details.');
                }
            }

            // Log activity and redirect for other levels
            $activityLog = [
                'id_user' => $id_user,
                'activity' => 'Login',
                'time' => date('Y-m-d H:i:s')
            ];
            $model->logActivity($activityLog);

            return redirect()->to('home/dashboard');
        } else {
            return redirect()->to('home/login')->with('error', 'Invalid username or password.');
        }
    } else {
        return redirect()->to('home/login')->with('error', 'Invalid CAPTCHA.');
    }
}


private function isInternetAvailable()
{
	$connected = @fsockopen("www.google.com", 80); 
	if ($connected){
		fclose($connected);
		return true;
	}
	return false;
}
public function generateCaptcha()
{
	$code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

	// Store the CAPTCHA code in the session
	session()->set('captcha_code', $code);

	// Generate the image
	$image = imagecreatetruecolor(120, 40);
	$bgColor = imagecolorallocate($image, 255, 255, 255);
	$textColor = imagecolorallocate($image, 0, 0, 0);

	imagefilledrectangle($image, 0, 0, 120, 40, $bgColor);
	imagestring($image, 5, 10, 10, $code, $textColor);

	// Set the content type header - in this case image/png
	header('Content-Type: image/png');

	// Output the image
	imagepng($image);

	// Free up memory
	imagedestroy($image);
}

public function logout()
{
	$model = new bkkmodel();
	session()->destroy();
	
	$id_user = session()->get('id');
    $activityLog = [
        'id_user' => $id_user,
        'activity' => 'Logout',
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
	return redirect()->to('home/login');
}

public function buatlamaran($id)
{
    $id_level = session()->get('id_level');	
    if (!$id_level) {
        return redirect()->to('home/login');
    } else {
        $data = [
            'id_lowongan' => $id
        ];
        $model = new bkkmodel();
        $where = array('id_setting' => '1');
        $data['darren2'] = $model->getwhere('setting', $where);
        echo view('header',$data);
        echo view('menu',$data);
        echo view('buatlamaran', $data); 
        echo view('footer');
    }
}


public function simpanlamaran()
{
    $model = new bkkmodel(); 
    $id_user = session()->get('id');
    $siswa = $model->getWhere('siswa', ['id_user' => $id_user]);  

    if (!$siswa) {
        return redirect()->back()->with('error', 'Data siswa tidak ditemukan, silakan periksa kembali.');
    }

    $id_siswa = $siswa->id_siswa;
    $id_lowongan = $this->request->getPost('id_lowongan');
    $phone = $this->request->getPost('phone');
    $email = $this->request->getPost('email');
    $pengalaman = $this->request->getPost('pengalaman') . ' tahun'; 

    // Get id_perusahaan from the job listing
    $lowongan = $model->getWhere('lowongan', ['id_lowongan' => $id_lowongan]);
    $id_perusahaan = $lowongan->id_perusahaan;

    // Handle cover letter upload
    $cover_letter_option = $this->request->getPost('cover_letter_option');
    $lamaran = null;
    if ($cover_letter_option === 'manual') {
        $lamaran = $this->request->getPost('cover_letter');
    } elseif ($cover_letter_option === 'upload') {
        $cover_letter_file = $this->request->getFile('cover_letter_file');
        if ($cover_letter_file->isValid() && !$cover_letter_file->hasMoved()) {
            // Use the original file name
            $cover_letter_file->move(ROOTPATH . 'public/images/lamaran/', $cover_letter_file->getName());
            $lamaran = $cover_letter_file->getName(); 
        }
    }

    // Handle resume upload
    $resume_option = $this->request->getPost('resume_option');
    $cv = null;
    if ($resume_option === 'manual') {
        $cv = $this->request->getPost('resume');
    } elseif ($resume_option === 'upload') {
        $resume_file = $this->request->getFile('resume_file');
        if ($resume_file->isValid() && !$resume_file->hasMoved()) {
            // Use the original file name
            $resume_file->move(ROOTPATH . 'public/images/cv/', $resume_file->getName());
            $cv = $resume_file->getName(); 
        }
    }

    // Prepare data for inserting into the 'lamaran' table
    $data = [
        'id_siswa' => $id_siswa,
        'id_lowongan' => $id_lowongan,
        'id_perusahaan' => $id_perusahaan, // Store the company ID from the job listing
        'tanggal' => date('Y-m-d'), 
        'status' => 'Sedang Diproses', 
        'no_hp' => $phone,
        'email' => $email,
        'lamaran' => $lamaran, 
        'cv' => $cv, 
        'pengalaman' => $pengalaman
    ];

    $model->tambah('lamaran', $data);
    $activityLog = [
        'id_user' => session()->get('id'), // Log activity of the logged-in user
        'activity' => "Membuat Lamaran",
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
    return redirect()->to('home/dashboard')->with('success', 'Lamaran berhasil dikirim');
}




public function simpanSiswa()
{

    $model = new bkkmodel();

    $id_user = session()->get('id');
    $nama = $this->request->getPost('nama_siswa');
    $tanggal = $this->request->getPost('tanggal_lahir');
    $jurusan = $this->request->getPost('jurusan');
    $keterampilan = $this->request->getPost('keterampilan');
   
    $data = [
        'id_user' => $id_user,
        'nama_siswa' => $nama,
        'tanggal_lahir' => $tanggal, 
        'jurusan' => $jurusan, 
        'keterampilan' => $keterampilan
      
    ];
    $activityLog = [
        'id_user' => session()->get('id'), // Log activity of the logged-in user
        'activity' => "Menyimpan data Siswa",
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
    if ($model->tambah('siswa', $data)) {
        return redirect()->to('home/dashboard')->with('success', 'Data siswa berhasil disimpan.');
    } else {
        return redirect()->back()->with('error', 'Gagal menyimpan data siswa. Silakan coba lagi.');
    }
}

public function detailPerusahaan($id_perusahaan)
{
    $model = new bkkmodel(); 
    $perusahaan = $model->getWhere('perusahaan', ['id_perusahaan' => $id_perusahaan]);
    $lowongan = $model->getWhereAll('lowongan', ['id_perusahaan' => $id_perusahaan]);

    $data = [
        'perusahaan' => $perusahaan,
        'lowongan' => $lowongan
    ];
 
    $model = new bkkmodel();
        $where = array('id_setting' => '1');
        $data['darren2'] = $model->getwhere('setting', $where);
    echo view('header',$data);          
    echo view('menu',$data);         
    echo view('detailperusahaan', $data);  
    echo view('footer');       
}

public function detailPerusahaan2($id_user)
{
    $model = new bkkmodel(); 

    // Ambil perusahaan berdasarkan id_user yang sedang login
    $perusahaan = $model->getWhere('perusahaan', ['id_user' => $id_user]);

    // Pastikan ada perusahaan yang ditemukan
    if (empty($perusahaan)) {
        return redirect()->to('home/error404')->with('error', 'Perusahaan tidak ditemukan.');
    }

    // Ambil lowongan yang terkait dengan perusahaan
    $lowongan = $model->getWhereAll('lowongan', ['id_perusahaan' => $perusahaan->id_perusahaan]); // Ganti perusahaan[0] dengan perusahaan

    $data = [
        'perusahaan' => $perusahaan, // Ambil detail perusahaan
        'lowongan' => $lowongan
    ];
    $model = new bkkmodel();
    $where = array('id_setting' => '1');
    $data['darren2'] = $model->getwhere('setting', $where);
    echo view('header',$data);          
    echo view('menu',$data);         
    echo view('detailperusahaan', $data);  
    echo view('footer');       
}



public function setting()
{
    $id_level = session()->get('id_level');    
    if (!$id_level) {
        return redirect()->to('home/login');
    } elseif ($id_level != 1) {
        return redirect()->to('home/error404'); 
    } else {
        $model = new bkkmodel();
        $where = array('id_setting' => 1);
        $data['darren2'] = $model->getWhere('setting', $where);


        $id_user = session()->get('id');
        $activityLog = [
            'id_user' => $id_user,
            'activity' => 'Masuk Menu Setting',
            'time' => date('Y-m-d H:i:s')
        ];
        $model->logActivity($activityLog);

        echo view('header', $data);
        echo view('menu', $data);
        echo view('setting', $data);
        echo view('footer');
    }
}


    public function editsetting()
{
    $model = new bkkmodel();
    $a = $this->request->getPost('namaweb');
    $tab = $this->request->getFile('tab');
    $menu = $this->request->getFile('menu');
    $login = $this->request->getFile('login');

    // Simpan nama website
    $data = ['namawebsite' => $a];

    // Proses upload untuk tab icon
    if ($tab && $tab->isValid() && !$tab->hasMoved()) {
        $tab->move(ROOTPATH . 'public/images/logo/', $tab->getName());
        $data['icontab'] = $tab->getName(); // Simpan nama file tab icon ke $data
    }

    // Proses upload untuk menu icon
    if ($menu && $menu->isValid() && !$menu->hasMoved()) {
        $menu->move(ROOTPATH . 'public/images/logo/', $menu->getName());
        $data['iconmenu'] = $menu->getName(); // Simpan nama file menu icon ke $data
    }

    // Proses upload untuk login icon
    if ($login && $login->isValid() && !$login->hasMoved()) {
        $login->move(ROOTPATH . 'public/images/logo/', $login->getName());
        $data['iconlogin'] = $login->getName(); // Simpan nama file login icon ke $data
    }

    // Update data ke database
    $where = ['id_setting' => 1];
    $model->edit('setting', $data, $where); 

    $activityLog = [
        'id_user' => session()->get('id'), // Log activity of the logged-in user
        'activity' => "Edit Setting",
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
    return redirect()->to('home/setting');
}

public function logActivity()
{
    $model = new bkkmodel(); 
    $logs = $model->getLogData(); 
    $totalLogs = $model->getTotalLogs();
    
    foreach ($logs as &$log) {
        $user = $model->getWhere('user', ['id_user' => $log->id_user]);
        $log->username = $user ? $user->username : 'Unknown';
    }
    $where = array('id_setting' => 1);
    $data['darren2'] = $model->getwhere('setting', $where);

    $id_user = session()->get('id');
    $activityLog = [
        'id_user' => $id_user,
        'activity' => 'Masuk Log Activity',
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
    echo view('header',$data);
    echo view('menu',$data);
    echo view('log_activity', ['logs' => $logs, 'totalLogs' => $totalLogs]);
    echo view('footer');
}

public function addperusahaan()
{
    
    $id_level = session()->get('id_level');	
    if (!$id_level) {
        return redirect()->to('home/login');
    } else {
        $model = new bkkmodel();
        $where = array('id_setting' => '1');
        $data['darren2'] = $model->getwhere('setting', $where);
        echo view('header',$data);
        echo view('addperusahaan'); 
        echo view('footer');
    }
}


public function savePerusahaan()
{
    $model = new bkkmodel();
    $id_user = session()->get('id');
    $id_level = session()->get('id_level');

    if ($id_level != 2) {
        return redirect()->to('home/error404');
    }

    $nama_perusahaan = $this->request->getPost('nama_perusahaan');
    $alamat = $this->request->getPost('alamat');
    $kontak = $this->request->getPost('kontak');
    $deskripsi = $this->request->getPost('deskripsi');
    
    // Handle file upload
    $file = $this->request->getFile('foto');
    if ($file->isValid() && !$file->hasMoved()) {
        $ext = $file->getClientExtension();
        $newName = $file->getRandomName();

        // Ensure only jpg, jpeg, png are allowed
        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
            $file->move(FCPATH . 'images/perusahaan', $newName);
        } else {
            return redirect()->back()->with('error', 'Format gambar harus jpg, jpeg, atau png.');
        }
    } else {
        return redirect()->back()->with('error', 'Upload foto gagal.');
    }

    // Insert company data into the 'perusahaan' table
    $data = [
        'id_user' => $id_user,
        'nama_perusahaan' => $nama_perusahaan,
        'alamat' => $alamat,
        'kontak' => $kontak,
        'deskripsi' => $deskripsi,
        'foto' => $newName,
    ];

    $insert = $model->tambah('perusahaan', $data);
    $activityLog = [
        'id_user' => session()->get('id'), // Log activity of the logged-in user
        'activity' => "Mendaftarkan Perusahaan",
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
    if ($insert) {
        // Get the ID of the newly inserted company
        $id_perusahaan = $model->insertID();

        // Redirect to the detail page of the newly added company
        return redirect()->to('home/detailPerusahaan/' . $id_perusahaan)->with('success', 'Data perusahaan berhasil ditambahkan.');
    } else {
        return redirect()->back()->with('error', 'Gagal menyimpan data perusahaan.');
    }
}


public function addLowongan($id_perusahaan)
{
    $id_user = session()->get('id');
    $id_level = session()->get('id_level');

    // Ensure user is the owner of the company and has id_level = 2
    $model = new bkkmodel();
    $company = $model->getWhere('perusahaan', ['id_perusahaan' => $id_perusahaan, 'id_user' => $id_user]);

    if ($id_level == 2 && $company) {
        echo view('header');
        echo view('menu');
        echo view('addlowongan', ['id_perusahaan' => $id_perusahaan]);
        echo view('footer');
    } else {
        return redirect()->to('home/error404');
    }
}

public function saveLowongan()
{
    // Load the model
    $model = new bkkmodel();
    
    // Get the current user's ID and level
    $id_user = session()->get('id');
    $id_level = session()->get('id_level');
    
    // Validate the user's access (must be id_level = 2 to add lowongan)
    if ($id_level != 2) {
        return redirect()->to('home/dashboard')->with('error', 'Anda tidak memiliki izin untuk menambahkan lowongan.');
    }
    
    // Get the posted data from the form
    $id_perusahaan = $this->request->getPost('id_perusahaan');
    $pekerjaan = $this->request->getPost('pekerjaan');
    $deskripsi = $this->request->getPost('deskripsi');
    $persyaratan = $this->request->getPost('persyaratan');
    $deadline = $this->request->getPost('deadline');
    $kategori = $this->request->getPost('kategori'); // Added kategori field

    // Validate the necessary fields
    if (empty($pekerjaan) || empty($deskripsi) || empty($persyaratan) || empty($deadline) || empty($kategori)) {
        return redirect()->back()->with('error', 'Semua bidang harus diisi.')->withInput();
    }

    // Validate that the company belongs to the logged-in user
    $company = $model->getWhere('perusahaan', ['id_perusahaan' => $id_perusahaan, 'id_user' => $id_user]);

    if (!$company) {
        return redirect()->to('home/dashboard')->with('error', 'Anda tidak memiliki izin untuk menambahkan lowongan ke perusahaan ini.');
    }

    // Prepare data to insert into 'lowongan' table
    $data = [
        'id_perusahaan' => $id_perusahaan,
        'pekerjaan' => $pekerjaan,
        'deskripsi' => $deskripsi,
        'persyaratan' => $persyaratan,
        'deadline' => $deadline,
        'kategori' => $kategori, // Added kategori to insert
        'created_at' => date('Y-m-d H:i:s')
    ];

    // Insert the lowongan into the database
    $insert = $model->insertLowongan($data);
    $activityLog = [
        'id_user' => session()->get('id'), // Log activity of the logged-in user
        'activity' => "Membuat Lowongan",
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
    if ($insert) {
        return redirect()->to('home/detailperusahaan/' . $id_perusahaan)->with('success', 'Lowongan berhasil ditambahkan.');
    } else {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan lowongan.')->withInput();
    }
}

public function daftarLamaran($id_perusahaan)
{
    $model = new bkkmodel();
    $data['lamaranList'] = $model->getLamaranByPerusahaan($id_perusahaan);
    // print_r($data);
    $model = new bkkmodel();
        $where = array('id_setting' => '1');
        $data['darren2'] = $model->getwhere('setting', $where);
    echo view('header',$data);
    echo view('menu',$data);
    echo view('daftarlamaran', $data); // Pass the data array to the view
    echo view('footer');
}

public function profile($id_user)
{
    $model = new bkkmodel();
    
    // Dapatkan data pengguna berdasarkan id_user
    $user = $model->getUserById($id_user);

    // Cek jika pengguna ditemukan
    if ($user) {
        $id_level = $user['id_level'];

        // Siapkan data umum untuk tampilan
        $data['user'] = $user;

        if ($id_level == 3) {
            // Dapatkan data siswa jika levelnya 3
            $data['siswa'] = $model->getSiswaByUserId($id_user);
            $model = new bkkmodel();
            $where = array('id_setting' => '1');
            $data['darren2'] = $model->getwhere('setting', $where);
            echo view('header',$data);
            echo view('menu',$data);
            echo view('profilesiswa', $data); // View khusus untuk siswa
            echo view('footer');
        } else {
            // Jika levelnya bukan 3, ambil data level
            $data['level'] = $model->getLevelById($id_level);
            $model = new bkkmodel();
            $where = array('id_setting' => '1');
            $data['darren2'] = $model->getwhere('setting', $where);
            echo view('header',$data);
            echo view('menu',$data);
            echo view('profile', $data); // View untuk id_level 1 & 2
            echo view('footer');
        }
    } else {
        // Tampilkan halaman error atau redirect jika user tidak ditemukan
        return redirect()->to('/error')->with('error', 'User not found.');
    }
}


public function editprofile1($id_user)
{
    $model = new bkkmodel();

    // Get the username and email from the form input
    $nama = $this->request->getPost('username');
    $email = $this->request->getPost('email');
  
    // Data to update in the 'user' table
    $data = [
        'username' => $nama,
        'email' => $email,
    ];

    // Update the user data for the viewed profile (using the passed $id_user)
    $model->edit('user', $data, ['id_user' => $id_user]);

    // Log activity for the correct user
    $activityLog = [
        'id_user' => $id_user,
        'activity' => 'Edit Profile',
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);

    // Redirect to the profile page of the viewed user, not the logged-in user
    return redirect()->to("home/profile/{$id_user}")->with('success', 'Profile updated successfully.');
}


    public function updatesiswa($id_user)
    {
        $model = new bkkmodel();
    
        // Ambil data yang dikirimkan dari form
        $nama_siswa = $this->request->getPost('nama_siswa');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $jurusan = $this->request->getPost('jurusan');
        $keterampilan = $this->request->getPost('keterampilan');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
    
        // Data untuk tabel 'siswa'
        $dataSiswa = [
            'nama_siswa' => $nama_siswa,
            'tanggal_lahir' => $tanggal_lahir,
            'jurusan' => $jurusan,
            'keterampilan' => $keterampilan,
        ];
    
        // Data untuk tabel 'user'
        $dataUser = [
            'username' => $username,
            'email' => $email,
        ];
    
        // Update data di tabel 'siswa' dan 'user' berdasarkan $id_user yang diterima sebagai parameter
        $model->edit('siswa', $dataSiswa, ['id_user' => $id_user]);
        $model->edit('user', $dataUser, ['id_user' => $id_user]);
    
        // Log aktivitas
        $activityLog = [
            'id_user' => session()->get('id'), // Log activity of the logged-in user
            'activity' => "Edit Profile of User ID: $id_user",
            'time' => date('Y-m-d H:i:s')
        ];
        $model->logActivity($activityLog);
    
        // Redirect back to the profile page of the user being edited
        return redirect()->to("home/profile/{$id_user}");
    }
    

    
    public function resetPassword()
    {
        $id_user = session()->get('id_user');
        $model = new bkkmodel();
        $model->resetPassword($id_user);

        return redirect()->to('home/profile');
    }

   public function updatePhoto($profileId)
{
    $model = new bkkmodel();
    $id_user = session()->get('id'); // Logged-in user ID
    
    // Check if a file is uploaded
    $file = $this->request->getFile('foto');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        // Validate file type
        $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        if (in_array($file->getMimeType(), $allowedTypes)) {
            // Generate a new file name
            $newFileName = $file->getRandomName();
    
            // Move the file to the public/images/user directory
            $file->move('images/user', $newFileName);
    
            // Update the user's photo in the database (profileId is the ID of the profile being updated)
            $data = ['foto' => $newFileName];
            $model->edit('user', $data, ['id_user' => $profileId]);
    
            // Log the activity
            $activityLog = [
                'id_user' => $id_user, // Log activity by the logged-in user
                'activity' => 'Updated Profile Photo',
                'time' => date('Y-m-d H:i:s')
            ];
            $model->logActivity($activityLog);
        }
    } else {
        // Handle file upload error
        return redirect()->back()->with('error', 'Error uploading file.');
    }

    // Redirect back to the profile being viewed, which could be different from the logged-in user
    return redirect()->to("home/profile/{$profileId}");
}


public function updatepassword($id_user)
{
    $model = new bkkmodel();
    
    // Ambil data yang dikirimkan dari form
    $current_password = $this->request->getPost('current_password');
    $new_password = $this->request->getPost('new_password');

    // Validasi input
    if (empty($current_password) || empty($new_password)) {
        return redirect()->back()->with('error', 'All fields are required.');
    }

    // Verifikasi password lama
    $user = $model->getUserById($id_user); // Asumsi ada fungsi untuk mengambil user by id

    if ($user && $current_password === $user['password']) {
        // Simpan password baru tanpa hashing
        $data = [
            'password' => $new_password // Bisa di-hash jika diperlukan
            // 'password' => md5($new_password) // Contoh jika ingin pakai hashing MD5
        ];

        // Update password di tabel 'user'
        $model->edit('user', $data, ['id_user' => $id_user]);

        // Log aktivitas
        $activityLog = [
            'id_user' => $id_user,
            'activity' => 'Update Password',
            'time' => date('Y-m-d H:i:s')
        ];
        $model->logActivity($activityLog);

        // Hapus session agar user harus login lagi (jika ini dilakukan oleh user yang sedang login)
        if ($id_user == session()->get('id')) {
            session()->destroy();
            return redirect()->to('home/login')->with('success', 'Password updated successfully. Please log in again.');
        }

        return redirect()->to("home/profile/{$id_user}")->with('success', 'Password updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Current password is incorrect.');
    }
}


    
public function updateStatus()
{
    $id_lamaran = $this->request->getPost('id_lamaran');
    $status = $this->request->getPost('status');

    // Validasi input
    if ($id_lamaran && $status) {
        $model = new bkkmodel();

        // Dapatkan id_perusahaan, id_siswa, dan id_lowongan berdasarkan id_lamaran
        $lamaran = $model->db->table('lamaran')
            ->select('lamaran.id_perusahaan, lamaran.id_siswa, lamaran.id_lowongan')
            ->where('id_lamaran', $id_lamaran)
            ->get()
            ->getRow();

        if ($lamaran) {
            $id_perusahaan = $lamaran->id_perusahaan;
            $id_siswa = $lamaran->id_siswa; // Student who applied for the job
            $id_lowongan = $lamaran->id_lowongan; // Job ID related to the application

            // Update status lamaran
            $data = [
                'status' => $status,
            ];

            // Eksekusi update berdasarkan id_lamaran
            $model->edit('lamaran', $data, ['id_lamaran' => $id_lamaran]);

            // Tambahkan notifikasi setelah status diperbarui
            $notificationData = [
                'id_siswa' => $id_siswa,
                'id_perusahaan' => $id_perusahaan,
                'id_lamaran' => $id_lamaran,
                'id_lowongan' => $id_lowongan,
                'status' => $status,
            ];
            $model->tambah('notifikasi',$notificationData); // Insert the notification
            $activityLog = [
                'id_user' => session()->get('id'), // Log activity of the logged-in user
                'activity' => "Menerima/Menolak Lamaran",
                'time' => date('Y-m-d H:i:s')
            ];
            $model->logActivity($activityLog);
            // Redirect dengan pesan sukses dan tetap di halaman daftar lamaran berdasarkan id_perusahaan
            return redirect()->to('home/daftarlamaran/' . $id_perusahaan)->with('success', 'Status lamaran berhasil diperbarui dan notifikasi ditambahkan.');
        }
    }

    // Redirect dengan pesan error jika gagal
    return redirect()->back()->with('error', 'Gagal memperbarui status lamaran.');
}


public function getNotifications()
{
    $id_user = session()->get('id');
    $model = new bkkmodel();

    // Subquery to get id_siswa based on id_user
    $subQuery = $model->db->table('siswa')
        ->select('id_siswa')
        ->where('id_user', $id_user)
        ->limit(1)
        ->getCompiledSelect();  // Compile the subquery to SQL string

    // Query to get notifications from the notifications table
    $notifications = $model->db->table('notifikasi')
        ->select('notifikasi.id_notifikasi, notifikasi.id_siswa, notifikasi.id_perusahaan, notifikasi.id_lamaran, notifikasi.id_lowongan, notifikasi.status, lowongan.pekerjaan as judul_lowongan')
        ->join('lowongan', 'notifikasi.id_lowongan = lowongan.id_lowongan')
        ->where("notifikasi.id_siswa = ($subQuery)", null, false)  // Use the compiled subquery string for id_siswa
        ->get()->getResult();

    return $notifications;
}

public function daftaruser()
{
    $model = new bkkmodel();
    $data['users'] = $model->getUsersWithLevels(); 
   
    $where = array('id_setting' => '1');
    $data['darren2'] = $model->getwhere('setting', $where);
    echo view('header', $data);
    echo view('menu', $data);
    echo view('daftaruser', $data); 
    echo view('footer');
}


	public function aksiadduser()
	{
        $model = new bkkmodel;
		$nama = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$level = $this->request->getPost('level');
        $id_user = session()->get('id');
		$data = array(
			'username' => $nama,
			'password' => md5($password),
			'id_level' => $level,
			'foto' => 'user.png',
            'created_at' => date('Y-m-d H:i:s'), 
            'created_by' => $id_user
		);
        $model->tambah('user', $data);
      
        $activityLog = [
            'id_user' => $id_user,
            'activity' => 'Tambah User',
            'time' => date('Y-m-d H:i:s')
        ];
        $model->logActivity($activityLog);
		
		return redirect()->to('home/daftaruser');
	}

    public function updateuser()
{
    $model = new bkkmodel();
    
    $a = $this->request->getPost('username');
    $b = $this->request->getPost('password');
    $id = $this->request->getPost('id');
    $id_user = session()->get('id');
    
   $backupWhere = ['id_user' => $id];
   $existingBackup = $model->getWhere('user_backup', $backupWhere);

   if ($existingBackup) {
	   // Hapus data lama di produk_backup jika ada
	   $model->hapus('user_backup', $backupWhere);
   }

   $produkLama = $model->getProductById($id);
   $backupData = (array) $produkLama;
   $model->tambah('user_backup', $backupData);

    // Update user
    $isi = array(
        'username' => $a,
        'password' => md5($b),
        'updated_at' => date('Y-m-d H:i:s'), 
        'updated_by' => $id_user
    );

    $where = array('id_user' => $id);
    print_r($where);
    $model->edit('user', $isi, $where);

    // Log aktivitas
    $activityLog = [
        'id_user' => $id_user,
        'activity' => 'Edit User',
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);

    return redirect()->to('home/daftaruser')->with('status', 'User updated successfully');
}

public function deleteuser($id)
	{
        $model = new bkkmodel();
        $id_user = session()->get('id');

        $data = [
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $id_user
        ];
    
        // Lakukan soft delete dengan mengupdate kolom 'delete'
        $model->edit('user', $data, ['id_user' => $id]);
    
        // Log aktivitas pengguna
        $id_user = session()->get('id');
        $activityLog = [
            'id_user' => $id_user,
            'activity' => 'Hapus User',
            'time' => date('Y-m-d H:i:s')
        ];
        $model->logActivity($activityLog);
    
        // Redirect ke halaman transaksi
        return redirect()->to('home/daftaruser');
	}

    public function restoredUserList()
    {
        $model = new bkkmodel();
        
        // Fetch deleted users from the database
        $deletedUsers = $model->getDeletedUsers();

    
        $where = array('id_setting' => '1');
        $data['darren2'] = $model->getwhere('setting', $where);
        echo view('header',$data);
        echo view('menu',$data);
        echo view('restoreduser', ['deletedUsers' => $deletedUsers]);
        echo view('footer');
    }

    public function restoreDeletedUser($id_user)
    {
        $model = new bkkmodel();
        
        // Logic to restore the deleted user
        $model->restoreUser($id_user); // Ensure this method is implemented in your model
        $activityLog = [
            'id_user' => session()->get('id'), // Log activity of the logged-in user
            'activity' => "Restore User",
            'time' => date('Y-m-d H:i:s')
        ];
        $model->logActivity($activityLog);
        return redirect()->to(base_url('home/restoredUserList'));
    }

    public function vrestoreuser()
{
    $model = new bkkmodel();

    $where = array('id_setting' => '1');
    $data['darren2'] = $model->getwhere('setting', $where);

    $data['editedUsers'] = $model->getBackupData();

    // Load the views and pass the data
    echo view('header',$data);
    echo view('menu',$data);
    echo view('restoreuser', $data);
    echo view('footer');
}

public function restoreu($id)
{
    $model = new bkkmodel();
    
    $backupData = $model->getWhere('user_backup', ['id_user' => $id]);

    if ($backupData) {
       
        $restoreData = (array) $backupData;
        unset($restoreData['id_user']);
        $model->edit('user', $restoreData, ['id_user' => $id]);
        $model->hapus('user_backup', ['id_user' => $id]);
    }
    $activityLog = [
        'id_user' => session()->get('id'), // Log activity of the logged-in user
        'activity' => "Restore Edited User",
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
    return redirect()->to('home/daftaruser');
}


public function register()
{
    $model = new bkkmodel();
    $where = array('id_setting' => 1);
    $data['darren2'] = $model->getWhere('setting', $where);
    echo view('header', $data);
    echo view('register', $data); // Render the registration form
    echo view('footer');
}

public function aksi_register()
{
    // Load model
    $model = new bkkmodel();
    
    // Get input data
    $username = $this->request->getPost('username');
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $confirm_password = $this->request->getPost('confirm_password');

    // Validate input
    if ($password !== $confirm_password) {
        // Handle password mismatch
        return redirect()->to('home/register');
    }


    // Prepare user data
    $userData = [
        'username' => $username,
        'email' => $email,
        'password' => md5($password),
        'id_level' => 3,
        'foto' => 'user.png',
        'created_at' => date('Y-m-d H:i:s'),
    ];
    $activityLog = [
        'id_user' => session()->get('id'), // Log activity of the logged-in user
        'activity' => "Register Account",
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
    if ($model->tambah('user', $userData)) {
        return redirect()->to(base_url('home/login'))->with('success', 'Registration successful. Please login.');
    } else {
        return redirect()->back()->with('error', 'Registration failed. Please try again.');
    }
}
}
