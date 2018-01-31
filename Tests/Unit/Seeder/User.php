<?php
namespace Dennis\Seeder\Tests\Unit\Seeder;

use Dennis\Seeder;

/**
 * Class User
 * @package Dennis\Seeder\Seeder
 *
 * @example
 */
class User extends Seeder\Seeder\DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->factory->create('fe_users', 2)->each(function (Seeder\Seed $seed, Seeder\Faker $faker) {
            $seed->set([
                'email' => 'mail@example.org',
                'usergroup' => $this->call(Group::class)
            ]);
        });
    }
}
