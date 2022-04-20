$(document).ready(function(){

    const alert_message = `<div class="text-center alert alert-danger" role="alert">
        Please fill all the input fields!
    </div>`;

    const exist_message = `<div class="text-center alert alert-warning" role="alert">
        User already exist!
    </div>`;

    const success_message = `<div class="text-center alert alert-success" role="alert">
        Successfully registered!
    </div>`;

    $('#register-form').on('submit',function(e){
        e.preventDefault();
        const username = $('#username').val();
        const password = $('#password').val();
        const fullname = $('#fullname').val();
        const agency = $('#agency').val();

        const alertBox = $('#alert_box').empty();

        if(username === '' || password === '' || fullname === '' || agency === ''){
            
            alertBox.append(alert_message);

            $('.alert').fadeIn('slow');

            setTimeout(()=>{
                $('.alert').fadeOut('slow');
            },1500)

        }else{

            const newUser = {
                username : username,
                password : password,
                fullname : fullname,
                agency : agency
            }

            $.ajax({
                method : 'POST',
                url : '../php/register.php',
                data : {data : newUser , action : 'register'},
                success : function(data){
                    if(data === 'exist'){
                        alertBox.append(exist_message);

                        $('.alert').fadeIn('slow');

                        setTimeout(()=>{
                            $('.alert').fadeOut('slow');
                        },1500)
                    }else{
                        alertBox.append(success_message);

                        $('.alert').fadeIn('slow');

                        setTimeout(()=>{
                            $('.alert').fadeOut('slow');
                            $('#username').val('')
                            $('#password').val('');
                            $('#fullname').val('');
                            $('#agency').val('');
                        },1500)
                    }
                }
            })

            

        }



    })


})