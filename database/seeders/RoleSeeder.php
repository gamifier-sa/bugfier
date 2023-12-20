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
            'users',
            'projects',
            'bugs',
            'awards',
        ];

        $pointActions = [
            'update_point'
        ];
        $actions = [
            'view',
            'show',
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

            if ($category == 'bugs'){
                foreach ( $pointActions as $action)
                {
                    Ability::create([
                                        'name'     => $action . '_' . str_replace(' ','_',$category),
                                        'category' => $category,
                                        'action'   => $action,
                                    ]);
                }
            }


            foreach ( array_values($usedActions) as $action)
            {
                Ability::create([
                    'name'     => $action . '_' . str_replace(' ','_',$category),
                    'category' => $category,
                    'action'   => $action,
                ]);
            }
        }


        $superAdminRole = Role::create([
            'name_ar' => 'مدير تنفيذي',
            'name_en' => 'super admin',
        ]);


        $adminRole  = Role::create([
            'name_ar'    => 'صلاحيات إفتراضية',
            'name_en'    => 'default roles',
        ]);

        $superAdminAbilitiesIds = Ability::pluck('id');

        $adminAbilitiesIds   = Ability::whereIn('category',[ 'cars' , 'brands' , 'models' , 'colors' ] )->whereIn('action' , ['view' , 'show'])->get();

        $superAdminRole->abilities()->attach( $superAdminAbilitiesIds );
        $adminRole->abilities()->attach( $adminAbilitiesIds );


        Admin::find(1)->assignRole($superAdminRole);
        Admin::find(1)->assignRole($adminRole);

        Admin::find(2)->assignRole($superAdminRole);
        Admin::find(2)->assignRole($adminRole);

        Admin::find(3)->assignRole($superAdminRole);
        Admin::find(3)->assignRole($adminRole);

        Admin::find(4)->assignRole($superAdminRole);
        Admin::find(4)->assignRole($adminRole);

        Admin::find(5)->assignRole($superAdminRole);
        Admin::find(5)->assignRole($adminRole);

        Admin::find(6)->assignRole($superAdminRole);
        Admin::find(6)->assignRole($adminRole);

    }
}
