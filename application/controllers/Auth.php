<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required'
        );
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('index.php/admin');
                    } else {
                        redirect('index.php/user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert 
                    alert-danger" role="alert">Password yang anda masukkan salah!
                    </div>');
                    redirect('');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert 
            alert-danger" role="alert">Email belum terdaftar!
            </div>');
            redirect('');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules(
            'name',
            'Name',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|is_unique[user.email]',
            [
                'is_unique' => 'This email already exist!'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[4]|Matches[repassword]',
            [
                'matches' => ' password dont match!',
                'min_length' => 'Password too short!'
            ]
        );
        $this->form_validation->set_rules(
            'repassword',
            'Password',
            'required|trim|Matches[password]'
        );

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => 'default.jpg',
                'password' => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert">Anda telah melakukan register!
            </div>');
            redirect('');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert 
        alert-success" role="alert">Anda telah logout!
        </div>');
        redirect('');
    }
}
