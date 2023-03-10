<?php

function my_database()
{
    return \DB::connection(\Session::get('my_db_connection'));
}


function getTableWhere($table, $where)
{
    $data = my_database()->table($table)
        ->select(my_database()->raw('*'))
        ->where($where)->get();
    return $data;
}

function createTreeView($parent, $menu, $from_page)
{
    if ($from_page == 'business') {
        $html = "";
        if (isset($menu['parents'][$parent])) {
            $html .= '<ul class="jstree-container-ul jstree-children" role="group" >';
            foreach ($menu['parents'][$parent] as $itemId) {
                $total_child_device = $menu['items'][$itemId]->total_child_device;
                $total_device = $menu['items'][$itemId]->total_device;
                $crm_status = "";
                $global_status = '<span class="kt-badge  kt-badge--' . $menu['items'][$itemId]->status_color . ' kt-badge--inline">' . $menu['items'][$itemId]->global_status_name . ' </span>';
                if ($menu['items'][$itemId]->active == 1) {
                    $crm_status = '<span class="kt-badge  kt-badge--success crm_status_badge"> </span>';
                } else {
                    $crm_status = '<span class="kt-badge  kt-badge--warning crm_status_badge"> </span>';
                }

                if (!isset($menu['parents'][$itemId])) {
                    //$html .= "<li>" . $menu['items'][$itemId]->name . "</li>";
                    $html .= '<li  role="treeitem" data-jstree="" aria-selected="false" aria-level="1" aria-labelledby="j2_' . $menu['items'][$itemId]->id . '_anchor" id="j2_' . $menu['items'][$itemId]->id . '" class="jstree-node  jstree-leaf jstree-last">
                        
                        <a class="jstree-anchor dealer_tree_item" href="javascript:void(0);" onClick="load_dealer(' . $menu['items'][$itemId]->id . ');" tabindex="-1" id="j2_' . $menu['items'][$itemId]->id . '_anchor">' . $crm_status . ' ' . $menu['items'][$itemId]->name . ' ' . $global_status . '(' . $total_child_device . '/' . $total_device . ')
                        </a>
                    </li>';
                }
                if (isset($menu['parents'][$itemId])) {
                    $html .= '<li  role="treeitem" aria-selected="false" aria-level="1" aria-labelledby="j2_' . $menu['items'][$itemId]->id . '_anchor" aria-expanded="true" id="j2_' . $menu['items'][$itemId]->id . '" class="jstree-node  jstree-open">
                        
                        <a class="jstree-anchor dealer_tree_item" href="javascript:void(0);" onClick="load_dealer(' . $menu['items'][$itemId]->id . ');" tabindex="-1" id="j2_' . $menu['items'][$itemId]->id . '_anchor">' . $crm_status . ' ' . $menu['items'][$itemId]->name . ' ' . $global_status . '(' . $total_child_device . '/' . $total_device . ')
                        </a>';
                    $html .= createTreeView($itemId, $menu, 'business');
                    $html .= '</li>';
                }
            }
            $html .= "</ul>";
        }
        return $html;
    } else if ($from_page == 'json') {
        $final_array = array();
        if (isset($menu['parents'][$parent])) {
            foreach ($menu['parents'][$parent] as $itemId) {
                $total_child_device = $menu['items'][$itemId]->total_child_device;
                $total_device = $menu['items'][$itemId]->total_device;
                $crm_status = "";
                $global_status = '<span class="kt-badge  kt-badge--' . $menu['items'][$itemId]->status_color . ' kt-badge--inline">' . $menu['items'][$itemId]->global_status_name . ' </span>';
                if ($menu['items'][$itemId]->active == 1) {
                    $crm_status = '<span class="kt-badge  kt-badge--success crm_status_badge"> </span>';
                } else {
                    $crm_status = '<span class="kt-badge  kt-badge--warning crm_status_badge"> </span>';
                }
                if (!isset($menu['parents'][$itemId])) {
                    $new_item = array(
                        'id' => $menu['items'][$itemId]->id,
                        'text' => $crm_status . ' ' . $menu['items'][$itemId]->name . ' ' . $global_status . '(' . $total_child_device . '/' . $total_device . ')',
                        'icon' => 'fa fa-user',
                        'state' => array(),
                        'only_name' => $menu['items'][$itemId]->name,
                        'item_details' => $menu['items'][$itemId],
                        'children' => array()
                    );
                    array_push($final_array, $new_item);
                }
                if (isset($menu['parents'][$itemId])) {
                    $new_item = array(
                        'id' => $menu['items'][$itemId]->id,
                        'text' => $crm_status . ' ' . $menu['items'][$itemId]->name . ' ' . $global_status . '(' . $total_child_device . '/' . $total_device . ')',
                        'icon' => 'fa fa-users',
                        'state' => array('opened' => false),
                        'only_name' => $menu['items'][$itemId]->name,
                        'item_details' => $menu['items'][$itemId]
                    );

                    $new_item['children'] = createTreeView($itemId, $menu, 'json');
                    array_push($final_array, $new_item);
                }
            }
        }
        return $final_array;
    } else if ($from_page == 'summary') {
        $final_array = array();
        $over_all_nodes = 0;
        if (isset($menu['parents'][$parent])) {
            $total_children_nodes = 0;
            foreach ($menu['parents'][$parent] as $itemId) {
                $total_child_device = $menu['items'][$itemId]->total_child_device;
                $total_device = $menu['items'][$itemId]->total_device;
                $crm_status = "";
                $global_status = '<span class="kt-badge  kt-badge--' . $menu['items'][$itemId]->status_color . ' kt-badge--inline">' . $menu['items'][$itemId]->global_status_name . ' </span>';
                if ($menu['items'][$itemId]->active == 1) {
                    $crm_status = '<span class="kt-badge  kt-badge--success crm_status_badge"> </span>';
                } else {
                    $crm_status = '<span class="kt-badge  kt-badge--warning crm_status_badge"> </span>';
                }

                if (!isset($menu['parents'][$itemId])) {
                    $new_item = array(
                        'id' => $menu['items'][$itemId]->id,
                        'text' => $crm_status . ' ' . $menu['items'][$itemId]->name . ' ' . $global_status . '(' . $total_child_device . '/' . $total_device . ')',
                        'icon' => 'fa fa-user',
                        'state' => array(),
                        'only_name' => $menu['items'][$itemId]->name,
                        'item_details' => $menu['items'][$itemId],
                        'children' => array()
                    );
                    $over_all_nodes += count($new_item['children']);
                    array_push($final_array, $new_item);
                }
                if (isset($menu['parents'][$itemId])) {
                    $new_item = array(
                        'id' => $menu['items'][$itemId]->id,
                        'text' => $crm_status . ' ' . $menu['items'][$itemId]->name . ' ' . $global_status . '(' . $total_child_device . '/' . $total_device . ')',
                        'icon' => 'fa fa-users',
                        'state' => array('opened' => false),
                        'only_name' => $menu['items'][$itemId]->name,
                        'item_details' => $menu['items'][$itemId]
                    );

                    $new_item['children'] = createTreeView($itemId, $menu, 'summary');
                    $total_children_nodes += (isset($new_item['children'])) ? count($new_item['children']) : 0;
                    $new_item['total_child'] = $total_children_nodes;
                    array_push($final_array, $new_item);
                }
            }
        }
        return $final_array;
    } else if ($from_page == 'auto') {
        $final_array = array();
        if (isset($menu['parents'][$parent])) {
            foreach ($menu['parents'][$parent] as $itemId) {
                if (!isset($menu['parents'][$itemId])) {
                    $new_item = array(
                        'id' => $menu['items'][$itemId]->id,
                        'text' => $menu['items'][$itemId]->name,
                    );
                    array_push($final_array, $new_item);
                }
                if (isset($menu['parents'][$itemId])) {
                    $new_item = array(
                        'id' => $menu['items'][$itemId]->id,
                        'text' => $menu['items'][$itemId]->name
                    );

                    $new_item['children'] = createTreeView($itemId, $menu, 'auto');
                    array_push($final_array, $new_item);
                    //createTreeView($itemId, $menu,'auto');
                }
            }
        }
        return $final_array;
    }
}

