<?php
namespace TildBJ\Seeder\Tests\Unit\Provider;

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
use TildBJ\Seeder\Provider\Faker;
use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Test case for class \TildBJ\Seeder\Provider\Faker
 *
 * @author Dennis Römmich <dennis@roemmich.eu>
 */
class FakerTest extends UnitTestCase
{
    /**
     * @var Faker $subject
     */
    protected $subject;

    protected function setUp()
    {
        $faker = \Faker\Factory::create();
        $faker->seed(1234);
        $this->subject = new Faker($faker);
        $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['seeder']['provider']['customdata'] =
            \TildBJ\Seeder\Tests\Unit\Provider\CustomDataProvider::class;
    }

    protected function tearDown()
    {
        unset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['seeder']['provider']['customdata']);
    }

    /**
     * @method guessProviderName
     * @test
     * @throws \TildBJ\Seeder\Provider\NotFoundException
     */
    public function guessProviderNameByKeyWithEmptyArgumentThrowsNotFoundException()
    {
        $this->expectException(
            \TildBJ\Seeder\Provider\NotFoundException::class
        );
        $this->subject->guessProviderName('');
    }

    /**
     * @method guessProviderName
     * @test
     * @throws \TildBJ\Seeder\Provider\NotFoundException
     */
    public function guessProviderNameReturnsProvidername()
    {
        $this->assertSame('postcode', $this->subject->guessProviderName('zip'));
    }

    /**
     * @method guessProviderNameByKey
     * @test
     * @throws \TildBJ\Seeder\Provider\NotFoundException
     */
    public function guessProviderNameByKeyReturnsNullIfNotFound()
    {
        $this->assertSame(null, $this->subject->guessProviderName('doesnotexist'));
    }

    /**
     * @method get
     * @test
     * @throws \TildBJ\Seeder\Provider\NotFoundException
     */
    public function getThrowsExceptionIfNoProviderWasFound()
    {
        $this->expectException(\TildBJ\Seeder\Provider\NotFoundException::class);
        $this->subject->get('doesnotexist');
    }

    /**
     * @method get
     * @test
     * @throws \TildBJ\Seeder\Provider\NotFoundException
     */
    public function getZipReturnsPostcode()
    {
        $this->assertSame('49766-3666', $this->subject->get('zip'));
    }

    /**
     * @method get
     * @test
     * @throws \TildBJ\Seeder\Provider\NotFoundException
     */
    public function getPostcodeReturnsPostcode()
    {
        $this->assertSame('49766-3666', $this->subject->get('postcode'));
    }

    /**
     * @method get
     * @test
     * @throws \TildBJ\Seeder\Provider\NotFoundException
     */
    public function getPostcodeWithUnderscoreReturnsPostcode()
    {
        $this->assertSame('49766-3666', $this->subject->get('post_code'));
    }

    /**
     * @method get
     * @test
     * @throws \TildBJ\Seeder\Provider\NotFoundException
     */
    public function getPostcodeWithWeiredCaseReturnsPostcode()
    {
        $this->assertSame('49766-3666', $this->subject->get('poSt_COde'));
    }

    /**
     * @method get
     * @test
     * @throws \TildBJ\Seeder\Provider\NotFoundException
     */
    public function getPostcodeWithUpperCaseReturnsPostcode()
    {
        $this->assertSame('49766-3666', $this->subject->get('POSTCODE'));
    }

    /**
     * @method get
     * @test
     * @throws \TildBJ\Seeder\Provider\NotFoundException
     */
    public function guessProviderNameReturnsNullWithSkippedFieldName()
    {
        $skippedFieldName = 'l10n_parent';
        $this->assertSame(null, $this->subject->guessProviderName($skippedFieldName));
    }

    /**
     * @method __call
     * @test
     */
    public function returnCustomDataIfCustomProviderIsAvailable()
    {
        $this->assertSame('customData', $this->subject->getCustomData());
    }
}
