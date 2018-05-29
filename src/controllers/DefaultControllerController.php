<?php
/**
 * Digital Ocean Spaces plugin for Craft CMS 3.x
 *
 * A Volume Plugin that interacts with Digital Ocean Spaces 
 *
 * @link      clicktoignite.com
 * @copyright Copyright (c) 2018 AJ Griem
 */

namespace ignite\digitaloceanspaces\controllers;

use ignite\digitaloceanspaces\DigitalOceanSpaces;

use Craft;
use craft\web\Controller;

/**
 * DefaultController Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    AJ Griem
 * @package   DigitalOceanSpaces
 * @since     0.0.1
 */
class DefaultControllerController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/digital-ocean-spaces/default-controller
     *
     * @return mixed
     */

    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/digital-ocean-spaces/default-controller/do-something
     *
     * @return mixed
     */
}
