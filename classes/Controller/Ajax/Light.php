<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Ajax_Light extends Controller_Ajax {

    public function action_add() {

        $light = Light::factory()->save($this->request->post());

        Message::instance()->isempty(true);
        Message::instance(0, 'Устройство добавлено')->setValue(array('id' => $light->id))->out(true);
    }


    public function action_edit() {

        Light::factory($this->request->post('id'))->save($this->request->post());

        Message::instance()->isempty(true);
        Message::instance(0, 'Изменения сохранены')->out(true);
    }

    public function action_set() {

        $smooth = intval($this->request->post('smooth'));
        $light = Light::factory($this->request->post('id'));

        if ($light->light_type == 0) {
            $light->setColorRGB($this->request->post('r'), $this->request->post('g'), $this->request->post('b'), $smooth);
        }
        if ($light->light_type == 1) {
            $light->setColor($this->request->post('l'),  $smooth);
        }
    }
}