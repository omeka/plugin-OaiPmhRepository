<?php
/**
 * @package OaiPmhRepository
 * @subpackage Controllers
 * @author John Flatness, Yu-Hsun Lin
 */

/**
 * Request page controller
 * 
 * The controller for the outward-facing segment of the repository plugin.  It 
 * processes queries, and produces the response in XML format.
 *
 * @package OaiPmhRepository
 * @subpackage Controllers
 * @uses OaiPmhRepository_ResponseGenerator
 * @uses OaiPmhRepository_Error
 */
class OaiPmhRepository_RequestController extends Omeka_Controller_Action
{    
    /**
     * Passes POST/GET variables over to response generator and results out to
     * view.
     */
    public function indexAction()
    { 
        switch($_SERVER['REQUEST_METHOD'])
        {
            case 'GET': $query = &$_GET; break;
            case 'POST': $query = &$_POST; break;
            default: die('Error determining request type.');
        }
        
        $this->view->response = new OaiPmhRepository_ResponseGenerator($query);
    }
}
?>
