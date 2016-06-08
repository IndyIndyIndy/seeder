<?php
namespace Dennis\Seeder\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Dennis Römmich <dennis@roemmich.eu>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * AbstractSeederController
 *
 * @author Dennis Römmich<dennis@roemmich.eu>
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
abstract class AbstractSeederController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * seedRepository
     *
     * @var \Dennis\Seeder\Domain\Repository\SeedRepository
     * @inject
     */
    protected $seedRepository;

    /**
     * initializeAction
     *
     * @return void
     */
    public function initializeAction()
    {
        if (\Dennis\Seeder\Utility\Dependency::checkDependencies() === false) {
            $this->redirect('index', 'Install');
        }
    }
}
