<?php

$translation = [

    /*
    |--------------------------------------------------------------------------
    | English Language Admin Translations
    |--------------------------------------------------------------------------
    */

    'create' => [
        'fail'          => 'Create operation on resource has failed.',
        'success'       => 'Resource has been created succesfully.'
    ],
    'csrf_error'        => 'Seems like you couldn\'t submit the form for a longtime. Please try again.',
    'datatables' => [   // DataTables, files can be found @ https://datatables.net/plug-ins/i18n/
        'sInfo'         => 'Showing _START_ to _END_ of _TOTAL_ entries',
        'sInfoEmpty'    => 'Showing 0 to 0 of 0 entries',
        'sInfoFiltered' => '(filtered from _MAX_ total entries)',
        'sInfoPostFix'  => '',
        'sLengthMenu'   => 'Show _MENU_ entries',
        'sProcessing'   => '<div class="overlay"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></span></div>',
        'sSearch'       => 'Search:',
        'sUrl'          => '',
        'sZeroRecords'  => 'No matching records found',
        'oPaginate' => [
            'sFirst'    => 'First',
            'sLast'     => 'Last',
            'sNext'     => 'Next',
            'sPrevious' => 'Previous'
        ]
    ],
    'delete' => [
        'fail'          => 'Delete operation on resource has failed.',
        'self'          => 'You can\'t always get what you want.',
        'success'       => 'Resource has been deleted succesfully.'
    ],
    'empty'             => 'There are not any saved records yet. Why don\'t you create a new one first?',
    'invalid'           => 'You have to configure your .env file first to see the Dashboard.',
    'fields' => [
        'created_at'    => 'Created at',
        'deleted_at'    => 'Deleted at',
        'no'            => 'No',
        'published_at'  => 'Published at',
        'reset'         => 'Reset',
        'save'          => 'Save',
        'updated_at'    => 'Updated at',
        'uploaded'      => 'Uploaded file',
        'yes'           => 'Yes'
    ],
    'last_login'        => 'Last Login',
    'none'              => 'None',
    'ops' => [
        'confirmation'  => 'Are you sure?',
        'create'        => 'Create',
        'delete'        => 'Delete',
        'edit'          => 'Edit',
        'modified'      => 'Modified on',
        'name'          => 'Ops',
        'order'         => 'Order',
        'show'          => 'Show'
    ],
    'root'              => 'Dashboard',
    'submit'            => 'Submit',
    'title'             => 'Control Panel',
    'update' => [
        'fail'          => 'Update operation on resource has failed.',
        'success'       => 'Resource has been updated succesfully.'
    ],
    'save' => 'Save'
];

return createTranslation(require __DIR__ . DIRECTORY_SEPARATOR . 'resources.php', $translation);
