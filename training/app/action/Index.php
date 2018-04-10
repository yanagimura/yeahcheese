<?php
/**
 *  Index.php
 *
 *  @author    {$author}
 *  @package   Sharepictures
 */

/**
 *  Index form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   Sharepictures
 */

class Sharepictures_Form_Index extends Sharepictures_ActionForm
{
    /**
     *  @access   protected
     *
     *  @var      array   form definition.
     */
    public $form = array(
    );

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
 *  Index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_Index extends Sharepictures_ActionClass
{
    /**
     *  preprocess Index action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    public function prepare()
    {
        /**
        if ($this->af->validate() > 0) {
            // forward to error view (this is sample)
            return 'error';
        }
        $sample = $this->af->get('sample');
        */
        return null;
    }

    /**
     *  Index action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    public function perform()
    {
        return 'index';
    }
}
