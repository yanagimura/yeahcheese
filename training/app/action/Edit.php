<?php
/**
 *  Edit.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  edit Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_Edit extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = [
        'eventno' => [
          'type' => VAR_TYPE_STRING,
          'required' =>  'true',
    //      'custom' => 'CheckId',
        ],
    ];


    /**
     *  Form input value convert filter : sample
     *
     *  @access protected
     *  @param  mixed   $value  Form Input Value
     *  @return mixed           Converted result.
     */
    /*
    protected function _filter_sample($value)
    {
        //  convert to upper case.
        return strtoupper($value);
    }
    */
}

/**
 *  edit action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_Edit extends Sharepictures_ActionClass
{
    /**
     *  preprocess of edit Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {

        return null;
    }

    /**
     *  edit action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $eventArray = $this->session->get('show');
        $eventId = array_search($this->af->get('eventno'), array_column($eventArray, 'id'));
        $this->session->set('edit', $eventArray[$eventId]);
        $this->session->start('edit');

        echo '<pre>';
                var_dump($this->session->get('edit'));
        echo '</pre>';

        return 'edit';
    }

    /**
     *  セッション切れの確認
     *
     *  @access public
     *  @return string  編集画面
     */
    public function authenticate()
    {
        if (!$this->session->isStart('login')) {
            return 'login';
        }

        if (!$this->session->isStart('show')) {
            return 'show';
        }
    }
}
