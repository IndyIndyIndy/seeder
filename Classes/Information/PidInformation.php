<?php
namespace TildBJ\Seeder\Information;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Dennis Römmich <dennis@roemmich.eu>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * Class PidInformation
 *
 * @package TildBJ\Seeder\Information\PidInformation
 */
class PidInformation extends AbstractInformation
{
    /**
     * @var string
     */
    protected $question = 'Enter an existing Page ID for your records ';

    /**
     * @return int
     */
    public function getDefaultValue()
    {
        return 0;
    }

    /**
     * @return array
     */
    public function getChoices()
    {
        return null;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return self::INFORMATION_TYPE_ASK;
    }
}
