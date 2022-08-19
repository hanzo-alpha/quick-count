<?php
use Akaunting\Setting;
    /**
     * Sama dengan $this->config->set_item
     * @return void
     */
    if ( !function_exists('set_config') ) {
        function set_config() {
            $args = func_get_args();
            $jum = func_num_args();

            if ($jum > 0) {
                $arg1 = func_get_arg(0);
                if (is_array($arg1)) {
                    foreach($arg1 as $key=>$val) {
//                        $ci->config->set_item($key, $val);
                        //$setting = setting()->set($key, $val);
                        setting($key, $val);
                    }
                } else {
                    if ($jum === 1) {
                        $arg2 = '';
                    } else {
                        $arg2 = func_get_arg(1);
                    }
                    \setting($arg1, $arg2);
//                    $ci->config->set_item($arg1, $arg2);
                }
            }
        }
    }

    function cfg_e($item) {
        echo config_item($item);
    }

    function get_table_pkey($table) {
        $pkeys = config_item('table_pkeys');
        return $pkeys[$table] ?? $table.'_ID';
    }

    function get_table_name($alias, $inc_dbprefix = false) {
        $tables = config_item('table_names');
        if ( isset($tables[$alias])) {
            return $inc_dbprefix ? db_prefix($tables[$alias]) : $tables[$alias];
        }
        [$alias_x, $update] = array_pad(explode('-', $alias, 2), 2, false);
        if (! $update) {
            return $inc_dbprefix ? db_prefix($alias) : $alias;
        }

        if ($update === 'insert' || $update === 'update') {
            $tbname = $tables[$alias_x] ?? $alias;
            return $inc_dbprefix ? db_prefix($tbname) : $tbname;
        }
        return $inc_dbprefix ? db_prefix($alias) : $alias;
    }

    function app_method_exists($object, $method) {
        if (substr($method, 0, 1) === '_') {
            return false;
        }
        return method_exists($object, $method);
    }

    /**
     * Sama dengan $this->input->post
     * @return string
     */
    if ( !function_exists('post_value') ) {
        function post_value($index = '', $default = FALSE) {
            $ci = &get_instance();
            $res = $ci->input->post($index);
            return !$res ? $default : $res;
        }
    }

    /**
     * Sama dengan $this->input->get
     * @return string
     */
    if ( !function_exists('get_value') ) {
        function get_value($index = '', $default = FALSE, $allowed = array()) {
            $ci =& get_instance();
            $res = $ci->input->get($index);
            if (count($allowed) > 0) {
                if ( ! in_array($res, $allowed)) {
                    return $default;
                }
            }
            return !$res ? $default : $res;
        }
    }

    function get_post_value($index = '', $default = FALSE, $allowed = array()) {
        $ci =& get_instance();
        $res = $ci->input->get_post($index);
        if (count($allowed) > 0) {
            if ( ! in_array($res, $allowed)) {
                return $default;
            }
        }
        return !$res ? $default : $res;
    }

    /**
     * Sama dengan $this->input->is_ajax_request()
     * @return boolean
     */
    function is_ajax() {
        $ci=&get_instance();
        return $ci->input->is_ajax_request();
    }

    if (!function_exists('merge_params'))
    {
        function merge_params()
        {
            $args = func_get_args();
            $arr_to_merge = array();
            foreach ($args as $arg) {
                if ($arg == NULL || $arg == '') continue;
                if ( !is_array($arg) )
                    parse_str($arg, $arg);
                $arr_to_merge[] = $arg;
            }
            return call_user_func_array('array_merge', $arr_to_merge);
        }
    }

    /**
     * sama dengan lang() tapi pake fungsi sprintf
     * @return string
     */
    if (!function_exists('flang'))
    {
        function flang($item='') {
            $ci = &get_instance();
            $format = $ci->lang->line($item);
            if (func_num_args() <= 1)
                return $format;
            else {
                $args = func_get_args();
                $args[0] = $format;
                return call_user_func_array('sprintf', $args);
            }
        }
    }

    /**
     * sama dengan $this->encrypt->encode()
     * @return string
     */
    if (!function_exists('encrypt'))
    {
        function encrypt($str='')
        {
//            $CI = &get_instance();
//            $CI->load->library('encrypt');
//            return $CI->encrypt->encode($str);
            return encrypt($str);
        }
    }

    /**
     * sama dengan $this->encrypt->decode()
     * @return string
     */
    if (!function_exists('decrypt'))
    {
        function decrypt($str='')
        {
//            $CI = &get_instance();
//            $CI->load->library('encrypt');
//            return $CI->encrypt->decode($str);
            return decrypt($str);
        }
    }

    /**
     * sama dengan $this->encrypt->md5()
     * @return string
     */
    if (!function_exists('md5encrypt'))
    {
        function md5encrypt($str='')
        {
//            $CI = &get_instance();
//            $CI->load->library('encrypt');
//            return $CI->encrypt->md5($str);
            return md5($str);
        }
    }

    /**
     * menambahkan prefix pada string sesuai $config['global_prefix']
     * @return string
     */

    function add_prefix($str='') {
        return env('APP_GLOBAL_PREFIX').$str;
    }

    /**
     * menambahkan prefix pada string sesuai config db prefix
     * @return string
     */
    if ( !function_exists('db_prefix') )
    {
        function db_prefix($tbname = '') {
            $CI = DB::setTablePrefix($tbname);
            return $CI->getTablePrefix();
        }
    }

    /**
     * generate attribut, ex: id="myid" class="myclass"
     * @param string/array $params
     */
    if ( !function_exists('build_html_attr') ) {
        function build_html_attr($params = NULL) {
            if ($params == NULL) return '';
            if ( !is_array($params) ) {
                parse_str($params, $params);
            }
            $attr_arr = array();
            foreach ($params as $key => $val) {
                if ($val == NULL && $key != 'value')
                    $attr_arr[] = $key; else
                    $attr_arr[] = "{$key}=\"{$val}\"";
            }
            return implode(' ', $attr_arr);
        }
    }

    if ( !function_exists('load_library') ) {
        function load_library($items = NULL) {
            $ci = &get_instance();
            if (!is_array($items)) {
                $items = str_replace(' ', '', $items);
                $items = explode(',', $items);
            }
            $ci->load->library($items);
        }
    }

    if ( !function_exists('load_model') ) {
        function load_model($items = NULL) {
            $ci = &get_instance();
            if (!is_array($items)) {
                $items = str_replace(' ', '', $items);
                $items = explode(',', $items);
            }
            $ci->load->model($items);
        }
    }

    function load_helper($items = NULL) {
        $CI =& get_instance();
        $CI->load->helper($items);
    }

    if ( !function_exists('load_file') ) {
        function load_file($file = NULL, $return = FALSE) {
            $ci = &get_instance();
            $ci->load->file($file, $return);
        }
    }

    if ( !function_exists('load_view') ) {
        function load_view($view_name = NULL, $data = NULL, $return = FALSE) {
            $ci = &get_instance();
            return $ci->load->view($view_name, $data, $return);
        }
    }

    function get_where_value($table = '', $field ='', $where, $default = FALSE) {
        $ci = DB::table($table);

        $qw = $ci->select( "{$field} AS val")->where($where);

        if ($qw->count() > 0) {
            return $qw->get()->first()->val;
        }
        return $default;
    }

    function get_row($table, $where, $select = NULL, $output_array = TRUE)
    {
        $ci = DB::table($table);
        $ci->limit(1);
        if ($select !== NULL) {
            $ci->select($select);
        }
        $qw = $ci->where($table, $where);
        if ($qw->count() > 0) {
            return $output_array ? $qw->get()->toArray() : $qw->get();
        }
        return false;
    }


