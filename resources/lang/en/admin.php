<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Language lines for Admin panel
    |--------------------------------------------------------------------------
    */

    "title"                         => "Control Panel",
    "submit"                        => "Submit",
    "last_login"                    => "Last Login",
    "profile"                       => "Profile",
    "elfinder"                      => "File Manager",
    "empty"                         => "There are not any saved records yet. Why don't you create a new one first?",
    // Menu
    "menu" => [
        "dashboard"                 => "Dashboard",
        "article" => [
            "root"                  => "Articles",
            "all"                   => "All Articles",
            "add"                   => "Add an Article"
        ],
        "category" => [
            "root"                  => "Categories",
            "all"                   => "All Categories",
            "add"                   => "Add a Category"
        ],
        "language" => [
            "root"                  => "Languages",
            "all"                   => "All Languages",
            "add"                   => "Add a Language"
        ],
        "page" => [
            "root"                  => "Pages",
            "all"                   => "All Pages",
            "add"                   => "Add a Page"
        ],
        "user" => [
            "root"                  => "Users",
            "all"                   => "All Users",
            "add"                   => "Add a User"
        ],
        "setting"                   => "Settings"
    ],
    // Operations
    "ops" => [
        "name"                      => "Ops",
        "edit"                      => "Edit",
        "create"                    => "Create",
        "delete"                    => "Delete",
        "show"                      => "Show",
        "order"                     => "Order",
        "confirmation"              => "Are you sure?",
        "modified"                  => "Modified on"
    ],
    // Fields
    "fields" => [
        "updated_at"                => "Updated at",
        "created_at"                => "Created at",
        "published_at"              => "Published at",
        "read"                      => "Read",
        "dashboard" => [
            'total_visits'          => "Total visits",
            'unique_visits'         => "Unique visits",
            'bounce_rate'           => "Bounce rate",
            'average_time'          => "Average time",
            'page_visits'           => "Average page visits",
            'pages'                 => "Pages",
            'keywords'              => "Keywords",
            'entrance_pages'        => "Entrance",
            'exit_pages'            => "Exit",
            'time_pages'            => "Time",
            'os'                    => "OS",
            'browsers'              => "Browser",
            'traffic_sources'       => "Source",
            'visits'                => "Visits",
            'visitors'              => "Visitors",
            'world_visitors'        => "Visitor distribution: World",
            'region_visitors'       => "Visitor distribution: Regions",
            'chart_visitors'        => "Visitor",
            'chart_region'          => "Region",
            'chart_country'         => "Country"
        ],
        "language" => [
            "title"                 => "Title",
            "code"                  => "Code",
            "site_title"            => "Site Title",
            "site_description"      => "Site Description",
            "flag"                  => "Flag"
        ],
        "page" => [
            "title"                 => "Title",
            "description"           => "Description",
            "language_id"           => "Language",
            "content"               => "Content",
        ],
        "category" => [
            "title"                 => "Title",
            "description"           => "Description",
            "color"                 => "Color",
            "language_id"           => "Language"
        ],
        "article" => [
            "title"                 => "Title",
            "description"           => "Description",
            "category_id"           => "Category",
            "content"               => "Content",
        ],
        "user" => [
            "name"                  => "Name",
            "email"                 => "Email",
            "password"              => "Password",
            "password_confirmation" => "Password Confirmation",
            "picture"               => "Avatar",
            "logged_in_at"          => "Login At",
            "logged_out_at"         => "Logout At",
            "ip_address"            => "IP"
        ],
        "setting" => [
            "email"                 => "Email",
            "facebook"              => "Facebook",
            "twitter"               => "Twitter",
            "analytics_id"          => "Analytics ID ( Format: UA-XXXXXX-YY )",
            "disqus_shortname"      => "Disqus Shortname",
            "logo"                  => "Logo",
        ],
        "save"                      => "Save",
        "reset"                     => "Reset",
        "uploaded"                  => "Uploaded file"
    ],
    // Titles of the pages, naming is made with each routes' name
    "root"                          => "Dashboard",
    "language" => [
        "index"                     => "Languages",
        "edit"                      => "Edit language",
        "create"                    => "Create language",
        "show"                      => "Show language"
    ],
    "page" => [
        "index"                     => "Pages",
        "edit"                      => "Edit page",
        "create"                    => "Create page",
        "show"                      => "Show page"
    ],
    "category" => [
        "index"                     => "Categories",
        "edit"                      => "Edit category",
        "create"                    => "Create category",
        "show"                      => "Show category"
    ],
    "article" => [
        "index"                     => "Articles",
        "edit"                      => "Edit article",
        "create"                    => "Create article",
        "show"                      => "Show article"
    ],
    "user" => [
        "index"                     => "Users",
        "edit"                      => "Edit user",
        "create"                    => "Create user",
        "show"                      => "Show user"
    ],
    "setting" => [
        "index"                     => "Settings"
    ],
    // DataTables, files can be found @ https://datatables.net/plug-ins/i18n/
    "datatables" => [
        "sProcessing"               => "Processing...",
        "sLengthMenu"               => "Show _MENU_ entries",
        "sZeroRecords"              => "No matching records found",
        "sInfo"                     => "Showing _START_ to _END_ of _TOTAL_ entries",
        "sInfoEmpty"                => "Showing 0 to 0 of 0 entries",
        "sInfoFiltered"             => "(filtered from _MAX_ total entries)",
        "sInfoPostFix"              => "",
        "sSearch"                   => "Search:",
        "sUrl"                      => "",
        "oPaginate" => [
            "sFirst"                => "First",
            "sPrevious"             => "Previous",
            "sNext"                 => "Next",
            "sLast"                 => "Last",
        ]
    ],
    // Flash messages upon create, update and delete
    "create" => [
        "success"                   => "Resource has been created succesfully.",
        "fail"                      => "Create operation on resource has failed."
    ],
    "update" => [
        "success"                   => "Resource has been updated succesfully.",
        "fail"                      => "Update operation on resource has failed."
    ],
    "delete" => [
        "success"                   => "Resource has been deleted succesfully.",
        "fail"                      => "Delete operation on resource has failed.",
        "self"                      => "You can't always get what you want."
    ]
];