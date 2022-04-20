$(document).ready(function(){

    const alert_message = `<div class="text-center alert alert-danger" role="alert">
        Please fill all the input fields!
    </div>`;

    const wrong_password = `<div class="text-center alert alert-warning" role="alert">
        Wrong Password
    </div>`;
    
    const not_found = `<div class="text-center alert alert-danger" role="alert">
        User not found!
    </div>`;
    
    const success_message = `<div class="text-center alert alert-success" role="alert">
        Login Successfully!
    </div>`;

    $('#login-form').on('submit',function(e){
        e.preventDefault();
        
        const username = $('#username').val();
        const password = $('#password').val();

        const alertBox = $('#alert_box').empty();

        if(username === '' || password === ''){

            alertBox.append(alert_message);

            $('.alert').fadeIn('slow');

            setTimeout(()=>{
                $('.alert').fadeOut('slow');
            },1500)

        }else{

            const user = {
                username : username,
                password : password
            }

            $.ajax({
                method : 'POST',
                url : '../php/login.php',
                data : {data : user,action : 'login'},
                success : function(data){

                    if(data === 'logged in'){
                        alertBox.append(success_message);

                        $('.alert').fadeIn('slow');

                        setTimeout(()=>{
                            $('.alert').fadeOut('slow');
                        },900)
                        
                        setTimeout(() => {
                            window.location = "../";
                        }, 1000);
                    }else if(data === 'wrong password'){
                        alertBox.append(wrong_password);

                        $('.alert').fadeIn('slow');

                        setTimeout(()=>{
                            $('.alert').fadeOut('slow');
                        },1000)
                    }else{
                        alertBox.append(not_found);

                        $('.alert').fadeIn('slow');

                        setTimeout(()=>{
                            $('.alert').fadeOut('slow');
                        },1000)
                    }
                }
            })


        }

    })

})