function createTreeView_v2($parent, $menu)
{
    // Builds the array lists with data from the SQL result
    foreach ($menu as $items) {
        // Create current menus item id into array
        $menus['items'][$items->id] = $items;
        // Creates list of all items with children
        $menus['parents'][$items->parent_id][] = $items->id;
    }
    $final_array = array();
    if (isset($menu['parents'][$parent])) {
        foreach ($menu['parents'][$parent] as $itemId) {
            if (!isset($menu['parents'][$itemId])) {
                $new_item = array(
                    'id' => $menu['items'][$itemId]->id,
                    'text' => $menu['items'][$itemId]->item_name,
                );
                array_push($final_array, $new_item);
            }
            if (isset($menu['parents'][$itemId])) {
                $new_item = array(
                    'id' => $menu['items'][$itemId]->id,
                    'text' => $menu['items'][$itemId]->item_name
                );

                $new_item['children'] = createTreeView_v2($itemId, $menu);
                array_push($final_array, $new_item);
                //createTreeView($itemId, $menu,'auto');
            }
        }
    }
    return $final_array;
}

function createDynamicMenu($parent, $from_page)
{
    //global $my_connection;
    $result = my_database()->select("SELECT m.*, p.group_id, p.can_list,p.can_view,p.can_create,p.can_update,p.can_delete FROM `tbl_menus` m left join user_permission p on p.module_id = m.module_id where p.group_id=" . \Session::get('user_group_id') . " and p.can_list=1 order by m.module_id, m.sort asc");
    //return $result;

    $menu = array(
        'items' => array(),
        'parents' => array()
    );

    foreach ($result as $items) {
        $menu['items'][$items->id] = $items;
        $menu['parents'][$items->parent_id][] = $items->id;
    }

    if ($from_page == 'auto') {
        $final_array = array();
        if (isset($menu['parents'][$parent])) {
            foreach ($menu['parents'][$parent] as $itemId) {
                if (!isset($menu['parents'][$itemId])) {
                    $new_item = array(
                        'id' => $menu['items'][$itemId]->id,
                        'menu_name' => $menu['items'][$itemId]->menu_name,
                        'menu_label' => $menu['items'][$itemId]->label,
                        'url_link' => $menu['items'][$itemId]->url_link
                    );
                    array_push($final_array, $new_item);
                }
                if (isset($menu['parents'][$itemId])) {
                    $new_item = array(
                        'id' => $menu['items'][$itemId]->id,
                        'menu_name' => $menu['items'][$itemId]->menu_name,
                        'menu_label' => $menu['items'][$itemId]->label,
                        'url_link' => $menu['items'][$itemId]->url_link
                    );

                    $new_item['children'] = createDynamicMenu($itemId, 'auto');
                    array_push($final_array, $new_item);
                }
            }
        }
        return $final_array;
    }

    if ($from_page == 'html') {
        $final_array = '';
        if (isset($menu['parents'][$parent])) {
            foreach ($menu['parents'][$parent] as $itemId) {
                if (!isset($menu['parents'][$itemId])) {
                    $menu['parents'][$itemId] = sortAssociativeArrayByKey($menu['parents'][$itemId], "sort", "ASC");
                    $final_array .= '<li class="kt-menu__item " aria-haspopup="true"><a href="' . url($menu['items'][$itemId]->url_link) . '" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><i class="' . $menu['items'][$itemId]->menu_icon . '"> </i> </span><span class="kt-menu__link-text">' . $menu['items'][$itemId]->menu_name . '</span></a></li>';
                }
                if (isset($menu['parents'][$itemId])) {
                    $final_array .= '<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><i class="' . $menu['items'][$itemId]->menu_icon . '"> </i> </span><span class="kt-menu__link-text">' . $menu['items'][$itemId]->menu_name . '</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a> <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">' . createDynamicMenu($itemId, 'html') . '</ul></div>';
                }
            }
        }
        return $final_array;
    }
}

function sortAssociativeArrayByKey($array, $key, $direction)
{

    switch ($direction) {
        case "ASC":
            usort($array, function ($first, $second) use ($key) {
                return $first[$key] <=> $second[$key];
            });
            break;
        case "DESC":
            usort($array, function ($first, $second) use ($key) {
                return $second[$key] <=> $first[$key];
            });
            break;
        default:
            break;
    }

    return $array;
}

