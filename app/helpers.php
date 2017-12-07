<?php

if (!function_exists('format_date')) {

    /**
     * Function format date from a string
     *
     * @param string $strTime
     * @param string $format
     *
     * @return string
     */
    function format_date($strTime, $format = 'default')
    {
        if (empty($strTime)) {
            return '';
        }

        $masks = [
            'default' => 'd/m/Y H:i:s', // 20/10/2008 12:37:21
            'shortDate' => 'd/m/y', // 20/10/08
            'mediumDate' => 'd M, Y', // 20 Tháng 10, 2008
            'longDate' => 'd F, Y', // 20 Tháng mười, 2008
            'fullDate' => 'D, d F, Y', // Chủ nhật, 20 Tháng mười, 2008
            'shortTime' => 'H:i', // 5:46
            'mediumTime' => 'H:i:s', // 5:46:21
        ];

        if (array_key_exists($format, $masks)) {
            $format = $masks[$format];
        }

        return date($format, strtotime($strTime));
    }
}

if (!function_exists('change_language')) {

    /**
     * Function change language
     *
     * @param string $url
     * @param string $language
     *
     * @return string
     */
    function change_language($url, $language)
    {
        if (str_contains($url, '/' . config('app.locale'))) {
            return str_replace('/' . config('app.locale'), '/' . $language, $url);
        } else {
            return str_replace(config('app.url'), config('app.url') . '/' . $language, $url);
        }
    }
}

if (!function_exists('image_url')) {

    /**
     * Function show image
     *
     * @param string $file_name
     *
     * @return string
     */
    function image_url($file_name)
    {
        $file_name = ltrim($file_name, '/');

        if (!filter_var($file_name, FILTER_VALIDATE_URL) === false) {
            return $file_name;
        } else {
            return config('nhadat.upload_url') . $file_name;
        }
    }
}

if (!function_exists('check_permission')) {

    /**
     * Function check permission of user
     *
     * @param int $group_id
     * @param string $module
     * @param string $role
     *
     * @return string
     */
    function check_permission($group_id, $module, $role)
    {
        $arrRole = [
            'view' => 0,
            'add' => 1,
            'edit' => 2,
            'delete' => 3,
            'active' => 0,
            'inactive' => 1,
        ];

        $modelGroups = new \App\Models\Groups();

        $arrPermission = $modelGroups->getPermission($group_id);

        if (!empty($arrPermission)) {
            return $arrPermission[$module][$arrRole[$role]] == 1;
        }

        return false;
    }
}

if (!function_exists('check_permission_estate')) {

    /**
     * Function check permission estate of user
     *
     * @param int $group_id
     * @param string $role
     *
     * @return string
     */
    function check_permission_estate($group_id, $role)
    {
        $result = false;

        foreach (['realestate_owner', 'realestate_hot', 'realestate_project', 'realestate_member', 'realestate_newest'] as $module) {
            if (check_permission($group_id, $module, $role)) {
                $result = true;
                break;
            }
        }

        return $result;
    }
}

if (!function_exists('reset_permission')) {

    /**
     * Function reset all permission to false
     *
     * @param array $arrPermission
     *
     * @return array
     */
    function reset_permission($arrPermission)
    {
        $arrResult = [];

        foreach ($arrPermission as $module => $permission) {
            $arrResult[$module] = [];

            foreach ($permission as $role) {
                $arrResult[$module][] = 0;
            }
        }

        return $arrResult;
    }
}
