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

    const URL_MEMBER_DESTROY_BY_ID = "/admin/master_members/delete_by_id";

    const URL_USER_DESTROY_BY_ID = "/admin/master_user/destroy_by_id";
    const URL_USER_RESET_PASSWORD = "/admin/master_user/reset_password";

    const URL_COACH_GET_BY_ID = "/admin/master_coaches/get_by_id";
    const URL_COACH_DESTROY_BY_ID = "/admin/master_coaches/delete_by_id";

    const URL_TL_GET_BY_ID = "/admin/master_team_leaders/get_by_id";
    const URL_TL_DESTROY_BY_ID = "/admin/master_team_leaders/delete_by_id";
}