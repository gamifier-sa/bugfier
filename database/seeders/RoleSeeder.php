<?php

namespace Database\Seeders;

use App\Models\{Ability, Admin, Role};
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : void
    {
        $categories  = [
            'admins',
            'roles',
            'settings',
//            'users',
            'projects',
            'bugs',
            'awards',
            'statuses',
        ];

        $bugsActions = [
            'show',
            'update_point',
            'responsible_admin',
        ];

        $projectActions = [
            'show',
        ];

        $awardActions = [
            'show',
        ];
        $actions = [
            'view',
            'create',
            'update',
            'delete',
        ];

        // indices of unused actions from the above array
        $exceptions = [
            'recycle_bin'          => [
                'unused_actions' => [ 1,2,3 ],
                'extra_actions'  => ['restore']
            ],
        ];


        foreach ($categories as $category)
        {
            $usedActions = array_merge( $actions , $exceptions[ $category]['extra_actions'] ?? [] );

            foreach ( $exceptions[ $category]['unused_actions'] ?? [] as $index ) // remove the unused actions
                unset( $usedActions[$index]);

            foreach ( array_values($usedActions) as $action)
            {
                $this->createAbility($action, $category);
            }


            if ($category == 'awards'){
                foreach ($awardActions as $action)
                {
                    $this->createAbility($action, $category);
                }
            }

            if ($category == 'projects'){
                foreach ($projectActions as $action)
                {
                    $this->createAbility($action, $category);
                }
            }


            if ($category == 'bugs'){
                foreach ($bugsActions as $action)
                {
                    $this->createAbility($action, $category);
                }
            }
        }


        $superAdminRole = Role::create([
            'name_ar' => 'مدير تنفيذي',
            'name_en' => 'Super Admin',
        ]);

        $superAdminAbilitiesIds = Ability::pluck('id');
        $superAdminRole->abilities()->attach( $superAdminAbilitiesIds );

        Admin::find(1)->assignRole($superAdminRole);
        Admin::find(2)->assignRole($superAdminRole);
        Admin::find(3)->assignRole($superAdminRole);
        Admin::find(4)->assignRole($superAdminRole);
        Admin::find(5)->assignRole($superAdminRole);
        Admin::find(6)->assignRole($superAdminRole);
    }
    /**
     * @param string $action
     * @param string $category
     * @return void
     */
    protected function createAbility(string $action, string $category) : void
    {
        Ability::create([
                            'name' => $action . '_' . str_replace(' ', '_', $category), 'category' => $category, 'action' => $action,]);
    }
}
