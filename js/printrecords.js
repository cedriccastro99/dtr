const month = [
    { name : "Month" , num : ''},
    { name : "January" , num : 1 },
    { name : "Febuary" , num : 2 },
    { name : "March" , num : 3 },
    { name : "April" , num : 4 },
    { name : "May" , num : 5 },
    { name : "June" , num : 6 },
    { name : "July" , num : 7 },
    { name : "August" , num : 8 },
    { name : "September" , num : 9 },
    { name : "October" , num : 10 },
    { name : "November" , num : 11 },
    { name : "December" , num : 12 },
]

$(document).ready(function(){

    (function(){

        let year;

        clearFrom()
        clearTo()

        $.ajax({
            method : "GET",
            url : './php/getyear.php',
            data : { action: 'getyear' },
            success : function(data){
                year = JSON.parse(data)
                $('#year').append(`<option value="">Year</option>`)
                year.forEach(y => {
                    $('#year').append(`<option value="${y.year}">${y.year}</option>`)
                })
            }
        })

        month.forEach(m => {
            $('#month').append(`<option value="${m.num}">${m.name}</option>`)
        })
        
    })()

    let endofmonth;

    function clearFrom(){
        $('#from').empty();
        $('#from').append('<option value="">From</option>')
    }

    function clearTo(){
        $('#to').empty()
        $('#to').append('<option value="">To</option>')
    }

    function weekendcheck(year,month,date){
        var date = new Date(`${year}-${month}-${date}`);
        if(date.getDay() == 6 ){
            return 'Saturday'
        }else if(date.getDay() == 0){
            return 'Sunday'
        }else{
            return 'Weekday'
        }

    }

    var getLastDay = function(y,m){
        return  new Date(y, m, 0).getDate();
    }

    function createrecords(month_name,from,to,year,records,sel_month,holidays){
        $('.spinner').addClass('d-none');
        $('.print-button').removeClass('d-none');
        $('.print-record').removeClass('d-none');
        $('.month-detail').append(`${month_name[0].name} ${from}-${to}, ${year}`)

        const table = $('#table-record-body').empty();

        const filtered = holidays.filter(function(holiday){
            const { date : datetime,type  } = holiday
            if( datetime.datetime.month === parseInt(sel_month) && type[0] === 'National holiday' ){
                return holiday
            }
        })

        for(let i = parseInt(from) ; i <= parseInt(to) ; i++){
            let row;
            let date = records.filter(function(d){
                if(parseInt(d.day) === parseInt(i)){
                    return d
                }
            })
            let isHoliday = filtered.filter(function(holiday){
                const { date : datetime,type  } = holiday
                if( datetime.datetime.day === i){
                    return true
                }else{
                    return false
                }
            })
            let isWeekday = weekendcheck(year,sel_month,i)
            if(isHoliday.length !== 0){
                row = `<tr>
                    <td>${i}</td>
                    <td style="letter-spacing:5px;color:red;"><b>HO</b></td>
                    <td style="letter-spacing:5px;color:red;"><b>LI</b></td>
                    <td style="letter-spacing:5px;color:red;"><b>DA</b></td>
                    <td style="letter-spacing:5px;color:red;"><b>Y</b></td>
                </tr>` 
            }else if(isWeekday === 'Saturday'){
                row = `<tr>
                    <td>${i}</td>
                    <td style="letter-spacing:5px;"><b>SA</b></td>
                    <td style="letter-spacing:5px;"><b>TU</b></td>
                    <td style="letter-spacing:5px;"><b>RD</b></td>
                    <td style="letter-spacing:5px;"><b>AY</b></td>
                </tr>` 
            }else if(isWeekday === 'Sunday'){
                row = `<tr>
                    <td>${i}</td>
                    <td style="letter-spacing:5px;"><b>S</b></td>
                    <td style="letter-spacing:5px;"><b>UN</b></td>
                    <td style="letter-spacing:5px;"><b>DA</b></td>
                    <td style="letter-spacing:5px;"><b>Y</b></td>
                </tr>` 
            }else if(date.length !== 0){
                if(date[0].setup === '1'){
                    row = `<tr>
                        <td>${i}</td>
                        <td>${date[0].am_in === null ? '---' : date[0].am_in}</td>
                        <td>${date[0].am_out === null ? '---' : date[0].am_out}</td>
                        <td>${date[0].pm_in === null ? '---' : date[0].pm_in}</td>
                        <td>${date[0].pm_out === null ? '---' : date[0].pm_out}</td>
                    </tr>` 
                }else if(date[0].setup === '2'){
                    row = `<tr>
                        <td>${i}</td>
                        <td colspan="4" style="letter-spacing:5px;"><b>WORK FROM HOME</b></td>
                    </tr>`
                }
            }else{
                row = `<tr>
                    <td>${i}</td>
                    <td colspan="4" style="letter-spacing:5px;"><b>NO RECORD</b></td>
                </tr>` 
            }

            table.append(row)
        }
    }
    
    $('#month').on('change',function(){
        let month = $(this).val()
        let year = $('#year').val()
        if(month !== '' &&  year !== ''){
            endofmonth = getLastDay(year,month);
            clearFrom()
            clearTo()
            for(let i = 1; i <= endofmonth ; i++){
                $('#from').append(`<option value="${i}">${i}</option>`)
            }
        }
    })

    $('#year').on('change',function(){
        let month = $('#month').val()
        let year = $(this).val()
        if(month !== '' &&  year !== ''){
            endofmonth = getLastDay(year,month);
            clearFrom()
            clearTo()
            for(let i = 1; i <= endofmonth ; i++){
                $('#from').append(`<option value="${i}">${i}</option>`)
            }
        }
    })

    $('#from').on('change',function(){
        clearTo()
        for(let i = parseInt($(this).val()); i <= endofmonth; i++){
            $('#to').append(`<option value="${i}">${i}</option>`)
        }
    })

    $('#date-select').on('submit',function(e){
        e.preventDefault()

        $('.print-button').addClass('d-none');
        $('.print-record').addClass('d-none');
        $('.spinner').removeClass('d-none');

        const year = e.target[0].value;
        const sel_month = e.target[1].value;
        const from = e.target[2].value;
        const to = e.target[3].value;

        var month_name = month.filter(m => {
            return m.num === parseInt(sel_month)
        })

        $('.month-detail').empty()

        $.ajax({
            method : 'GET',
            url : './php/getuserdata.php',
            data : { data : { year,month : sel_month,from,to } , action : 'getprintrecords' },
            success:function(data){
                const records = JSON.parse(data);
                let holidays;
                const localData = JSON.parse(localStorage.getItem('holidays'))
                
                if(!localData){
                    $.getJSON(`https://calendarific.com/api/v2/holidays?api_key=499b14be2ab015a560edd2aae50ba23d174ffb93&country=PH&year=${year}`, function(data) {
                        
                        holidays = data.response.holidays

                        localStorage.setItem('holidays',JSON.stringify(
                            { holidays,year }
                        ))

                        createrecords(month_name,from,to,year,records,sel_month,holidays)
                    })
                }else{
                    if(localData.year === year){
                        holidays = localData.holidays
                        createrecords(month_name,from,to,year,records,sel_month,holidays)
                    }else{
                        $.getJSON(`https://calendarific.com/api/v2/holidays?api_key=499b14be2ab015a560edd2aae50ba23d174ffb93&country=PH&year=${year}`, function(data) {
                        
                            holidays = data.response.holidays

                            localStorage.setItem('holidays',JSON.stringify(
                                { holidays,year }
                            ))

                            createrecords(month_name,from,to,year,records,sel_month,holidays)
                        })
                    }
                }

            }
        })
    })

    $('#print').on('click',function(){
        $('.print-record').printThis()
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