function generate_dropdown($type, $group, $group_table = null, $group_column_name = null, $item_table = null, $item_group_name = null, $item_column_names = null, $text_name = null)
{
    if ($type == 'html') {

        $final_array = '';
        if ($group) {
            $group_array = my_database()->select("select id, " . $group_column_name . " as group_name from " . $group_table . " order by id asc");
            if (count($group_array) > 0) {
                $item_array = my_database()->select("select id, " . $item_column_names . ", " . $text_name . " as text_name," . $item_group_name . " as group_id from " . $item_table);
                $group_counter = 1;
                foreach ($group_array as $g) {
                    $final_array .= '<optgroup label="' . $g->group_name . '" class="group-' . $group_counter . '">';
                    foreach ($item_array as $i) {
                        if ($i->group_id == $g->id) {
                            $final_array .= '<option value="' . $i->id . '">' . $i->text_name . '</option>';
                            //$final_array[$g->group_name][] = $i;
                        }
                    }
                    $final_array .= '</optgroup>';
                    $group_counter++;
                }
            }
        }
        return $final_array;
    } else {
        $final_array = [];
        if ($group) {
            $group_array = my_database()->select("select id, " . $group_column_name . " as group_name from " . $group_table . " order by id asc");
            if (count($group_array) > 0) {
                $item_array = my_database()->select("select id, " . $item_column_names . ", " . $item_group_name . " as group_id from " . $item_table);
                foreach ($group_array as $g) {
                    foreach ($item_array as $i) {
                        if ($i->group_id == $g->id) {
                            $final_array[$g->group_name][] = $i;
                        }
                    }
                }
            }
        }
        return $final_array;
    }
}

function generate_staff_dropdown_by_type_group($vehicle = null)
{
    $final_array = '';
    $optgroup_array = '';
    $assigned_staff = [];

    $group_array = my_database()->select("select id, name  from master_settings where type=17 order by name  asc");

    $item_array = my_database()->select("select * from vehicle_staff order by id asc");

    if ($vehicle) {
        $vehicle_staff = my_database()->select("select vehicle_staff_id from vehicles where id = $vehicle")[0];
        if ($vehicle_staff->vehicle_staff_id) {
            $assigned_staff = explode(",", $vehicle_staff->vehicle_staff_id);
        }
    }

    $group_counter = 1;

    if (count($group_array) > 0) {

        foreach ($group_array as $g) {

            $optgroup_array .= '<optgroup label="' . $g->name . ' " class="group-' . $group_counter . '">';
            if (count($item_array) > 0) {
                foreach ($item_array as $i) {
                    $status = ['Inactive', 'Active'];
                    if ($i->staff_type == $g->id) {
                        $optgroup_array .= '<option value="' . $i->id . '"';
                        if (in_array($i->id, $assigned_staff)) {
                            $optgroup_array .= ' selected ';
                        }
                        $optgroup_array .= '">' . $i->staff_id . ' - ' . $i->staff_name . ' - ' . $i->phone . ' - ' . $status[$i->status] . '</option>';
                    }
                }
            }

            $optgroup_array .= '</optgroup>';
            $group_counter++;
        }
    }
    $final_array =  $optgroup_array;

    echo $final_array;
    return;
}

function generate_simple_dropdown($table, $column, $where = null, $select = null)
{
    $string = "select id, " . $column . " as column_name from " . $table;
    if ($where) {
        $string .= " where " . $where;
    }
    $string .= " order by " . $column . " asc";
    $query = my_database()->select($string);

    $htmlContent = "<option value=''>Select</option>";

    if ($query) {
        foreach ($query as $q) {
            $htmlContent .= "<option value='$q->id'";

            if ($select && $select == $q->id) {
                $htmlContent .= "selected";
            }

            $htmlContent .= ">$q->column_name</option>";
        }

        echo $htmlContent;
        return;
    }
}

function generate_custom_dropdown($table_name, $display_name, $other_columns = null)
{
    if (!is_null($table_name) && !is_null($display_name)) {
        if (!is_null($other_columns)) {
            $all_data = my_database()->select("select id,parent_id, " . $display_name . " as item_name," . $other_columns . " from " . $table_name);
        } else {
            $all_data = my_database()->select("select id,parent_id, " . $display_name . " as item_name from " . $table_name);
        }

        if (count($all_data) > 0) {
            $tree = buildTree($all_data);
            return printTree($tree);
        }
    }
}

function buildTree(array $data, $parent = 0)
{
    $tree = array();
    foreach ($data as $d) {
        if ($d->parent_id == $parent) {
            $children = buildTree($data, $d->id);
            if (!empty($children)) {
                $d->_children = $children;
            }
            $tree[] = $d;
        }
    }
    return $tree;
}

function createNestedTable()
{
    $query = my_database()->select("select c.*, p.title as parent_name, p.code_no as parent_code from chart_of_accounts c left join chart_of_accounts p on p.id=c.parent_id order by c.id asc");

    $buildTree = buildTree($query, 0);
    return getCatTable($buildTree, 0);
}


function getCatTable($array, $dash = 0)
{
    foreach ($array as $cats) {
        // echo '<tr><td>' . str_repeat(" - ", $dash) . $cats->title . ' (' . $cats->code_no . ')</td><td>' .  $cats->description .'</td></tr>';

        $cats->accountHeadName = str_repeat(" - ", $dash) . $cats->title;
        if (isset($cats->_children) && !empty($cats->_children)) {
            getCatTable($cats->_children, $dash + 1);
        }
    }
    return $array;
}



function printTree($tree, $r = 0, $p = null)
{
    foreach ($tree as $t) {
        if (count($tree) > 1) {
            $r = count($tree) - 1;
        }

        $dash = ($t->parent_id == 0) ? '' : str_repeat(' - ', $r) . ' ';
        if (isset($t->code_no) && isset($t->transactional)) {
            $t->transactional = ($t->transactional == 1) ? 'Transactional' : 'Group';
            $mytext = $t->item_name . ' (' . $t->code_no . '-' . $t->transactional . ')';
            printf("<option value='%d'>%s%s</option>", $t->id, $dash, $mytext);
        }
        if ($t->parent_id == $p) {
            $r = 0;
        }

        if (isset($t->_children)) {
            printTree($t->_children, ++$r, $t->parent_id);
        }
    }
}

function arrayTree($tree, $r = 0, $item_id, $p = null)
{
    foreach ($tree as $i => $t) {
        $dash = ($t->parent_id == 0) ? '' : str_repeat('-', $r) . ' ';
        if ($t->id == $item_id) {
            $t->title = $dash . '' . $t->title;
            return $t->title;
            //break;
        }
        if ($t->parent_id == $p) {
            // reset $r
            $r = 0;
        }
        if (isset($t->_children)) {
            arrayTree($t->_children, ++$r, $t->parent_id);
        }
    }
}


