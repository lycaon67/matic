


$(document).ready(function() {


    $('.dropdown').dropdown({
        // you can use any ui transition
           transition: 'drop',allowCategorySelection: true
       });

       $('.category.example .ui.dropdown').dropdown({
       allowCategorySelection: true
       });
    $('.sidebar-menu-toggler').click(function(){
        $('#sidebar').sidebar('toggle');
        
    });

    $('.ui.accordion').accordion('refresh');
// Login Form
    $('.log-in').click(function(){
        $('.login-box').toggleClass("showed");
    });
    $('.hide-btn').click(function(){
        $('.login-box').toggleClass("showed");
    });
// Login Form End
    $('.create-house').click(function(){
        $('#house-modal').modal('show');
    });


});