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
