$.validator.addMethod("noSpace", function(value, element) { 
    return value.indexOf(" ") < 0 && value != ""; 
  }, "Mật khẩu không được chứa ký tự khoảng trắng (phím SPACE)");

$.validator.addMethod("passwordCheck",
        function(value, element, param) {
            if (this.optional(element)) {
                return true;
            } else if (!/[A-Z]/.test(value)) {
                return false;
            } else if (!/[a-z]/.test(value)) {
                return false;
            } else if (!/[0-9]/.test(value)) {
                return false;
            }
            //Những trường hợp khác ngoài các TH trên cũng trả về true
            return true;
        },
        "Mật khẩu phải tối thiểu 1 ký tự viết hoa, 1 ký tự số");
    $.validator.addMethod("emailCheck",function(value,element,param){
        var regex = /\b[A-Z0-9._%+-]+@[gmail]+\.[A-Z]{2,4}\b/i;
        return regex.test(value);
    },"Email chỉ được định dạng test@gmail.com");

    // $.validate.addMethod("radioError",function(value,element,param){
    //     if($(element).attr("type")=="radio"){
    //           $(this).addClass('has-error');
    //         return true;
    //     }   
    //     return false;
    // },"Giới tính không được để trống");
$("#formDangKy").validate({
   
    //Muốn lấy thông báo tiếng anh thì thông báo ko thì modify lại bằng 
    //$.extend
    // messages:{
    //     tendk:"The username field cannot be blank",
    // }   
    
    

    // success: function(label,element) {
    //             label.hide();
    // },
    // submitHandler: function (form) { // for demo
    //     alert('valid form submitted'); // for demo
    //     return false; // for demo
    // },
    rules:{
        tendk:{
            required:true,
            minlength:4,
        },
        emaildk:{
            required:true,
            email:true,
            emailCheck:true
        },
        matkhaudk:{
            required:true,
            minlength:4,
            passwordCheck:true,
            noSpace:true
        },
        lapmatkhau:{
            equalTo:"#matkhaudk",
        },
        gioitinh:{
            required:true
        },
        hoten:{
            required:true,
           
        },
        dienthoai:{
            required:true,
            number:true
        },
        dongy:{
            required:true
        }

    },
    errorClass: "error-form",

    //Vị trí class error
 
    errorPlacement: function(errorClass, element) {
      if ($(element).attr("type") == "radio") {
        errorClass.insertAfter(".form-gioitinh");
      }
      else if( $(element).attr("type") == "checkbox") {
        errorClass.insertAfter(".form-dongy");
      } else {
         errorClass.insertAfter(element);
      }
    },
    //modify lại các phương thức mặc định của jquery validate
    //Cách khác là dùng method setDefault
    //higlight là cái input khi submit nếu ko đúng thì sẽ focus vs màu background tím
    //=>modify lại bằng class has-error
    highlight: function (element, errorClass) {
            
            $(element).closest('.form-group').addClass('has-error');
            //closest là element đang muốn gán class error dô chung
    },      
    unhighlight: function (element, errorClass) {
        $(element).closest(".form-group").removeClass("has-error");
    },
    // lang:"vi",
    messages:{
        tendk:{
            required:"Tên đăng nhập không được để trống",
            minlength:"Tên đăng nhập phải từ 4 ký tự trở lên"
        },
        emaildk:{
            required:"Email không được để trống",
            email:"Email phải có dạng test@gmail.com" 
        },
        matkhaudk:{
            required:"Mật khẩu không được để trống",
            minlength:"Mật khẩu phải từ 4 ký tự trở lên",
            noSpace:"Mật khẩu không được chứa ký tự khoảng cách (phím SPACE)"
        },
        lapmatkhau:{
            required:"Xác nhận mật khẩu không được để trống",
            equalTo:"Mật khẩu không khớp nhau" 
        },
        gioitinh:{
            required:"Giới tính không được để trống"
        },
        hoten:{
            required:"Họ và tên không được để trống"
    
        },
        dienthoai:{
            required:"Số điện thoại không được để trống",
            number:"Số điện thoại phải là một dãy số nguyên"
        },
        dongy:{
            required:"Bạn cần check vào đồng ý với các điều khoản của T-Shop"
        }
       
    }
});
$("#formDangNhap").validate({
    rules:{
        tendn:{
            required:true,
           
        },
        
        matkhaudn:{
            required:true,
        },
    },
    errorClass: "error-form",
    messages:{
        tendn:{
            required:"Tên đăng nhập không được để trống"
        },
        matkhaudn:{
            required:"Mật khẩu không được để trống"
        }

    },
    highlight: function (element, errorClass) {
        
        $(element).closest('.form-group').addClass('has-error');
        //closest là element đang muốn gán class error dô chung
    },      
    unhighlight: function (element, errorClass) {
        $(element).closest(".form-group").removeClass("has-error");
    },
    
});
$("#formSearch").validate({
    rules:{
        keyword:{
            required:true
        }
    },
    messages:{
        keyword:{
            required:"Bạn chưa nhập từ khoá"
        }
    }

});
$("#formTimKiemNC").validate({
    rules:{
        keyword:{
            required:true
        }
    },
    messages:{
        keyword:{
            required:"Bạn chưa nhập từ khoá"
        }
    }

});


// $("#formDangKy").extend($.validator.messages, {
    
//     if($(element).attr("name")=="tendk"){
//         required: "Tên đăng ký không được để trống.",
//     minlength: "Tên đăng ký phải từ 4 ký tự trở lên"
//     }
    
//     // remote: "Please fix this field.",
//     // email: "Please enter a valid email address.",
//     // url: "Please enter a valid URL.",
//     // date: "Please enter a valid date.",
//     // dateISO: "Please enter a valid date (ISO).",
//     // number: "Please enter a valid number.",
//     // digits: "Please enter only digits.",
//     // creditcard: "Please enter a valid credit card number.",
//     // equalTo: "Please enter the same value again.",
//     // accept: "Please enter a value with a valid extension.",
//     // maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
//     // minlength: jQuery.validator.format("Please enter at least {0} characters."),
//     // rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
//     // range: jQuery.validator.format("Please enter a value between {0} and {1}."),
//     // max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
//     // min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
// });
// //     $("#btnXoa").on("click",function(){
// //     $("#formDangKy")resetForm();
// // });