function dropdown_with_multi_option($table, $column1, $column2, $selected = null, $where = null)
{
    $string = "select id, " . $column1 . " as column_name1," . $column2 . " as column_name2 from " . $table;
    if ($where) {
        $string .= " where " . $where;
    }
    $string .= " order by " . $column1 . " asc";
    $query = my_database()->select($string);

    $htmlContent = "<option value=''>Select</option>";

    if ($query) {
        foreach ($query as $q) {
            $htmlContent .= "<option value='$q->id'";
            if ($selected && $q->id == $selected) {
                $htmlContent .= "selected='selected'";
            }
            $htmlContent .= ">$q->column_name1 - $q->column_name2</option>";
        }

        echo $htmlContent;
        return;
    }
}

function get_status_time($total_days)
{
    if ($total_days == '') {
        return '';
    } else {

        $years = ($total_days / 365); // days / 365 days
        $years = floor($years); // Remove all decimals

        $months = ($total_days % 365) / 30.5; // I choose 30.5 for Month (30,31) ;)
        $months = floor($months); // Remove all decimals
        $days_year = ($years > 0) ? (365 / $years) : 0;
        $days_month = ($months > 0) ? (30 * $months) : 0;

        $days = $total_days - ($days_year + $days_month);

        if ($days >= 30) {
            $days = $days - 30;
            $months += 1;
        }

        $final_string = "";
        $show_days = '';

        if ($years > 0) {
            if ($months > 0 && $days == 0) {
                $final_string .= $years . 'y ' . $months . 'm ';
            } else if ($months > 0 && $days > 0) {
                $final_string .= $years . 'y ' . $months . 'm ' . $days . 'd';
            } else if ($months == 0 && $days > 0) {
                $final_string .= $years . 'y ' . $days . 'd';
            } else {
                $final_string .= $years . 'y ';
            }
            $show_days .= ' (' . $total_days . 'd)';
        } else if ($months > 0) {
            if ($days > 0) {
                $final_string .= $months . 'm ' . $days . 'd ';
            } else {
                $final_string .= $months . 'm ';
            }

            $show_days .= ' (' . $total_days . 'd)';
        } else {
            $final_string .= $total_days . 'd ';
        }
        return $final_string . $show_days;
    }
}


function getChildrenSum($array)
{
    $sum = 0;

    if (count($array) > 0) {
        foreach ($array as $item) {
            $sum++;
            $sum += getChildrenSum($item['children']);
        }
        return $sum;
    } else return 0;
}

function getSumFromArray($array, $guid)
{
    $count = 0;
    foreach ($array as $item) {
        if (isset($item['id']))
            if ($item['id'] == $guid)
                $count += getChildrenSum($item['children']);
    }
    return $count;
}
function getChildrenCount($array)
{
    $sum = '';
    if (count($array) > 0) {
        foreach ($array as $item) {
            $sum .= $item['id'] . ',';
            $sum .= getChildrenCount($item['children']);
        }
        return $sum;
    }
}

function getCountFromArray($array, $guid)
{
    $count = '';
    foreach ($array as $item) {
        if (isset($item['id']))
            if ($item['id'] == $guid)
                $count .= getChildrenCount($item['children']);
    }
    return $count;
}

function nestedToSingle($array)
{
    static $singleDimArray = [];

    foreach ($array as $item) {

        if (is_array($item)) {
            if (array_key_exists('id', $item) && array_key_exists('text', $item)) {
                $singleDimArray[$item['id']] = $item['text'];
            }
            if (array_key_exists('children', $item) && is_array($item['children'])) {
                nestedToSingle($item['children']);
            }
        }
    }
    $final = array();
    $i = 0;

    foreach ($singleDimArray as $key => $value) {
        $final[$i]['id'] = $key;
        $final[$i]['name'] = $value;
        $i++;
    }

    return $final;
}

function array_flatten(array $array)
{
    $return = array();
    array_walk_recursive($array, function ($a) use (&$return) {
        $return[] = $a;
    });
    return $return;
}

/*  Eent Notification  */
function load_last_event($user_id, $last_event_id)
{
    $q = "SELECT * FROM `gs_user_last_events_data` WHERE `user_id`='" . $user_id . "' AND `imei` IN (SELECT imei FROM gs_objects WHERE customer_id = '" . $user_id . "')";

    if ($last_event_id == -1) {
        $q .= " ORDER BY event_id DESC LIMIT 1";
    } else {
        $q .= " AND `event_id`>'" . $last_event_id . "' ORDER BY event_id ASC";
    }

    $res = my_database()->select($q);
    if (count($res) > 0) {
        foreach ($res as $r) {
            if ($r->name == '') {
                $r->name = getObjectName($r->imei);
            }
            $r->dt_server = gmdate($r->dt_server, strtotime('+ 6 hour'));
            $r->dt_tracker = gmdate($r->dt_tracker, strtotime('+ 6 hour'));
        }
    }
    return $res;
}

function load_event_data($user_id, $event_id)
{
    $q = "SELECT * FROM `gs_user_last_events_data` WHERE `user_id`='" . $user_id . "' AND `event_id`='" . $event_id . "' AND `imei` IN (SELECT imei FROM gs_objects WHERE customer_id = '" . $user_id . "') LIMIT 1";

    $res = my_database()->select($q);
    if (count($res) > 0) {
        foreach ($res as $r) {
            if ($r->name == '') {
                $r->name = getObjectName($r->imei);
            }
            $r->speed = convSpeedUnits($r->speed, 'km', 'km');
            $r->altitude = convAltitudeUnits($r->altitude, 'km', 'km');

            $params = json_decode($r->params, true);

            $result = array(
                'name' => $r->name,
                'imei' => $r->imei,
                'event_desc' => $r->event_desc,
                'dt_server' => gmdate($r->dt_server, strtotime('+ 6 hour')),
                'dt_tracker' => gmdate($r->dt_tracker, strtotime('+ 6 hour')),
                'lat' => $r->lat,
                'lng' => $r->lng,
                'altitude' => $r->altitude,
                'angle' => $r->angle,
                'speed' => $r->speed,
                'params' => $params
            );
        }
    }
    return $result;
}

/* ==================== */

// Function to get all the dates in given range 
function getDatesFromRange($start, $end, $format)
{

    // Declare an empty array 
    $array = array();

    // Variable that store the date interval 
    // of period 1 day 
    $interval = new DateInterval('P1D');

    $realEnd = new DateTime($end);
    $realEnd->add($interval);

    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

    // Use loop to store date into array 
    foreach ($period as $date) {
        $array[] = $date->format($format);
    }

    // Return the array elements 
    return $array;
}

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    return $ip;
}

