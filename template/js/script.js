$(function(){
    //Ẩn, hiện khung search
    function ShowHideSearch() {
        $(".navbar-default .navbar-nav>li,#btnOpenSearch,.navbar-header").toggleClass("hideMenu");
        $(".search").toggleClass("showInput");
    
    
    }
    $("#btnOpenSearch").click(function() {
        ShowHideSearch();
    });
    $("#btnClose").click(function() {
        ShowHideSearch();
    });
    //xoá data form khi click thoát
    $("#btnOpenDangKy").click(function(){
        $("#formDangKy")[0].reset();
    });
    $("#btnOpenDangNhap").click(function(){
        $("#formDangNhap")[0].reset();
    });
    //Xử lý xoá form tìm kiếm nâng cao

    $("#btnXoaForm").click(function(){
        $("#formTimKiemNC")[0].reset();
    });
    //Xử lý button back to top
    $('#backtotop').hide();
    window.onscroll = function() {
        if (pageYOffset >= 500) {
            $('#backtotop').show();
        } else {
            $('#backtotop').hide();
        }
    };
    
    $('#backtotop').click(function Backtotop() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    $('#modalSignUp input').on('blur keyup change', function() {
        if ($("#formDangKy").valid()) {
            $('#btnDangKy').prop('disabled', false);  
        } else {
            $('#btnDangKy').prop('disabled', 'disabled');
        }
    });

  
});
   

 
