$(document).ready(function(){
    (() => {
        $.ajax({
            method : "GET",
            url : './php/getuserdata.php',
            data : { action : 'getusers' },
            success:function(data){

                const users = JSON.parse(data);

                const tbody = $('#user-list').empty();

                if(users.length !== 0){
                    $.each(users,function(index,user){
                        let row = `
                            <tr>
                                <td>${user.user_id}</td>
                                <td>${user.username}</td>
                                <td>${user.fullname}</td>
                                <td>${user.agency}</td>
                                <td>${user.role}</td>
                            </tr>
                        `

                        tbody.append(row)
                    })
                }else{
                    tbody.append(`
                        <tr>
                            <td class="text-center" colspan="5" style="letter-spacing:4px;">NO USER ADDED</td>
                        </tr>
                    `
                    )
                }

            }
        })
    })()
})