<?php
require_once('action/Show.php');
/**
 *  Owner/Delete.php
 *
 *  @author     {$author}
 *  @package    Sharepictures
 */

/**
 *  owner_delete Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Form_OwnerDelete extends Sharepictures_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = [];
}

/**
 *  owner_delete action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sharepictures
 */
class Sharepictures_Action_OwnerDelete extends Sharepictures_Action_Show
{
    /**
     *  preprocess of owner_delete Action.
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
     *  owner_delete action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $db = $this->backend->getDB();
        if (isset($_POST['event']) && is_array($_POST['event'])) {
            foreach ($_POST['event'] as $eventId) {
                $sql = "DELETE FROM events WHERE id = $1";
                $db->query($sql, $eventId);
            }
        }
        parent::readEventTable();
        return 'show';
    }
}
