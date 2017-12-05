<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cate;
use App\Models\Modules;
use App\Models\Groups;

class CateModulesGroups_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @author TienDQ
     * @return void
     */
    public function run()
    {
        DB::table('cate')->truncate();
        DB::table('modules')->truncate();
        DB::table('groups')->truncate();

        $modelCate = new Cate();
        $modelModules = new Modules();
        $modelGroups = new Groups();

        $cateInfo = $modelCate->create([
            'name_vi' => 'BĐS Chính Chủ',
            'name_en' => 'BĐS Chính Chủ',
            'alias' => 'bds-chinh-chu',
            'slug' => 'bds-chinh-chu',
            'status' => 1,
            'created_user' => 1,
            'updated_user' => 1
        ]);

        $modelModules->create([
            'code' => 'realestate_owner',
            'name' => 'BĐS Chính Chủ',
            'cate_related' => $cateInfo->id
        ]);

        $cateInfo = $modelCate->create([
            'name_vi' => 'BĐS Nổi Bật',
            'name_en' => 'BĐS Nổi Bật',
            'alias' => 'bds-noi-bat',
            'slug' => 'bds-noi-bat',
            'status' => 1,
            'created_user' => 1,
            'updated_user' => 1
        ]);

        $modelModules->create([
            'code' => 'realestate_hot',
            'name' => 'BĐS Nổi Bật',
            'cate_related' => $cateInfo->id
        ]);

        $cateInfo = $modelCate->create([
            'name_vi' => 'BĐS Dự Án',
            'name_en' => 'BĐS Dự Án',
            'alias' => 'bds-du-an',
            'slug' => 'bds-du-an',
            'status' => 1,
            'created_user' => 1,
            'updated_user' => 1
        ]);

        $modelModules->create([
            'code' => 'realestate_project',
            'name' => 'BĐS Dự Án',
            'cate_related' => $cateInfo->id
        ]);

        $cateInfo = $modelCate->create([
            'name_vi' => 'BĐS Thành Viên',
            'name_en' => 'BĐS Thành Viên',
            'alias' => 'bds-thanh-vien',
            'slug' => 'bds-thanh-vien',
            'status' => 1,
            'created_user' => 1,
            'updated_user' => 1
        ]);

        $modelModules->create([
            'code' => 'realestate_member',
            'name' => 'BĐS Thành Viên',
            'cate_related' => $cateInfo->id
        ]);

        $cateInfo = $modelCate->create([
            'name_vi' => 'BĐS Mới Nhất',
            'name_en' => 'BĐS Mới Nhất',
            'alias' => 'bds-moi-nhat',
            'slug' => 'bds-moi-nhat',
            'status' => 1,
            'created_user' => 1,
            'updated_user' => 1
        ]);

        $modelModules->create([
            'code' => 'realestate_newest',
            'name' => 'BĐS Mới Nhất',
            'cate_related' => $cateInfo->id
        ]);

        //logo
        $modelModules->create([
            'code' => 'logo',
            'name' => 'Logo'
        ]);

        //news
        $modelModules->create([
            'code' => 'news',
            'name' => 'Tin Tức'
        ]);

        //view
        $modelModules->create([
            'code' => 'view',
            'name' => 'Xem Tin'
        ]);

        //create group admin
        $modelGroups->create([
            'name_vi' => 'Admin',
            'name_en' => 'Admin',
            'description_vi' => 'Admin',
            'description_en' => 'Admin',
            'type' => 'admin',
            'permission' => json_encode([
                'realestate_owner' => [1, 1, 1, 1],
                'realestate_hot' => [1, 1, 1, 1],
                'realestate_project' => [1, 1, 1, 1],
                'realestate_member' => [1, 1, 1, 1],
                'realestate_newest' => [1, 1, 1, 1],
                'logo' => [1, 1, 1, 1],
                'news' => [1, 1, 1, 1],
                'view' => [1, 1],
            ]),
            'status' => 1,
            'created_user' => 1,
            'updated_user' => 1
        ]);
        $modelGroups->create([
            'name_vi' => 'Nhân Viên',
            'name_en' => 'Nhân Viên',
            'description_vi' => 'Nhân Viên',
            'description_en' => 'Nhân Viên',
            'type' => 'admin',
            'permission' => json_encode([
                'realestate_owner' => [1, 1, 1, 0],
                'realestate_hot' => [1, 1, 1, 0],
                'realestate_project' => [1, 1, 1, 0],
                'realestate_member' => [1, 1, 1, 0],
                'realestate_newest' => [1, 1, 1, 0],
                'logo' => [1, 1, 1, 0],
                'news' => [1, 1, 1, 0],
                'view' => [0, 1],
            ]),
            'status' => 1,
            'created_user' => 1,
            'updated_user' => 1
        ]);
        $modelGroups->create([
            'name_vi' => 'Cộng Tác Viên',
            'name_en' => 'Cộng Tác Viên',
            'description_vi' => 'Cộng Tác Viên',
            'description_en' => 'Cộng Tác Viên',
            'type' => 'admin',
            'permission' => json_encode([
                'realestate_owner' => [0, 0, 0, 0],
                'realestate_hot' => [0, 0, 0, 0],
                'realestate_project' => [0, 0, 0, 0],
                'realestate_member' => [1, 1, 1, 0],
                'realestate_newest' => [1, 1, 1, 0],
                'logo' => [0, 0, 0, 0],
                'news' => [0, 0, 0, 0],
                'view' => [0, 1],
            ]),
            'status' => 1,
            'created_user' => 1,
            'updated_user' => 1
        ]);

        //create group member
        $modelGroups->create([
            'name_vi' => 'Thành Viên Tìm Kiếm BĐS',
            'name_en' => 'Thành Viên Tìm Kiếm BĐS',
            'description_vi' => 'Thành Viên Tìm Kiếm BĐS',
            'description_en' => 'Thành Viên Tìm Kiếm BĐS',
            'type' => 'member',
            'permission' => json_encode([
                'realestate_owner' => [0, 0, 0, 0],
                'realestate_hot' => [0, 0, 0, 0],
                'realestate_project' => [0, 0, 0, 0],
                'realestate_member' => [1, 1, 1, 1],
                'realestate_newest' => [0, 0, 0, 0],
                'logo' => [0, 0, 0, 0],
                'news' => [0, 0, 0, 0],
                'view' => [1, 0],
            ]),
            'display_order' => 1,
            'status' => 1,
            'created_user' => 1,
            'updated_user' => 1
        ]);
        $modelGroups->create([
            'name_vi' => 'Thành Viên Môi Giới',
            'name_en' => 'Thành Viên Môi Giới',
            'description_vi' => 'Thành Viên Môi Giới',
            'description_en' => 'Thành Viên Môi Giới',
            'type' => 'member',
            'permission' => json_encode([
                'realestate_owner' => [0, 0, 0, 0],
                'realestate_hot' => [0, 0, 0, 0],
                'realestate_project' => [0, 0, 0, 0],
                'realestate_member' => [1, 1, 1, 1],
                'realestate_newest' => [0, 0, 0, 0],
                'logo' => [0, 0, 0, 0],
                'news' => [0, 0, 0, 0],
                'view' => [1, 0],
            ]),
            'display_order' => 2,
            'status' => 1,
            'created_user' => 1,
            'updated_user' => 1
        ]);
        $modelGroups->create([
            'name_vi' => 'Thành Viên Chính Chủ',
            'name_en' => 'Thành Viên Chính Chủ',
            'description_vi' => 'Thành Viên Chính Chủ',
            'description_en' => 'Thành Viên Chính Chủ',
            'type' => 'member',
            'permission' => json_encode([
                'realestate_owner' => [0, 0, 0, 0],
                'realestate_hot' => [0, 0, 0, 0],
                'realestate_project' => [0, 0, 0, 0],
                'realestate_member' => [1, 1, 1, 1],
                'realestate_newest' => [0, 0, 0, 0],
                'logo' => [0, 0, 0, 0],
                'news' => [0, 0, 0, 0],
                'view' => [1, 0],
            ]),
            'display_order' => 3,
            'status' => 1,
            'created_user' => 1,
            'updated_user' => 1
        ]);
        $modelGroups->create([
            'name_vi' => 'Đối Tác',
            'name_en' => 'Đối Tác',
            'description_vi' => 'Đối Tác',
            'description_en' => 'Đối Tác',
            'type' => 'member',
            'permission' => json_encode([
                'realestate_owner' => [0, 0, 0, 0],
                'realestate_hot' => [0, 0, 0, 0],
                'realestate_project' => [1, 1, 1, 1],
                'realestate_member' => [0, 0, 0, 0],
                'realestate_newest' => [0, 0, 0, 0],
                'logo' => [1, 1, 1, 1],
                'news' => [1, 1, 1, 1],
                'view' => [1, 0],
            ]),
            'display_order' => 4,
            'status' => 1,
            'created_user' => 1,
            'updated_user' => 1
        ]);
    }
}
