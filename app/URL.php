<?php

namespace App;

class URL {
    // URL SIDEBAR
    const URL_DASHBOARD_MENU = "/admin/dashboard";
    

    const URL_CG_GET_BY_ID = "/admin/master_connect_groups/get_by_id";
    const URL_CG_DESTROY_BY_ID = "/admin/master_connect_groups/delete_by_id";

    const URL_ROLE_DESTROY_BY_ID = "/admin/master_roles/delete_by_id";
    const URL_ROLE_UPDATE_BY_ID = "/admin/master_roles/update_by_id";
    const URL_ROLE_GET_BY_ID = "/admin/master_roles/get_by_id";

    const URL_GET_PRIVILEGE_BY_ROLE_ID = "/admin/master_menus/get_by_role_id";
    const URL_ADD_NEW_MENU = "/admin/master_menus/add";
    const URL_DESTROY_PRIVILEGE = "/admin/master_menus/destroy";
}

// INSERT INTO MENUS (MENU_DISPLAY_NAME, MENU_PARENT_ID, MENU_LEVEL, MENU_LINK, MENU_IS_SIDEBAR, CREATED_AT, UPDATED_AT) VALUES ();
// INSERT INTO MENUS (MENU_DISPLAY_NAME, MENU_PARENT_ID, MENU_LEVEL, MENU_LINK, MENU_IS_SIDEBAR, CREATED_AT, UPDATED_AT) VALUES ();
// INSERT INTO MENUS (MENU_DISPLAY_NAME, MENU_PARENT_ID, MENU_LEVEL, MENU_LINK, MENU_IS_SIDEBAR, CREATED_AT, UPDATED_AT) VALUES ();
// INSERT INTO MENUS (MENU_DISPLAY_NAME, MENU_PARENT_ID, MENU_LEVEL, MENU_LINK, MENU_IS_SIDEBAR, CREATED_AT, UPDATED_AT) VALUES ();
// INSERT INTO MENUS (MENU_DISPLAY_NAME, MENU_PARENT_ID, MENU_LEVEL, MENU_LINK, MENU_IS_SIDEBAR, CREATED_AT, UPDATED_AT) VALUES ();

