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

    var getLastDay = function(y,m){
        return  new Date(y, m, 0).getDate();
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

        // var month_name = month.filter(m => {
        //     return m.num === parseInt(sel_month)
        // })

        $.ajax({
            method : 'GET',
            url : './php/getuserdata.php',
            data : { data : { year,month : sel_month,from,to } , action : 'getworkaccomplished' },
            success:function(data){
                const tbody = $('#table-record-body').empty();
                const works = JSON.parse(data);

                $('.spinner').addClass('d-none');
                $('.print-button').removeClass('d-none');
                $('.print-record').removeClass('d-none');

                if(works.length !== 0){
                    $.each(works,function(key,work){
                        const { month,day,year,accomplished_work } = work;
                        let row = `
                            <tr>
                                <td>${month}/${day}/${year}</td>
                                <td>${accomplished_work}</td>
                            </tr>
                        `
                        tbody.append(row)
                    })
                }else{
                    let row = `
                    <tr>
                        <td colspan="2" style="letter-spacing:5px;">NO DATA FOUND</td>
                    </tr>
                    `
                    tbody.append(row)
                }

                

            }
        })

        $('.month-detail').empty()
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