$(document).ready(function(){
                
    const localData = JSON.parse(localStorage.getItem('page'));
    const navLink = $($('.nav-link').children('span'));
    if(localData === 'dashboard'){
        const link = $(navLink).filter(function(){ return $(this).text() === 'Dashboard' });
        $(link).parent().addClass('active')
    }else if(localData === 'records'){
        const link = $(navLink).filter(function(){ return $(this).text() === 'Records' });
        $(link).parent().addClass('active')
    }else if(localData === 'printrecords'){
        const link = $(navLink).filter(function(){ return $(this).text() === 'Print Records' });
        $(link).parent().addClass('active')
    }else if(localData === 'workaccomplished'){
        const link = $(navLink).filter(function(){ return $(this).text() === 'Work Accomplished' });
        $(link).parent().addClass('active')
    }else if(localData === 'registeruser'){
        const link = $(navLink).filter(function(){ return $(this).text() === 'Add User' });
        $(link).parent().addClass('active')
    }else if(localData === 'userlists'){
        const link = $(navLink).filter(function(){ return $(this).text() === 'User Lists' });
        $(link).parent().addClass('active')
    }

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