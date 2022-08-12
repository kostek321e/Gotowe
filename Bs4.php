<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * @author Piotr Maślanka <p.maslanka@grupadbk.com>
 * 
 */

/**
 * Description of Bootstrap
 *
 * @author Piotr Maślanka <p.maslanka@grupadbk.com>
 */
function Bs4_Load($class) {
    $file = dirname(__FILE__) . "/" . str_replace("_", DIRECTORY_SEPARATOR, $class) . ".php";
    if (is_file($file))
        include_once $file;
}

spl_autoload_register("Bs4_Load");

class Bootstrap {

    protected $_content = null;

    const COLOR_DEFAULT = 'default';
    const COLOR_PRIMARY = 'primary';
    const COLOR_SECONDARY = 'secondary';
    const COLOR_SUCCESS = 'success';
    const COLOR_DANGER = 'danger';
    const COLOR_WARNING = 'warning';
    const COLOR_INFO = 'info';
    const COLOR_LIGHT = 'light';
    const COLOR_DARK = 'dark';
    const COLOR_ADD = 'info';
    const COLOR_EDIT = 'warning';
    const COLOR_DEL = 'danger';

    function __construct() {
        
    }

    function linkparams($aTab = array(), $aZamien = array()) {
// Zamienia tablicę na parametry linku
        $param = "";
        while (list($i, $v) = each($aTab)) {
            $aZamien[$i] = $v;
        }
        reset($aTab);
        while (list($i, $v) = each($aZamien)) {
            if ($v !== null) {
                $param .= $i . "=" . $v . "&";
            }
        }
        $param = trim($param);
        $param = substr($param, 0, strlen($param) - 1);
        return $param;
    }

    /**
     * 
     * @param array $attr
     * @param array $aOut
     */
    static function parseAttributes(&$attr = array(), &$aOut = array()) {
        if (is_array($attr) && !empty($attr)) {
            $aT = $attr;
            $ak = array_keys($aT);
            foreach ($ak as $v) {
                if ($v == 'class') {
                    $attr[$v] = array();
                    foreach ($aT[$v] as $key => $value) {
                        $p = $attr[$v];
                        $attr[$v] = array_merge($attr[$v], explode(' ', $value));
                    }
                    $attr[$v] = array_unique($attr[$v]);
                    $attr[$v] = implode(' ', $attr[$v]);
                } else {
                    $attr[$v] = array();
                    foreach ($aT[$v] as $key => $value) {
                        $p = $attr[$v];
                        $attr[$v] = array_merge($attr[$v], explode(';', $value));
                    }
                    foreach ($attr[$v] as $key => $value) {
                        if (empty($value)) {
                            unset($attr[$v][$key]);
                        }
                    }
                    $attr[$v] = array_unique($attr[$v]);
                    $attr[$v] = implode(';', $attr[$v]);
                }
            }
        } else {
            $attr = array();
        }
        $ret = "";
        foreach ($attr as $key => $value) {
            if (($k = array_search($key, $aOut)) !== FALSE) {
                $aOut[$key] = $value;
                unset($k);
            } else {
                $ret .= $key . '="' . $value . '" ';
            }
        }
        return $ret;
    }

    static function parseAttr(&$attr = array(), $add_attr = null) {
        if (is_array($attr) && !empty($attr)) {
            if (is_array($add_attr) && !empty($add_attr)) {
                unset($add_attr['color']);
                if (isset($add_attr['class']) && isset($attr['class'])) {
                    $attr['class'] .= ' ' . $add_attr['class'];
                    $attr['class'] = implode(' ', array_unique(explode(' ', $attr['class'])));
                    unset($add_attr['class']);
                } else if (isset($add_attr['class']) && !isset($attr['class'])) {
                    $attr['class'] = $add_attr['class'];
                    unset($add_attr['class']);
                }
                foreach ($add_attr as $k => $v) {
                    $attr[$k] = $v;
                }
            }
            $temp = array();
            foreach ($attr as $k => $v) {
                $temp[$k] = implode(' ', array_unique(explode(' ', $v)));
            }
        } else {
            $temp = array();
            if (isset($add_attr['class'])) {
                $temp['class'] = $add_attr['class'];
            }
        }
        $ret = "";
        foreach ($temp as $key => $value) {
            $ret .= $key . '="' . $value . '" ';
        }
        return $ret;
    }

    /**
     * 
     * @return string
     * @author Piotr Maślanka <p.maslanka@grupadbk.com>
     */
    function __toString() {
        return $this->render();
    }

    /**
     * 
     * @author Piotr Maślanka <p.maslanka@grupadbk.com>
     */
    function show() {
        echo $this->render();
    }

}
