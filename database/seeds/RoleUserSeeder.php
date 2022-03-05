<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Role;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $roles = Role::all();
        foreach ($users as $user) {
            $roleRandom = Role::inRandomOrder()->first()->id;
            $user->roles()->attach($roleRandom);

            foreach ($roles as $role) {
                $rand = random_int(0, 1);
                if ((bool) $rand) {
                    if ($roleRandom !== $role->id) {
                        $user->roles()->attach($role->id);
                    }
                }
            }
        }
    }
}
