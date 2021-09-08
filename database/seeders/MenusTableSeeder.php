<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->truncate();
        $rows = [
            [
                'parent_id' => '0',
                'menu_name' => 'Users',
                'menu_link' => '/user',
                'menu_controller' => 'UserController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-user-circle" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '2'
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'Roles',
                'menu_link' => '',
                'menu_controller' => '',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-wrench" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '3'
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'Configuration',
                'menu_link' => '',
                'menu_controller' => '',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-gears" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '4'
            ],


            [
                'parent_id' => '0',
                'menu_name' => 'Logs',
                'menu_link' => '',
                'menu_controller' => '',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-child" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '5'
            ],

            [
                'parent_id' => '2',
                'menu_name' => 'Menus',
                'menu_link' => '/roles/menu',
                'menu_controller' => 'MenuController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-list" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '0'
            ],

            [
                'parent_id' => '2',
                'menu_name' => 'User Groups',
                'menu_link' => '/roles/group',
                'menu_controller' => 'UserGroupController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-group" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '1'
            ],
            [
                'parent_id' => '2',
                'menu_name' => 'Role Access',
                'menu_link' => '/roles/roleAccessIndex',
                'menu_controller' => 'RoleAccessController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-unlock" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '2'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Designation',
                'menu_link' => '/configurations/designation',
                'menu_controller' => 'DesignationController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-gears" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '3'
            ],

            [
                'parent_id' => '3',
                'menu_name' => 'Fiscal Year',
                'menu_link' => '/configurations/fiscalYear',
                'menu_controller' => 'FiscalYearController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-gears" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '5'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Department',
                'menu_link' => '/configurations/department',
                'menu_controller' => 'DepartmentController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-gears" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '1'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Country',
                'menu_link' => '/configurations/country',
                'menu_controller' => 'CountryController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-gears" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '9'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Pradesh',
                'menu_link' => '/configurations/pradesh',
                'menu_controller' => 'PradeshController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-gears" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '10'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Municipality Type',
                'menu_link' => '/configurations/muniType',
                'menu_controller' => 'MuniTypeController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-gears" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '11'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'District',
                'menu_link' => '/configurations/district',
                'menu_controller' => 'DistrictController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-gears" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '13'
            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Municipality',
                'menu_link' => '/configurations/municipality',
                'menu_controller' => 'MunicipalityController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-gears" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '13'

            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Office Type',
                'menu_link' => '/configurations/officeType',
                'menu_controller' => 'OfficeTypeController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-gears" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '14'

            ],
            [
                'parent_id' => '3',
                'menu_name' => 'Office',
                'menu_link' => '/configurations/office',
                'menu_controller' => 'OfficeController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-gears" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '15'

            ],
            [
                'parent_id' => '4',
                'menu_name' => 'Login Logs',
                'menu_link' => '/logs/loginLogs',
                'menu_controller' => 'LogController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-user-plus" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '1'
            ],

            [
                'parent_id' => '4',
                'menu_name' => 'Failed Login Logs',
                'menu_link' => '/logs/failLoginLogs',
                'menu_controller' => 'LogController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-user-times" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '2'
            ],

            [
                'parent_id' => '0',
                'menu_name' => 'Feedback',
                'menu_link' => '/feedback',
                'menu_controller' => 'FeedbackController',
                'menu_css' => '',
                'menu_icon' => '<i class="fas fa-comment-dots"></i>',
                'menu_status' => '1',
                'menu_order' => '21'
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'News',
                'menu_link' => 'admin/news',
                'menu_controller' => 'NewsController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-newspaper-o" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '22'
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'Notice',
                'menu_link' => 'admin/notice',
                'menu_controller' => 'NoticeController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-bell" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '23'
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'Event',
                'menu_link' => 'admin/event',
                'menu_controller' => 'EventController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-calendar" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '24'
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'Download',
                'menu_link' => 'admin/download',
                'menu_controller' => 'DownloadController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-download" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '25'
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'Slider',
                'menu_link' => 'admin/slider',
                'menu_controller' => 'SliderController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-sliders" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '26'
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'Navbar',
                'menu_link' => 'admin/navbar',
                'menu_controller' => 'NavBarController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-sliders" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '27'
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'Contact',
                'menu_link' => 'admin/contact',
                'menu_controller' => 'ContactController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-phone" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '28'
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'SocialMedia',
                'menu_link' => 'admin/socialmedia',
                'menu_controller' => 'SocialController',
                'menu_css' => '',
                'menu_icon' => '<i class="fab fa-facebook-f"></i>',
                'menu_status' => '1',
                'menu_order' => '29'
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'Message',
                'menu_link' => 'admin/message',
                'menu_controller' => 'MessageController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-envelope" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '30'
            ],[
                'parent_id' => '0',
                'menu_name' => 'Report',
                'menu_link' => 'admin/report',
                'menu_controller' => 'ReportController',
                'menu_css' => '',
                'menu_icon' => '<i class="fa fa-file" aria-hidden="true"></i>',
                'menu_status' => '1',
                'menu_order' => '31'
            ],

        ];
        DB::table('menus')->insert($rows);
    }
}
