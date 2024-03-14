<?php
class Contact extends Controller {
    public $data = [];

    public function index() {
        $this->data['content'] = 'contact/index';
        $this->data['title'] = 'Trang liên hệ';
        $this->render('layouts/client_layout', $this->data);
    }

}