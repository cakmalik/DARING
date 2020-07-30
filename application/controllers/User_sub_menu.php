<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_sub_menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_sub_menu_model');
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'user_sub_menu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user_sub_menu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user_sub_menu/index.html';
            $config['first_url'] = base_url() . 'user_sub_menu/index.html';
        }

        $config['per_page'] = 50;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_sub_menu_model->total_rows($q);
        $user_sub_menu = $this->User_sub_menu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_sub_menu_data' => $user_sub_menu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'user_sub_menu/user_sub_menu_list',
            'judul' => 'user_sub_menu',
        );
        $this->load->view('layout', $data);
    }

    public function read($id)
    {
        $row = $this->User_sub_menu_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'menu_id' => $row->menu_id,
                'title' => $row->title,
                'url' => $row->url,
                'icon' => $row->icon,
                'is_active' => $row->is_active,
                'sub_menu_id' => $row->sub_menu_id,
                'id_sub' => $row->id_sub,

                'content' => 'user_sub_menu/user_sub_menu_read',
                'judul' => 'user_sub_menu',
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('user_sub_menu'));
        }
    }

    public function create()
    {
        $data = array(
            'content' => 'user_sub_menu/user_sub_menu_form',
            'judul' => 'user_sub_menu',
            'button' => 'Create',
            'action' => site_url('user_sub_menu/create_action'),
            'id' => set_value('id'),
            'menu_id' => set_value('menu_id'),
            'title' => set_value('title'),
            'url' => set_value('url'),
            'icon' => set_value('icon'),
            'is_active' => set_value('is_active'),
            'sub_menu_id' => set_value('sub_menu_id'),
            'id_sub' => set_value('id_sub'),

        );
        $this->load->view('layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'menu_id' => $this->input->post('menu_id', TRUE),
                'title' => $this->input->post('title', TRUE),
                'url' => $this->input->post('url', TRUE),
                'icon' => $this->input->post('icon', TRUE),
                'is_active' => $this->input->post('is_active', TRUE),
                'sub_menu_id' => $this->input->post('sub_menu_id', TRUE),
                'id_sub' => $this->input->post('id_sub', TRUE),
            );

            $this->User_sub_menu_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil ditambah.
                </div>');
            redirect(site_url('user_sub_menu'));
        }
    }

    public function update($id)
    {
        $row = $this->User_sub_menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'content' => 'user_sub_menu/user_sub_menu_form',
                'judul' => 'user_sub_menu',
                'button' => 'Update',
                'action' => site_url('user_sub_menu/update_action'),
                'id' => set_value('id', $row->id),
                'menu_id' => set_value('menu_id', $row->menu_id),
                'title' => set_value('title', $row->title),
                'url' => set_value('url', $row->url),
                'icon' => set_value('icon', $row->icon),
                'is_active' => set_value('is_active', $row->is_active),
                'sub_menu_id' => set_value('sub_menu_id', $row->sub_menu_id),
                'id_sub' => set_value('id_sub', $row->id_sub),
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('user_sub_menu'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'menu_id' => $this->input->post('menu_id', TRUE),
                'title' => $this->input->post('title', TRUE),
                'url' => $this->input->post('url', TRUE),
                'icon' => $this->input->post('icon', TRUE),
                'is_active' => $this->input->post('is_active', TRUE),
                'sub_menu_id' => $this->input->post('sub_menu_id', TRUE),
                'id_sub' => $this->input->post('id_sub', TRUE),
            );

            $this->User_sub_menu_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Berhasil perbarui data.
                </div>');
            redirect(site_url('user_sub_menu'));
        }
    }

    public function delete($id)
    {
        $row = $this->User_sub_menu_model->get_by_id($id);

        if ($row) {
            $this->User_sub_menu_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil dihapus.
                </div>');
            redirect(site_url('user_sub_menu'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan
                </div>');
            redirect(site_url('user_sub_menu'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('menu_id', 'menu id', 'trim|required');
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('url', 'url', 'trim|required');
        $this->form_validation->set_rules('icon', 'icon', 'trim|required');
        $this->form_validation->set_rules('is_active', 'is active', 'trim|required');
        $this->form_validation->set_rules('sub_menu_id', 'sub menu id', 'trim|required');
        $this->form_validation->set_rules('id_sub', 'id sub', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file User_sub_menu.php */
/* Location: ./application/controllers/User_sub_menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-15 12:19:05 */
/* http://harviacode.com */