function getUserAgent()
{
    $mobile_browser = '0';

    if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
        $mobile_browser++;
    }

    if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
        $mobile_browser++;
    }

    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
    $mobile_agents = array(
        'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
        'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
        'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
        'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
        'newt', 'noki', 'oper', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
        'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
        'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
        'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
        'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-'
    );

    if (in_array($mobile_ua, $mobile_agents)) {
        $mobile_browser++;
    }

    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'OperaMini') > 0) {
        $mobile_browser++;
    }

    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') > 0) {
        $mobile_browser = 0;
    }

    if ($mobile_browser > 0) {
        return 'Mobile';
    } else {
        return 'PC';
    }
}

/* 
        utilities functions for whole application
        all general, re-usable functions will be listed in this file
    */

function checkObjectActive($imei)
{
    $q = "SELECT * FROM `gs_objects` WHERE `imei`='" . $imei . "'";
    $row = (array)my_database()->select($q)[0];
    if ($row['unit_id'] > 0) {
        return true;
    } else {
        return false;
    }
}

function mergeParams($old, $new)
{
    if (is_array($old) && is_array($new)) {
        $new = array_merge($old, $new);
    }

    return $new;
}

function getParamsArray($params)
{
    $arr_params = array();

    if ($params != '') {
        $params = json_decode($params, true);

        if (is_array($params)) {
            foreach ($params as $key => $value) {
                array_push($arr_params, $key);
            }
        }
    }

    return $arr_params;
}

function getParamValue($params, $param)
{
    $result = 0;

    if (isset($params[$param])) {
        $result = $params[$param];
    }

    return $result;
}

function paramsToArray($params)
{
    // keep compatibility with old software versions which used '|' and with software versions using JSON

    $arr_params = array();
    if (substr($params, -1) == '|') {
        $params = explode("|", $params);

        for ($i = 0; $i < count($params) - 1; ++$i) {
            $param = explode("=", $params[$i]);
            $arr_params[$param[0]] = $param[1];
        }
    } else {
        $arr_params = json_decode($params, true);
    }

    if (!is_array($arr_params)) {
        $arr_params = array();
    }

    return $arr_params;
}

function getSensorValue($params, $sensor)
{
    $result = array();
    $result['value'] = 0;
    $result['value_full'] = '';
    $sensor = (array) $sensor; //json_decode(json_encode($sensor), TRUE);
    //echo var_export($sensor,true);

    $sensor['param'] = $sensor['sensor_parameter_name'];
    $sensor['result_type'] = $sensor['result_type_id'];
    $sensor['text_1'] = $sensor['sensor_1_text'];
    $sensor['text_0'] = $sensor['sensor_0_text'];
    $sensor['calibration'] = [];
    $sensor['name'] = $sensor['sensor_name_id'];
    $sensor['type'] = $sensor['sensor_type_id'];

    $param_value = getParamValue($params, $sensor['param']);

    // formula
    if (($sensor['result_type'] == 'abs') || ($sensor['result_type'] == 'rel') || ($sensor['result_type'] == 'value')) {
        if ($sensor['formula'] != '') {
            $formula = strtolower($sensor['formula']);
            if (!is_numeric($param_value)) {
                $param_value = 0;
            }
            $formula = str_replace('x', $param_value, $formula);
            $param_value = calcString($formula);
        }
    }

    if (($sensor['result_type'] == 'abs') || ($sensor['result_type'] == 'rel')) {
        $param_value = sprintf("%01.3f", $param_value);

        $result['value'] = $param_value;
        $result['value_full'] = $param_value;
    } else if ($sensor['result_type'] == 'logic') {
        if ($param_value == 1) {

            $result['value'] = $param_value;
            $result['value_full'] = $sensor['text_1'];
        } else {
            $result['value'] = $param_value;
            $result['value_full'] = $sensor['text_0'];
        }
    } else if ($sensor['result_type'] == 'value') {
        // calibration
        $out_of_cal = true;

        $calibration = json_decode($sensor['calibration'], true);
        if ($calibration == null) {
            $calibration = array();
        }

        if (count($calibration) >= 2) {
            // put all X values to separate array
            $x_arr = array();

            for ($i = 0; $i < count($calibration); $i++) {
                $x_arr[] = $calibration[$i]['x'];
            }

            sort($x_arr);

            for ($i = 0; $i < count($x_arr) - 1; $i++) {
                $x_low = $x_arr[$i];
                $x_high = $x_arr[$i + 1];

                if (($param_value >= $x_low) && ($param_value <= $x_high)) {
                    // get Y low and high
                    $y_low = 0;
                    $y_high = 0;

                    for ($j = 0; $j < count($calibration); $j++) {
                        if ($calibration[$j]['x'] == $x_low) {
                            $y_low = $calibration[$j]['y'];
                        }

                        if ($calibration[$j]['x'] == $x_high) {
                            $y_high = $calibration[$j]['y'];
                        }
                    }

                    // get coeficient
                    $a = $param_value - $x_low;
                    $b = $x_high - $x_low;

                    $coef = ($a / $b);

                    $c = $y_high - $y_low;
                    $coef = $c * $coef;

                    $param_value = $y_low + $coef;

                    $out_of_cal = false;

                    break;
                }
            }

            if ($out_of_cal) {
                // check if lower than cal
                $x_low = $x_arr[0];

                if ($param_value < $x_low) {
                    for ($j = 0; $j < count($calibration); $j++) {
                        if ($calibration[$j]['x'] == $x_low) {
                            $param_value = $calibration[$j]['y'];
                        }
                    }
                }

                // check if higher than cal
                $x_high = end($x_arr);

                if ($param_value > $x_high) {
                    for ($j = 0; $j < count($calibration); $j++) {
                        if ($calibration[$j]['x'] == $x_high) {
                            $param_value = $calibration[$j]['y'];
                        }
                    }
                }
            }
        }

        //$param_value = sprintf("%01.2f", $param_value);
        //$param_value = sprintf("%01.2f", $param_value);

        // dictionary
        // not needed for PHP version, only in JS

        $result['value'] = $param_value;
        $result['value_full'] = $param_value . ' ' . $sensor['units'];
    } else if ($sensor['result_type'] == 'string') {
        $result['value'] = $param_value;
        $result['value_full'] = $param_value;
    } else if ($sensor['result_type'] == 'percentage') {
        if (($param_value > $sensor['lv']) && ($param_value < $sensor['hv'])) {
            $a = $param_value - $sensor['lv'];
            $b = $sensor['hv'] - $sensor['lv'];

            $result['value'] = ceil(($a / $b) * 100);
        } else if ($param_value <= $sensor['lv']) {
            $result['value'] = 0;
        } else if ($param_value >= $sensor['hv']) {
            $result['value'] = 100;
        }

        $result['value_full'] = $result['value'] . ' %';
    }
    $result['sensor_name'] = $sensor['name'];
    $result['sensor_type'] = $sensor['type'];
    return $result;
}

