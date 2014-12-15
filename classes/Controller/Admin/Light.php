<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Admin_Light extends Controller_Admin {

    public $template = 'admin/light/index';

    public function before() {
        parent::before();
        $this->view->types = Light::$types;
        $this->view->devices = Device::getDevicesAsArray();
        $this->view->ports = Light::$ports;
    }

    public function action_index() {

        if ($this->request->param('id') && is_numeric($this->request->param('id'))) {

            $this->template = 'admin/light/edit';
            $this->view->item = Module::instance(Light::NAME)->getRecord($this->request->param('id'));

        } else {
            $this->view->items = Module::instance(Light::NAME)->getValues();
        }
    }

    public function action_set() {
        $this->template = 'admin/light/set';
        if ($this->request->param('id') && is_numeric($this->request->param('id'))) {

            $this->view->item = Module::instance(Light::NAME)->getRecord($this->request->param('id'));
            $this->view->value = explode(':', $this->view->item['value']);
        } else {
            throw new Kohana_HTTP_Exception_404();
        }

    }

    public function action_add() {
        $this->template = 'admin/light/add';
    }

}