<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    private $_table = 'user';
    const SESSION_KEY = 'user_id';

    function rules(){
        return [
            [ 
                'field'     => 'username',
                'label'     => 'Username atau email',
                'rules'     => 'required'
            ],
            [ 
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ]
            ];
    }

    public function login($username, $password){
        $this->db->where('email', $username)->or_where('username', $username);
        $query  = $this->db->get($this->_table);
        $user   = $query->row();

        //cek apakah username nya tidak ada?
        if(!$user){
            return FALSE;
        }

        //jika ada kita cek passwordnya 
        if(!password_verify($password, $user->password)){
            return FALSE;
        }

        $this->session->set_userdata([self::SESSION_KEY => $user->id]);
        $this->_update_last_login($user->id);

        return $this->session->has_userdata(self::SESSION_KEY);
    }

    public function current_user(){
        if(!$this->session->has_userdata(self::SESSION_KEY)){
            return null;
        }

        $user_id = $this->session->userdata(self::SESSION_KEY);
        $query = $this->db->get_where($this->_table, ['id' => $user_id]);
        return $query->row();
    }

    public function logout()
    {
        $this->session->unset_userdata(self::SESSION_KEY);
        return !$this->session->has_userdata(self::SESSION_KEY);
    }

    public function _update_last_login($user_id){
        $data = [
            'last_login' => date('Y-m-d H:i:s'),
        ];

        return $this->db->update($this->_table, $data, ['id' => $iduser_id]);
    }

}

/* End of file Auth_model.php */
