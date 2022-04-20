$(document).ready(function(){

    setInterval(()=>{
        const date = new Date();
        $('#clock').text(date.toLocaleTimeString())
    },1000)

    $('#test').on('click',function(){
        const date = new Date();
        console.log(date.toLocaleTimeString());
    })

    $('#logout-btn').on('click',function(){
        $.ajax({
            method : 'POST',
            url : './php/logout.php',
            data : {action : 'logout'},
            success : function(data){
                if(data === 'logout'){
                    window.location = "./views/login.php"
                }
            }         
        })
    })
    
})