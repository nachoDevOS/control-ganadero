<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":null}',
                'created_at' => '2024-10-18 14:28:26',
                'updated_at' => '2025-04-07 16:18:35',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2024-10-18 14:28:26',
                'updated_at' => '2024-10-18 14:28:26',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2024-10-18 14:28:26',
                'updated_at' => '2024-10-18 14:28:26',
            ),
            3 => 
            array (
                'id' => 8,
                'name' => 'people',
                'slug' => 'people',
                'display_name_singular' => 'Persona',
                'display_name_plural' => 'Personas',
                'icon' => 'fa-solid fa-person',
                'model_name' => 'App\\Models\\Person',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2025-04-07 09:43:00',
                'updated_at' => '2025-04-07 10:25:25',
            ),
            4 => 
            array (
                'id' => 10,
                'name' => 'categorias',
                'slug' => 'categorias',
                'display_name_singular' => 'Categoria',
                'display_name_plural' => 'Categorias',
                'icon' => 'voyager-categories',
                'model_name' => 'App\\Models\\Categoria',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2025-09-09 08:55:34',
                'updated_at' => '2025-09-09 08:55:34',
            ),
            5 => 
            array (
                'id' => 11,
                'name' => 'colors',
                'slug' => 'colors',
                'display_name_singular' => 'Color',
                'display_name_plural' => 'Colores',
                'icon' => 'voyager-brush',
                'model_name' => 'App\\Models\\Color',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2025-09-09 08:57:14',
                'updated_at' => '2025-09-09 08:57:14',
            ),
            6 => 
            array (
                'id' => 12,
                'name' => 'marcas',
                'slug' => 'marcas',
                'display_name_singular' => 'Marca',
                'display_name_plural' => 'Marcas',
                'icon' => 'voyager-tag',
                'model_name' => 'App\\Models\\Marca',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2025-09-09 08:59:02',
                'updated_at' => '2025-09-09 08:59:02',
            ),
            7 => 
            array (
                'id' => 13,
                'name' => 'razas',
                'slug' => 'razas',
                'display_name_singular' => 'Raza',
                'display_name_plural' => 'Razas',
                'icon' => 'voyager-whale',
                'model_name' => 'App\\Models\\Raza',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2025-09-09 09:02:33',
                'updated_at' => '2025-09-09 09:02:33',
            ),
            8 => 
            array (
                'id' => 14,
                'name' => 'planillas',
                'slug' => 'planillas',
                'display_name_singular' => 'Planilla',
                'display_name_plural' => 'Planillas',
                'icon' => 'voyager-file-text',
                'model_name' => 'App\\Models\\Planilla',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2025-09-09 10:33:27',
                'updated_at' => '2025-09-09 11:35:18',
            ),
        ));
        
        
    }
}