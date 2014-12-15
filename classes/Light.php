<?php defined('SYSPATH') or die('No direct script access.');


class Light extends Dobby_Module {


    const CAPTION = 'Управление светом';
    const NAME = 'light';

    public $id = null;
    public $name = null;
    public $engname = null;
    public $light_type = null;
    public $id_devices = null;
    public $port = null;
    public $value = null;


    public $syncParams = array('name', 'engname', 'light_type', 'id_devices', 'port', 'smooth', 'value');

    public static $types = array(
        Light::RGB => 'RGB Лента',
        Light::ONECOLOR => 'Одноцветная лента',
    );

    public static $ports = array(1, 2, 3, 4, 5, 6, 7, 8);


    const RGB = 0;
    const ONECOLOR = 1;


    /**
     * @param $data
     */
    public function init($data) {

        $data = is_array($data) ? $data : array();
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->name = isset($data['name']) ? $data['name'] : null;
        $this->engname = isset($data['engname']) ? $data['engname'] : null;
        $this->light_type = isset($data['light_type']) ? $data['light_type'] : null;
        $this->id_devices = isset($data['id_devices']) ? $data['id_devices'] : null;
        $this->port = isset($data['port']) ? $data['port'] : null;
        $this->value = isset($data['value']) ? $data['value'] : null;
    }


    /**
     * @param $values
     * @return $this|bool
     */
    public function save($values) {

        $valid = Validation::factory($values);
        $valid->rules('name', Rules::instance()->not_empty)
            ->rules('engname', Rules::instance()->engname)
            ->rules('light_type', Rules::instance()->not_empty)
            ->rules('id_devices', Rules::instance()->not_empty)
            ->rules('port', Rules::instance()->not_empty)
            ->check();
        Message::instance($valid->errors());

        if (!Message::instance()->isempty()) return false;

        $this->name = $values['name'];
        $this->engname = $values['engname'];
        $this->light_type = $values['light_type'];
        $this->id_devices = $values['id_devices'];
        $this->port = $values['port'];
        Module::instance(self::NAME)->saveRecord($this);
        return $this;
    }

    public function setColorRGB($r, $g, $b, $smooth) {
        Device::factory($this->id_devices)->setValue($this->port . ':' . $r . ':' . $g . ':' . $b . ':' . $smooth);
        $this->value = $r . ':' . $g . ':' . $b;
        Module::instance(self::NAME)->saveRecord($this);
    }

    public function setColor($l, $smooth) {

        $light = round($l * 255);
        Device::factory($this->id_devices)->setValue($this->port . ':' . $light. ':' . $smooth);
        $this->value = $light . ':' . $light . ':' . $light;
        Module::instance(self::NAME)->saveRecord($this);
    }

    /**
     * @param null $data
     * @return Light
     */
    public static function factory($data = null) {

        if (is_numeric($data)) {
            return new Light(self::readById($data));
        }
        return new Light($data);
    }

    /**
     * @param $id
     * @return null
     */
    public static function readById($id) {
        return Module::instance(self::NAME)->getRecord($id);
    }

}