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
        "settings"                  => "Settings"
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
    // Form Fields
    "fields" => [
        "updated_at"                => "Updated at",
        "created_at"                => "Created at",
        "published_at"              => "Published at",
        "read"                      => "Read",
        "language" => [
            "title"                 => "Title",
            "code"                  => "Code",
            "site_title"            => "Site Title",
            "site_description"      => "Site Description",
            "flag"                  => "Flag"
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
        "save"                      => "Save",
        "reset"                     => "Reset",
        "uploaded"                  => "Uploaded file :"
    ],
    // Titles of the pages, naming is made with each routes' name
    "root"                          => "Dashboard",
    "user" => [
        "index"                     => "Users",
        "edit"                      => "Edit user",
        "create"                    => "Create user",
        "show"                      => "Show user"
    ],
    "article" => [
        "index"                     => "Articles",
        "edit"                      => "Edit article",
        "create"                    => "Create article",
        "show"                      => "Show article"
    ],
    "category" => [
        "index"                     => "Categories",
        "edit"                      => "Edit category",
        "create"                    => "Create category",
        "show"                      => "Show category"
    ],
    "language" => [
        "index"                     => "Languages",
        "edit"                      => "Edit language",
        "create"                    => "Create language",
        "show"                      => "Show language"
    ],
    "settings"                      => "Settings",
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