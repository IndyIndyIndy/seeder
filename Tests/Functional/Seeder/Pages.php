<?php
namespace Dennis\Seeder\Tests\Functional\Seeder;

use Dennis\Seeder;

/**
 * Class Pages
 * @package Dennis\Seeder\Tests\Functional\Seeder
 */
class Pages extends Seeder\Seeder\DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->factory->create('pages', 2)->each(function (Seeder\Seed $seed, Seeder\Faker $faker) {
            $seed->set([
                'title' => 'foobar',
                'media' => $this->call(Seeder\Seeder\Image::class)
            ]);
        });
    }
}
