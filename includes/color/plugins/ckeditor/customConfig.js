CKEDITOR.editorConfig = function( config ) {
    config.toolbarGroups = [
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'colors', groups : ['TextColor'] },
        { name: 'styles' }
    ];

    config.extraPlugins = 'colorbutton';
    config.colorButton_colors = 'ED1C24,000000,FFFFFF,CCC,DDD';
    config.removeButtons = 'Subscript,Superscript,Format,Strike'
    config.enterMode = CKEDITOR.ENTER_BR;
    config.shiftEnterMode = CKEDITOR.ENTER_P;
};
