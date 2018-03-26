var appChat=new Vue({
    el : '.nd',
    data : {
        dsChat:[{
        
            ten: 'Admin',
            noiDungChat: "Xin chào, chúng tôi có thể giúp gì cho bạn?"
        }],
        noiDungNhapChat:"",
        notEndChat:true
    },
    methods:{
        addChat: function(userName){
            this.dsChat.push({
                ten:userName,
                noiDungChat:this.noiDungNhapChat
            });
            this.noiDungNhapChat="";
            setTimeout(function(){
                appChat.adminChat();
            },2000);
        },
        adminChat:function(){
            this.dsChat.push({
     
                ten:"Admin",
                noiDungChat:"Admin trả lời....."
            });
        },

    }

});