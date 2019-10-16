function roomfetch(hid){
    $('#house-id').val(hid);
    $.ajax({
        url: 'room/show/'+hid,
        type: 'get',
        dataType: 'json',
        success: function(response){
            var len = 0;
            $('#roomlist').empty();
            if(response['data'] != null){
                len = response['data'].length;
            }

            if(len > 0){
                for(var i=0; i<len; i++){
                    var id = response['data'][i].id;
                    var houseid = response['data'][i].houseid;
                    var name = response['data'][i].name;
                    // var tr_str = "<div class='col-md-3 col-sm-6'>"+ name + "</div>";
                        
                    var roomd = "<div class='three wide computer eight wide tablet sixteen wide mobile column'>" +
                        "<div class='ui fluid card'>" +
                            "<div class='content'>" +
                                "<div class='ui icon header'>" +
                                    "<a href='#'><i class='icon massive home blue'></i></a>" +
                                    "<div class='meta'>" +
                                         name +
                                    "</div>" +
                                "</div>" +
                           "</div>" +
                       "</div>" +
                    "</div>";
                    $("#roomlist").append(roomd);
                }
                
            }            
            // var addroom = "<div class='three wide computer eight wide tablet sixteen wide mobile column'>" +
            //                 "<div class='ui fluid card'>" +
            //                     "<div class='content'>" +
            //                         "<div class='ui icon header create-room'>" +
            //                             "<a><i class='icon massive plus blue'></i></a>" +
            //                             "<div class='meta'>" +
            //                                 "Add Room" +
            //                             "</div>" +
            //                         "</div>" +
            //                     "</div>" +
            //                 "</div>" +
            //             "</div>";
            // $("#roomlist").append(addroom);
        }
    });
};



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

    $('.create-room').click(function(){
        $('#room-modal').modal('show');
        console.log("hi");
    }); 
    $('.add-device').click(function(){
        $('#device-modal').modal('show');
        console.log("hi");
    });
    
});