function calcString($str)
{
    $result = 0;
    try {
        $str = trim($str);
        $str = preg_replace('/[^0-9\(\)+-\/\*.]/', '', $str);
        $str = $str . ';';

        return $result + eval('return ' . $str);
    } catch (Exception $e) {
        return $result;
    }
}

function getUnits($units)
{
    $result = array();

    $units = explode(",", $units);

    $result["unit_distance"] = @$units[0];
    if ($result["unit_distance"] == '') {
        $result["unit_distance"] = 'km';
    }

    $result["unit_capacity"] = @$units[1];
    if ($result["unit_capacity"] == '') {
        $result["unit_capacity"] = 'l';
    }

    $result["unit_temperature"] = @$units[2];
    if ($result["unit_temperature"] == '') {
        $result["unit_temperature"] = 'c';
    }

    return $result;
}

function convSpeedUnits($val, $from, $to)
{
    return floor(convDistanceUnits($val, $from, $to));
}

function convDistanceUnits($val, $from, $to)
{
    if ($from == 'km') {
        if ($to == 'mi') {
            $val = $val * 0.621371;
        } else if ($to == 'nm') {
            $val = $val * 0.539957;
        }
    } else if ($from == 'mi') {
        if ($to == 'km') {
            $val = $val * 1.60934;
        } else if ($to == 'nm') {
            $val = $val * 0.868976;
        }
    } else if ($from == 'nm') {
        if ($to == 'km') {
            $val = $val * 1.852;
        } else if ($to == 'nm') {
            $val = $val * 1.15078;
        }
    }

    return $val;
}

function convAltitudeUnits($val, $from, $to)
{
    if ($from == 'km') {
        if (($to == 'mi') || ($to == 'nm')) // to feet
        {
            $val = floor($val * 3.28084);
        }
    }

    return $val;
}


function convDateToNum($dt)
{
    $dt = str_replace('-', '', $dt);
    $dt = str_replace(':', '', $dt);
    $dt = str_replace(' ', '', $dt);

    return $dt;
}

function isDateInRange($dt, $start, $end)
{
    if ($start > $end) {
        return ($dt > $start) || ($dt < $end);
    } else {
        return ($dt > $start) && ($dt < $end);
    }
}

function getTimeDetails($sec, $show_days)
{
    global $la;

    $seconds = 0;
    $hours   = 0;
    $minutes = 0;

    if ($sec % 86400 <= 0) {
        $days = $sec / 86400;
    }
    if ($sec % 86400 > 0) {
        $rest = ($sec % 86400);
        $days = ($sec - $rest) / 86400;

        if ($rest % 3600 > 0) {
            $rest1 = ($rest % 3600);
            $hours = ($rest - $rest1) / 3600;

            if ($rest1 % 60 > 0) {
                $rest2 = ($rest1 % 60);
                $minutes = ($rest1 - $rest2) / 60;
                $seconds = $rest2;
            } else {
                $minutes = $rest1 / 60;
            }
        } else {
            $hours = $rest / 3600;
        }
    }

    if ($show_days == false) {
        $hours += $days * 24;
        $days = 0;
    }

    if ($days > 0) {
        $days = $days . 'd ';
    } else {
        $days = false;
    }
    if ($hours > 0) {
        $hours = $hours . 'h ';
    } else {
        $hours = false;
    }
    if ($minutes > 0) {
        $minutes = $minutes . 'm ';
    } else {
        $minutes = false;
    }
    $seconds = $seconds . 's ';

    return $days . $hours . $minutes . $seconds;
}

function getTimeDifferenceDetails($start_date, $end_date)
{
    $diff = strtotime($end_date) - strtotime($start_date);
    return getTimeDetails($diff, true);
}

function getLengthBetweenCoordinates($lat1, $lon1, $lat2, $lon2)
{
    if (($lat1 == $lat2) && ($lon1 == $lon2)) {
        return 0;
    }

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $km = $dist * 60 * 1.1515 * 1.609344;

    return sprintf("%01.6f", $km);
}

function getAngle($lat1, $lng1, $lat2, $lng2)
{
    $angle = (rad2deg(atan2(sin(deg2rad($lng2) - deg2rad($lng1)) * cos(deg2rad($lat2)), cos(deg2rad($lat1)) * sin(deg2rad($lat2)) - sin(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lng2) - deg2rad($lng1)))) + 360) % 360;

    return floor($angle);
}

function isPointInPolygon($vertices, $lat, $lng)
{
    $polyX = array();
    $polyY = array();

    $ver_arr = explode(',', $vertices);

    // check for all X and Y
    if (!is_int(count($ver_arr) / 2)) {
        array_pop($ver_arr);
    }

    $polySides = 0;
    $i = 0;

    while ($i < count($ver_arr)) {
        $polyX[] = $ver_arr[$i + 1];
        $polyY[] = $ver_arr[$i];

        $i += 2;
        $polySides++;
    }

    $j = $polySides - 1;
    $oddNodes = 0;

    for ($i = 0; $i < $polySides; $i++) {
        if ($polyY[$i] < $lat && $polyY[$j] >= $lat || $polyY[$j] < $lat && $polyY[$i] >= $lat) {
            if ($polyX[$i] + ($lat - $polyY[$i]) / ($polyY[$j] - $polyY[$i]) * ($polyX[$j] - $polyX[$i]) < $lng) {
                $oddNodes = !$oddNodes;
            }
        }
        $j = $i;
    }

    return $oddNodes;
}

