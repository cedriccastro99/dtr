$(document).ready(function(){

    function getAllUserEntry(){

        const recordsTable = $('#records-table').children('tbody').empty();

        $.ajax({
            method : "GET",
            url : './php/getuserdata.php',
            data : { action: 'getuserentry' },
            success : function(data){

                const entries = jQuery.parseJSON(data);

                console.log(entries)

                if(entries.length === 0){
                    let row = `<tr>
                            <td colspan="7"> No records found.. </td>
                        </tr>`;
    
                    recordsTable.append(row);
                }else{

                    $.each(entries,function(index,entry){

                        let row = '';

                        if(entry.setup === '2'){
                            row = `<tr>
                                <td>${entry.month}</td>
                                <td>${entry.day}</td>
                                <td>${entry.year}</td>
                                <td class="text-center" colspan="4" style="letter-spacing:4px;"><b>WORK FROM HOME</b></td>
                            </tr>`
                        }else{
                            row = `<tr>
                                <td>${entry.month}</td>
                                <td>${entry.day}</td>
                                <td>${entry.year}</td>
                                <td>${entry.am_in == null? '- - -' : entry.am_in}</td>
                                <td>${entry.am_out == null? '- - -' : entry.am_out}</td>
                                <td>${entry.pm_in == null? '- - -' : entry.pm_in}</td>
                                <td>${entry.pm_out == null? '- - -' : entry.pm_out}</td>
                            </tr>`;
                        }

                        
    
                        recordsTable.append(row);
                    })

                }

            }
        })
    }

    getAllUserEntry()


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