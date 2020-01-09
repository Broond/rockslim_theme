<?php
/**
 * Bulma-Navwalker
 *
 * @package Bulma-Navwalker
 */

/**
 * Class Name: Navwalker
 * Plugin Name: Bulma Navwalker
 * Plugin URI:  https://github.com/Poruno/Bulma-Navwalker
 * Description: An extended Wordpress Navwalker object that displays Bulma framework's Navbar https://bulma.io/ in Wordpress.
 * Author: Carlo Operio - https://www.linkedin.com/in/carlooperio/, Bulma-Framework
 * Author URI: https://github.com/wp-bootstrap
 * License: GPL-3.0+
 * License URI: https://github.com/Poruno/Bulma-Navwalker/blob/master/LICENSE
 */

	class Navwalker extends Walker_Nav_Menu {

        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $dropdownClasses = $depth >= 1 && $args->walker->has_children? 'dropdown-content' : 'navbar-dropdown';
            $output .= '<div class="'.$dropdownClasses.'">';
        }

        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

            

            $hasChildren = $args->walker->has_children;
            $liClasses = $depth >= 2 ? 'dropdown-item'  : 'navbar-item ';
            

            if ($hasChildren) {
                if($depth >= 1) {
                    $liClasses = "nested navbar-item dropdown";
                    $output .= "<div class='".$liClasses."'>";
                    $output .= "\n<div class='dropdown-trigger'>";
                    $output .= "\n<button class='button' aria-haspop='true' aria-controls='dropdown-menu'>";
                    $output .= "\n<span>".$item->title."</span>\n<span class='icon is-small'>";
                    $output .= "\n<i class='fas fa-chevron-right' aria-hidden='true'></i>";
                    $output .= "\n</button>";
                    $output .= "\n</div>";
                    $output .= "\n<div class='dropdown-menu' role='menu'>";
                } else {
                    $liClasses .= " has-dropdown is-hoverable";
                    $output .= "<div class='".$liClasses."'>";
                    $output .= "\n<a class='navbar-link' href='".$item->url."'>".$item->title."</a>";
                }
                
            } else {
                $liClasses .= $item->current? ' is-active' : '';
                $output .= "<a class='".$liClasses."' href='".$item->url."'>".$item->title;
            }

            // Adds has_children class to the item so end_el can determine if the current element has children
            if ( $hasChildren ) {
                $item->classes[] = 'has_children';
            }
        }
        
        public function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ){

            if(in_array("has_children", $item->classes)) {

               if ($depth >= 1 && $args->walker->has_children) {
                   $output .= "</div>\n</div>";
               } else {
                   $output .= "</div>";
               }
            }
            $output .= "</a>";
        }

        public function end_lvl (&$output, $depth = 0, $args = array()) {

            if ($depth >= 1) {
                $output .= "\n</div>\n</div>";
            } else {
                $output .= "</div>";
            }
        }
    }
?>