function isPointOnLine($points, $lat, $lng)
{
    $new_points = array();

    $points = explode(',', $points);

    // check for all X and Y
    if (!is_int(count($points) / 2)) {
        array_pop($points);
    }

    $i = 0;
    while ($i < count($points)) {
        $new_points[] = array($points[$i], $points[$i + 1]);
        $i += 2;
    }

    // add mid points
    $new_points = isPointOnLineAddMidPoints($new_points);
    $new_points = isPointOnLineAddMidPoints($new_points);

    // find closes point
    for ($i = 0; $i < count($new_points); $i++) {
        $dist = getLengthBetweenCoordinates($new_points[$i][0], $new_points[$i][1], $lat, $lng);
        $dist = sprintf('%0.6f', $dist);

        if (!isset($distance)) {
            $distance = $dist;
        } else {
            if ($distance > $dist) {
                $distance = $dist;
            }
        }
    }

    return $distance;
}

function isPointOnLineAddMidPoints($points)
{
    $new_points = array();

    for ($i = 0; $i < count($points) - 1; $i++) {
        $new_points[] = array($points[$i][0], $points[$i][1]);
        $new_points[] = array(($points[$i][0] + $points[$i + 1][0]) / 2, ($points[$i][1] + $points[$i + 1][1]) / 2);
    }

    // add last point
    $new_points[] = array($points[count($points) - 1][0], $points[count($points) - 1][1]);

    return $new_points;
}

function reportsAddReportHeader($imei, $dtf = false, $dtt = false)
{
    $result = '<table>';

    if ($imei != "") {
        $result .= '<tr><td><strong> Device :</strong></td><td>' . getObjectName($imei) . '</td></tr>';
    }

    if (($dtf != false) && ($dtt != false)) {
        $result .= '<tr><td><strong> Period :</strong></td><td>' . $dtf . ' - ' . $dtt . '</td></tr>';
    }

    $result .= '</table><br/>';

    return $result;
}

function getObjectName($imei)
{
    $q = "SELECT device_name FROM `gs_objects` WHERE `imei`='" . $imei . "'";
    $r = my_database()->select($q);
    return $r[0]->device_name;
}

function convUserTimezone($dt)
{
    if (strtotime($dt) > 0) {
        $dt = gmdate("Y-m-d H:i:s", strtotime($dt . $_SESSION["timezone"]));

        // DST
        if ($_SESSION["dst"] == 'true') {
            $dt_ = gmdate('m-d H:i:s', strtotime($dt));
            $dst_start = $_SESSION["dst_start"] . ':00';
            $dst_end =  $_SESSION["dst_end"] . ':00';

            if (isDateInRange(convDateToNum($dt_), convDateToNum($dst_start), convDateToNum($dst_end))) {
                $dt = gmdate("Y-m-d H:i:s", strtotime($dt . '+ 1 hour'));
            }
        }
    }

    return $dt;
}

function convUserUTCTimezone($dt)
{
    if (strtotime($dt) > 0) {
        if (substr($_SESSION["timezone"], 0, 1) == "+") {
            $timezone_diff = str_replace("+", "-", $_SESSION["timezone"]);
        } else {
            $timezone_diff = str_replace("-", "+", $_SESSION["timezone"]);
        }

        $dt = gmdate("Y-m-d H:i:s", strtotime($dt . $timezone_diff));

        // DST
        if ($_SESSION["dst"] == 'true') {
            $dt_ = gmdate('m-d H:i:s', strtotime($dt));
            $dst_start = $_SESSION["dst_start"] . ':00';
            $dst_end =  $_SESSION["dst_end"] . ':00';

            if (isDateInRange(convDateToNum($dt_), convDateToNum($dst_start), convDateToNum($dst_end))) {
                $dt = gmdate("Y-m-d H:i:s", strtotime($dt . '- 1 hour'));
            }
        }
    }

    return $dt;
}

function get_geo_address($lat, $lng)
{
    $result = '';
    $search = $lat . ',' . $lng;
    $search = htmlentities(urlencode($search));
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $search . '&oe=utf-8&key=AIzaSyCvX5ZoFwodbDqQWw1DPTp8Fk9jf3Uuv68';
    $data = file_get_contents($url);
    $jsondata = json_decode($data, true);

    if (is_array($jsondata) && $jsondata['status'] == "OK") {
        $result = $jsondata['results'][0]['formatted_address'];
    }

    return $result;
}

function generate_sidebar_menu()
{
    $menu = my_database()->table("settings")->where("meta_key", "menu_item")->get()[0];
    $menuArr = json_decode($menu->meta_value);

    $permission = my_database()->select("SELECT tm.*, p.group_id, p.can_list,p.can_view,p.can_create,p.can_update,p.can_delete FROM `tbl_menus` tm left join user_permission p on p.module_id = tm.module_id where p.group_id=1 and p.can_list=1 group by tm.module_id order by tm.sort asc");

    // dd($menuArr, $permission);
    $final_menu = '<ul class="kt-menu__nav "></ul>';
    if ($menuArr) {
        $final_menu = parseNodes($menuArr, 0, $permission);
    }

    return $final_menu;
}

function parseNodes($nodes, $type, $permission)
{ // takes a nodes array and turns it into a <ol>
    if ($type == 0) {
        $ol = '<ul class="kt-menu__nav ">';
    } else {
        $ol = '<ul class="kt-menu__subnav ">';
    }

    foreach ($nodes as $node) {
        $ol .= parseNode($node, $type, $permission);
    }
    $ol .= '</ul>';
    return $ol;
}

