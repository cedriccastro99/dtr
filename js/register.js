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

    function fullnameFormat(fname,lname,mname){
        const str = `${fname} ${mname} ${lname}`

        const arr = str.split(" ");

        for (var i = 0; i < arr.length; i++) {
            arr[i] = arr[i].charAt(0).toUpperCase() + arr[i].slice(1);
        
        }

        const str2 = arr.join(" ");
        return str2
    }

    $('#register-form').on('submit',function(e){
        e.preventDefault();
        const firstname = $('#user-firstname').val();
        const lastname = $('#user-lastname').val();
        const middle_initial = $('#user-mi').val();
        const agency = $('#user-agency').val();
        const role = $('#role').val();

        const username = `${firstname.split(' ').join('')}.${lastname.split(' ').join('')}`
        const password = `${firstname.split(' ').join('')}${lastname.split(' ').join('')}`

        const fullname = fullnameFormat(firstname,lastname,middle_initial)

        const alertBox = $('#alert_box').empty();

        if(username === '' || fullname === '' || agency === '' || role === '' || password === ''){
            
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
                agency : agency,
                role : role
            }

            $.ajax({
                method : 'POST',
                url : './php/register.php',
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
                            $('#user-firstname').val('');
                            $('#user-lastname').val('');
                            $('#user-mi').val('');
                            $('#user-agency').val('');
                            $('#role').val('');
                        },1500)
                    }
                }
            })

        }



    })


})