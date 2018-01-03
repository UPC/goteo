<?php
/*
 * This file is part of the Goteo Package.
 *
 * (c) Platoniq y Fundación Goteo <fundacion@goteo.org>
 *
 * For the full copyright and license information, please view the README.md
 * and LICENSE files that was distributed with this source code.
 */

namespace Goteo\Controller\Home;

use Symfony\Component\HttpFoundation\Request;

use Goteo\Application\Exception\ControllerAccessDeniedException;
use Goteo\Application\Session;
use Goteo\Application\Config;
use Goteo\Application\View;
use Goteo\Model\Project;
use Goteo\Model\Project\ProjectLocation;
use Goteo\Model\User\UserLocation;
use Goteo\Model\User;

class AjaxHomeController extends \Goteo\Core\Controller {

    public function __construct() {
        // changing to a responsive theme here
        View::setTheme('responsive');
    }

    /**
     * Projects filtered
     */
    public function projectsFilterAction(Request $request)
    {

        $filter = $request->query->get('filter');
        $latitude = $request->query->get('latitude');
        $longitude = $request->query->get('longitude');
        if ($request->isMethod('post')) {
            $filter = $request->request->get('filter');
            $latitude = $request->request->get('latitude');
            $longitude = $request->request->get('longitude');

        }

        $filters = ['status' => [Project::STATUS_IN_CAMPAIGN, Project::STATUS_FUNDED]];
        $filters['order'] = 'project.status ASC, project.name ASC';
        if($filter === 'near') {
            // Nearby defined as 300Km distance
            // Any LocationInterface will do (UserLocation, ProjectLocation, ...)
            $filters['location'] = new UserLocation([ 'latitude' => $latitude, 'longitude' => $longitude, 'radius' => 300 ]);
        } elseif($filter === 'outdated') {
            $filters['type'] = 'outdated';
            $filters['status'] = Project::STATUS_IN_CAMPAIGN;
        } elseif($filter === 'promoted') {
            $filters['type'] = 'promoted';
            $filters['order'] = 'promote.order ASC, project.name ASC';
        } elseif(in_array($filter, ['matchfunding', 'promoted'])) {
            $filters['type'] = 'matchfunding';
        }
        $projects = Project::getList($filters, null, 0, 20);

        if(!$projects) {
            $projects = Project::getList(['status' => Project::STATUS_IN_CAMPAIGN], null, 0, 20);
        }

        return $this->jsonResponse([
            'filter' => $filter,
            'html' => View::render( 'home/partials/projects_list', ['projects' => $projects] )
        ]);
    }

}