function parseNode($node, $type, $permission)
{
    $li = '';
    if (isset($node->children)) {
        if ($type == 0) {
            if ($node->module_id) {
                foreach ($permission as $per) {
                    if ($per->module_id == $node->module_id || $node->module_id == 0) {
                        $li = '<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"> <a href="javascript:;" class="kt-menu__link kt-menu__toggle"> <span class="kt-menu__link-icon"> <i class="' . $node->icons . '"></i> </span> <span class="kt-menu__link-text">' . $node->text . '</span> <i class="kt-menu__ver-arrow la la-angle-right"></i> </a>';
                    }
                }
            } else {
                $li = '<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"> <a href="javascript:;" class="kt-menu__link kt-menu__toggle"> <span class="kt-menu__link-icon"> <i class="' . $node->icons . '"></i> </span> <span class="kt-menu__link-text">' . $node->text . '</span> <i class="kt-menu__ver-arrow la la-angle-right"></i> </a>';
            }
        } else {
            if ($node->module_id) {
                foreach ($permission as $per) {
                    if ($per->module_id == $node->module_id || $node->module_id == 0) {
                        $li = '<li class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"> <a href="javascript:;" class="kt-menu__link kt-menu__toggle"> <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i> <span class="kt-menu__link-text">' . $node->text . '</span> <i class="kt-menu__ver-arrow la la-angle-right"></i> </a>';
                    }
                }
            } else {
                $li = '<li class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"> <a href="javascript:;" class="kt-menu__link kt-menu__toggle"> <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i> <span class="kt-menu__link-text">' . $node->text . '</span> <i class="kt-menu__ver-arrow la la-angle-right"></i> </a>';
            }
        }
    } else {
        if ($type == 0) {
            if ($node->module_id) {
                foreach ($permission as $per) {
                    if ($per->module_id == $node->module_id || $node->module_id == 0) {
                        $li = ' <li class="kt-menu__item" aria-haspopup="true"> <a href="';
                        if ($node->href) {
                            $li .= url($node->href);
                        } else {
                            $li .= 'javascript:;';
                        }

                        $li .= '" target="' . $node->target . '" class="kt-menu__link kt-menu__toggle"> <span class="kt-menu__link-icon"> <i class="' . $node->icons . '"></i> </span> <span class="kt-menu__link-text">' . $node->text . '</span> </a>';
                    }
                }
            } else {
                $li = ' <li class="kt-menu__item" aria-haspopup="true"> <a href="';
                if ($node->href) {
                    $li .= url($node->href);
                } else {
                    $li .= 'javascript:;';
                }

                $li .= '" target="' . $node->target . '" class="kt-menu__link kt-menu__toggle"> <span class="kt-menu__link-icon"> <i class="' . $node->icons . '"></i> </span> <span class="kt-menu__link-text">' . $node->text . '</span> </a>';
            }
        } else {

            if ($node->module_id) {
                foreach ($permission as $per) {
                    if ($per->module_id == $node->module_id || $node->module_id == 0) {
                        $li = ' <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"> <a href="';
                        if ($node->href) {
                            $li .= url($node->href);
                        } else {
                            $li .= 'javascript:;';
                        }

                        $li .= '" target="' . $node->target . '" class="kt-menu__link kt-menu__toggle"> <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i> <span class="kt-menu__link-text">' . $node->text . '</span> </a>';
                    }
                }
            } else {
                $li = ' <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"> <a href="';
                if ($node->href) {
                    $li .= url($node->href);
                } else {
                    $li .= 'javascript:;';
                }

                $li .= '" target="' . $node->target . '" class="kt-menu__link kt-menu__toggle"> <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i> <span class="kt-menu__link-text">' . $node->text . '</span> </a>';
            }
        }
    }

    if (isset($node->children)) {
        $li .= '<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>';
        $li .= parseNodes($node->children, 1, $permission);
        $li .= '</div>';
    }
    $li .= '</li>';
    return $li;
}

function generateNestedAccountDatalist()
{
    $query = my_database()->select("select c.*, p.title as parent_name, p.code_no as parent_code from chart_of_accounts c left join chart_of_accounts p on p.id=c.parent_id order by c.id asc");

    $parent_id = 0;

    $data = nestedDatatables($query, $parent_id);
    dd($data);
    $a1 = array("red", "green");
    $a2 = array("blue", "yellow");
    dd(array_merge($a1, $a2));
}

function nestedDatatables($datas, $parent_id)
{
    $row = array();
    $final_array = array();
    foreach ($datas as $d) {
        if ($d->parent_id == $parent_id) {
            array_push($row, $d);
            $result = nestedDatatable($datas, $d->id);
            $megedArray = arrayMerging($row, $result);
            array_merge($final_array, $megedArray);
        }
    }

    return  $final_array;
}

function nestedDatatable($data, $parent_id)
{
    $row = array();
    foreach ($data as $d) {
        if ($d->parent_id == $parent_id) {
            array_push($row, $d);
            // nestedDatatable($data, $d->id);
        }
    }

    return $row;
}

function arrayMerging($a1, $a2)
{
    return array_merge($a1, $a2);
}

function array_flatten_v2($array)
{
    if (!is_array($array)) {
        return false;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatten_v2($value));
        } else {
            $result[$key] = $value;
        }
    }
    return $result;
}

function array_flatten_v3($array, $return)
{
    for ($x = 0; $x <= count($array); $x++) {
        if (is_array($array[$x])) {
            $return = array_flatten_v3($array[$x], $return);
        } else {
            if (isset($array[$x])) {
                $return[] = $array[$x];
            }
        }
    }
    return $return;
}

function show_local_format($type, $data = null)
{
    $localization = my_database()->table('settings')->where('meta_key', 'localization')->first();
    $local = json_decode($localization->meta_value, true);
    $final_data = '';

    if ($type == 'currency') {
        $currency = my_database()->table('currencies')->where('id', $local['currency'])->first();
        $final_data = $currency->symbol . ' ' . number_format($data, $local['currency_format']);
    } else if ($type == 'date_format') {
        $final_data  = date($local['date_format'], strtotime($data));
    } else if ($type == 'time_format') {
        $final_data  = date($local['time_format'], strtotime($data));
    } else if ($type == 'date_time_format') {
        $final_data  = date($local['date_format'], strtotime($data)) . ' ' . date($local['time_format'], strtotime($data));
    }
    return $final_data;
}


function report_template($type, $position)
{
    $company_details = my_database()->select("select c.name, c.company_dark_logo from customers c where c.id='" . auth()->user()->id . "'")[0];
    $body = 'hello';
    // if ($type == 'print') {
    //     $body .= '<table cellpadding="0" cellspacing="0"><tbody><tr class="top"><td colspan="2"><table><tbody><tr><td class="title"> </td><td> Invoice #: 123<br> Created: January 1, 2015<br> Due: February 1, 2015</td></tr></tbody></table></td></tr></tbody></table>';
    // }
    echo $body;
    // return htmlentities($body);
}

/*  cur post funtionality ৳*/
function httpPost($url, $data)
{
    $client = new \GuzzleHttp\Client();
    $response = $client->post($url, ['form_params' => $data]);
    //$response = $client->send($response);
    return $response;
}

//Create Chart of Accounts---------
function createCOA($data)
{
    $query = "INSERT INTO chart_of_accounts(title, code_no, parent_id, account_type, transactional, status, description) VALUES('" . $data['title'] . "','" . $data['code_no'] . "'," . $data['parent_id'] . ",'" . $data['account_type'] . "'," . $data['transactional'] . "," . $data['status'] . ",'" . $data['description'] . "') ON DUPLICATE KEY UPDATE title=VALUES(title)";

    $done = my_database()->statement($query);
    return true;
}
