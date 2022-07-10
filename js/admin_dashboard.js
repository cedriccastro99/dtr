function getDateToday(){

    const date = new Date();

    const day = ((date.getDate()).toString()).padStart(2, '0')
    const month = ((date.getMonth()+1).toString()).padStart(2, '0');
    const year = date.getFullYear();
    const time = date.toLocaleTimeString();
    const raw = date.toLocaleString('en-US', { hour12: true })

    return ({day,month,year,time,raw});

}
$(document).ready(function(){

    let userlogs;
    const { day,month,year } = getDateToday();

    (()=>{
        $.ajax({
            method : 'GET',
            url : './php/getuserdata.php',
            data : { data : {day,month,year}, action : 'getuserlogs' },
            success : function(data){
                userlogs = JSON.parse(data)

                const tbody = $('#logs').empty();

                if(userlogs.length !== 0){
                    let logs = [];

                    $.each(userlogs,function(index,log){
                        if(index === 0){
                            if(log.setup === 1 || log.setup === '1'){
                                logs.push(log)
                            }
                        }
                        if(log.setup === 1 || log.setup === '1'){
                            logs.push(log)
                        }else if(log.setup === 2 || log.setup === '2'){
                            if(logs.find(l => l.fullname === log.fullname
                                && l.agency === log.agency 
                                && l.time === log.time
                                && l.setup === log.setup 
                            )){
                                return
                            }else{
                                log.type = 'wfh'
                                logs.push(log)
                            }
                        }

                    })

                    $.each(logs,function(key,log){
    
                        const { type } = log;
    
                        let log_type;
    
                        if(type === 'am_in'){
                            log_type = 'Time in AM'
                        }
    
                        if(type === 'am_out'){
                            log_type = 'Time out AM'
                        }
    
                        if(type === 'pm_in'){
                            log_type = 'Time in PM'
                        }
    
                        if(type === 'pm_out'){
                            log_type = 'Time out PM'
                        }

                        if(type === 'wfh'){
                            log_type = 'Work from Home'
                        }
    
                        let row = `
                            <tr>
                                <td>${log.fullname}</td>
                                <td>${log.agency}</td>
                                <td>${log_type}</td>
                                <td>${log.time}</td>
                            </tr>
                        `
                        tbody.append(row)
                    })
                }else{
                    tbody.append(`
                        <tr>
                            <td class="text-center" colspan="4" style="letter-spacing:4px;">NO USER ACTIVITY</td>
                        </tr>
                    `)
                }


            }
        })

    })()
    
    setInterval(()=>{
        const date = new Date();
        $('#clock').text(`${date.toLocaleString('en-US', { hour12: true })}`)
    },1000)
})