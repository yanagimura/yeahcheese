<?php
/**
 *  Image.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  image Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_Image extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = [
        'pictureFileName'   =>    [
            'type'    =>    VAR_TYPE_STRING,
            'required'    =>    'true',
        ],
    ];

}

/**
 *  image action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_Image extends Sharepictures_ActionClass
{
    /**
     *  preprocess of image Action.
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
     *  image action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        header('Content-Type:image/jpeg');
        header('Content-disposition:inline');
        readfile('/Users/yanagimura/sen/NewGrad/training/images/' . $this->af->get('pictureFileName'));
        return null;
    }
}