// ===== User

    function is_logged_in() {
        $ci =& get_instance();
        return $ci->user->is_logged_in();
    }

    function is_user_uri($uri = NULL) {
        $user_uri = config_item('user_uri');
        if (empty($user_uri)) return FALSE;
        if ($uri === NULL) $uri = &get_instance()->uri->segment(1, 'index');
        return ($uri === $user_uri);
    }

    function user_password_encrypt($str) {
        $ci =& get_instance();
        return $ci->user->password_encrypt($str);
    }

    function user_password_decrypt($str) {
        $ci =& get_instance();
        return $ci->user->password_decrypt($str);
    }

    function user_password_match($str1, $str2) {
        $ci =& get_instance();
        return $ci->user->password_match($str1, $str2);
    }

    function get_logged_in_data($item = NULL) {
        if ( $data = config_item('_logged_in_data_') ) {
            return $data;
        }

        $data = $ci->user->get_logged_in_data();
        return ($item === NULL) ? $data : $data[$item];
    }

    function current_user_can($capablities) {
        $ci =& get_instance();
        $udata = $ci->user->get_logged_in_data();
        is_array($capablities) OR $capablities = array($capablities);
        $level_cap = $udata['capabilities'];

        // custom
        if ($udata['level'] === 'pegawai') {
            $peg_cap = config_item('pegawai_capabilities');
            $hak_akses = explode(';', $udata['akses']);
            $level_cap = array();
            foreach ($hak_akses as $akses) {
                $level_cap = array_merge($level_cap, $peg_cap[$akses]);
            }
        }

        $level_incap = $udata['incapabilities'];
        if ($level_cap === '*') {
            if ( is_array($level_incap) ) {
                foreach($capablities as $cap) {
                    if (in_array($cap, $level_incap)) return FALSE;
                    $exp = explode('_', $cap, 2);
                    if (in_array($exp[0].'_*', $level_incap)) return FALSE;
                }
            }
            return TRUE;
        }
        if ( ! is_array($level_incap)) $level_incap = array();
        foreach($capablities as $cap) {
            if (in_array($cap, $level_cap) && ! in_array($cap, $level_incap)) return TRUE;
            $exp = explode('_', $cap, 2);
            if (in_array($exp[0].'_*', $level_cap) && ! in_array($exp[0].'_*', $level_incap)) return TRUE;
        }
        return FALSE;
    }

    /** @param string $item name|label|name-label */
    function get_user_levels($item = 'name-label', $exclude = array()) {
        static $levels = NULL;
        if ($levels === NULL) {
            $ci =& get_instance();
            $levels = array();
            foreach ($ci->user->user_levels as $level => $data) {
                if (in_array($level, $exclude)) continue;
                $levels[$level] = $data['label'];
            }
        }
        if ($item === 'name') return array_keys($levels);
        elseif ($item === 'label') return array_values($levels);
        else return $levels;
    }

    function user_level_dropdown($selected = '', $extra = '', $exclude = array()) {
        $ci =& get_instance();
        $ci->load->helper('form');
        return form_dropdown('level', get_user_levels('name-label', $exclude), $selected, $extra);
    }

    function restrict_by_cap($capablities) {
        if ( ! current_user_can($capablities)) {
            set_config('__page_restricted__', 'true');
            return FALSE;
        }
        return TRUE;
    }

    function set_restricted() {
        return set_config('__page_restricted__', 'true');
    }

    function page_is_restricted() {
        return config_item('__page_restricted__') === 'true';
    }

    if ( ! function_exists('config_item'))
    {
        /**
         * Returns the specified config item
         *
         * @param	string
         * @return	mixed
         */
        function config_item($item)
        {
            static $_config;

            if (empty($_config))
            {
                // references cannot be directly assigned to static variables, so we use an array
//                $_config[0] = setting();
                $_config = config();
            }

            return $_config->get($item);
        }
    }

    /* End of file common_helper.php */
    /* Location: ./app/helpers/common_helper.php */
