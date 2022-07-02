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
    
    var userEntry;
    const toast = $('#liveToast');

    setInterval(()=>{
        const date = new Date();
        $('#clock').text(`${date.toLocaleString('en-US', { hour12: true })}`)
    },1000)

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

    function checkEntry(entry){

        const buttons = {
            am_in : `<button class="btn btn-primary" id="timein">Time in AM</button>`,
            am_out: `<button class="btn btn-danger" id="timeout">Time out AM</button>`,
            pm_in : `<button class="btn btn-primary" id="timein">Time in PM</button>`,
            pm_out: `<button class="btn btn-danger" id="timeout">Time out PM</button>`,
            done : `<div class="alert alert-success" role="alert">
                        Comeback tommorow for your daily records.
                    </div>`
        }

        const btnContainer = $('#btn-container').empty();
        

        if(entry.length === 0){
            btnContainer.append(buttons.am_in);
            return;
        }

        const { am_in,am_out,pm_in,pm_out } = entry[0]; 
        
        $('#setup-select').hide()

        if(am_in !== null && am_out == null){
            btnContainer.append(buttons.am_out);
        }else if(am_in !== null && am_out !== null && pm_in == null){
            btnContainer.append(buttons.pm_in);
        }else if(am_in !== null && am_out !== null && pm_in !== null && pm_out == null){
            btnContainer.append(buttons.pm_out);
        }else{
            btnContainer.append(buttons.done);
        }
    }

    function message(type,setup){
        const date = new Date();

        const alertBox = $('#alert-container').empty();

        const timein_success = `<div class="text-center alert alert-success ds-alert" role="alert">
            Time in at ${date.toLocaleString('en-US', { hour12: true })}
        </div>`;
        const work_from_home = `<div class="text-center alert alert-success ds-alert" role="alert">
            Working from home
        </div>`;
        const timeout_success = `<div class="text-center alert alert-success ds-alert" role="alert">
            Time out at ${date.toLocaleString('en-US', { hour12: true })}
        </div>`;

        if(type == 'in'){

            if(setup === '2'){
                alertBox.append(work_from_home);
            }else{
                alertBox.append(timein_success);
            }


            $('.ds-alert').fadeIn('slow');
    
            setTimeout(()=>{
                $('.ds-alert').fadeOut('slow');
            },2000)
        }else{
            alertBox.append(timeout_success);

            $('.ds-alert').fadeIn('slow');
    
            setTimeout(()=>{
                $('.ds-alert').fadeOut('slow');
            },2000)
        }
    }

    function getTimeInOutData(){
        const date = new Date();

        const day = ((date.getDate()).toString()).padStart(2, '0')
        const month = ((date.getMonth()+1).toString()).padStart(2, '0');
        const year = date.getFullYear();

        const dateToday = {
            day : day,
            month : month,
            year : year
        }

        $.ajax({
            method : "GET",
            url : './php/getuserdata.php',
            data : { data:dateToday, action: 'getuserdata'},
            success : function(data){
                userEntry = jQuery.parseJSON(data);
                console.log(userEntry)
                checkEntry(userEntry);
            }
        })
    }

    
    getTimeInOutData()
    

    $(document).on('click','#timein',function(){

        const setup = $('#user-setup').val();
        if(userEntry.length === 0){
            if(setup === ''){
                toast.show()
                setTimeout(()=>{
                    toast.hide()
                },1500)
            }else{
                const { day,month,year,time } = getDateToday();
                
                const dateToday = {
                    day : day,
                    month : month,
                    year : year,
                    time : time,
                    type : 'am_in',
                    setup : setup
                }
                $.ajax({
                    method : 'POST',
                    url : './php/usertimein.php',
                    data : { data:dateToday , action:'timein' },
                    success : function(data){
                        userEntry = jQuery.parseJSON(data);
                        message('in',setup);
                        checkEntry(userEntry);
                    }
                })
            }
        }else{
            const { time } = getDateToday();

            const dateToday = {
                entry : userEntry[0].entry_id,
                time : time,
                type : 'pm_in'
            }

            $.ajax({
                method : 'POST',
                url : './php/usertimein.php',
                data : { data:dateToday , action:'timein' },
                success : function(data){
                    userEntry = jQuery.parseJSON(data);
                    message('in');
                    checkEntry(userEntry);
                }
            })
        }
        
    })

    $(document).on('click','#timeout',function(){
        if(userEntry[0].am_out == null){
            const { time } = getDateToday();
            const dateToday = {
                entry : userEntry[0].entry_id,
                time : time,
                type : 'am_out'
            }

            $.ajax({
                method : 'POST',
                url : './php/usertimeout.php',
                data : { data:dateToday , action:'timeout' },
                success : function(data){
                    userEntry = jQuery.parseJSON(data);
                    message('out');
                    checkEntry(userEntry);
                }
            })
        }else{
            const { time } = getDateToday();
            const dateToday = {
                entry : userEntry[0].entry_id,
                time : time,
                type : 'pm_out'
            }

            $.ajax({
                method : 'POST',
                url : './php/usertimeout.php',
                data : { data:dateToday , action:'timeout' },
                success : function(data){
                    userEntry = jQuery.parseJSON(data);
                    message('out');
                    checkEntry(userEntry);
                }
            })
        }
    })

    
})