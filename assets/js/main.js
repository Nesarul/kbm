expMenu = () => {
    $('[id^=exp_]').toggleClass('d-none').toggleClass('d-block');
    $('#sidebar, #su-menu').toggleClass('active');
    $('.right-bar').toggleClass('right-bar-active');
}

var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
// Can be found here:  https://stackoverflow.com/questions/14075014/jquery-function-to-to-format-number-with-commas-and-decimal

formatNumber = (number) =>{
    var n= number.toString();
    n = n.replace(/\B(?=(\d{3})+(?!\d))/g, ",")+".00";
    return n;
}

/* Juma Collection List */

// Month
jumaCollMonth = () =>{
    var mo = "Month Value";
    $.ajax({
        type:'POST',
        url:'jumaByMonth.php',
        data:{y:$('#collYear').val(),m:$('#collMonth').val()},
        dataType:'JSON',
        success:function(data){
            for(i = 0; i < data['res'].length; ++i){
               mo+="<tr><td>"+data['res'][i].juma_date+"</td><td>"+data['res'][i].juma_receipt_no+"</td><td>"+formatNumber(data['res'][i].juma_amount)+"</td></tr>";
            }
            $('#tb-collMonth').html(mo);
            $('#mTotal').html(formatNumber(data['mTotal'][0].mTotal));
        },
        error:function(data){
            alert("Failed");
        },
    });
}

// Year
jumaCollYear = () =>{
    var da;
    $.ajax({
        type:'POST',
        url:'jumaByYear.php',
        data:{y:$('#collY').val()},
        dataType:'JSON',
        success:function(data){
            for(i = 0; i < data['res'].length; ++i){
               da+="<tr><td>"+months[data['res'][i].mth - 1]+"</td><td>"+formatNumber(data['res'][i].amount)+"</td></tr>";
            }
            $('#tb-collYear').html(da);
            $('#yTotal').html(formatNumber(data['yTotal'][0].yTotal));
        },
        error:function(data){
            alert("Failed");
        },
    });
}

// Register New Entery
registerEntry = () =>{
    if($('#coll-rec').val() === ""){
        $('#coll-rec').next().removeClass('d-none');
        return;
    }
    var d = $('#coll-date').val();
    if(d != null){
        var p = new Date(d)
        if(p.getDay() != 5){
            $('#coll-date').next().removeClass('d-none')
            return;
        }
    }
    if($('#coll-amount').val() === "")
    {
        $('#coll-amount').next().removeClass('d-none');
        return;
    }
    var form = $('#regEntry')[0];
    var dataFrm = new FormData(form);
    $.ajax({
        type:'POST',
        url:'jumaEntry.php',
        data: $('#regEntry').serialize(),
        dataType:'JSON',
        success:function(data){
            if(data['msg']==="1"){
                $('#rec-no').text("This Receipt has been issued. Please try another.");
                $('#coll-rec').next().removeClass('d-none');
                return;
            }


            $('#collMonth').val(parseInt(data['mth']));
            $('#collYear, #collY').val(data['yr']);
            jumaCollMonth();
            jumaCollYear();
            $('#jumaEntry').modal("hide");
        },
        error:function(data){
            alert("Failed");
        },
    });
}
/* Juma Collection List */

/* Receipt Book */
regReceipt = (recNo, where) => {
    $.ajax({
        type:'POST',
        url:'registerReceipt.php',
        data: {no:recNo,w:where},
        dataType:'JSON',
        success:function(data){
        },
        error:function(data){
            alert("Failed");
        },
    });
}
readReceipt = () =>{
    var pk="";
    $.ajax({
        type:'POST',
        url:'readBook.php',
        data: "",
        dataType:'JSON',
        success:function(data){
            for(i = 0; i < data['res'].length; i++){
                pk += "<tr><td>"+data['res'][i].rec_book_no+"</td><td>"+data['res'][i].rec_issue_date+"</td><td>"+data['res'][i].client_name+"</td><td>"+data['res'][i].rec_start_no+"</td><td>"+data['res'][i].rec_end_no+"</td><td>"+data['res'][i].issuer+"</td></tr>";
                $('#bodyBook').html(pk);
            }
        },
        error:function(data){
            alert("Failed");
        },
    });
}

issueBook = () =>{
    var pk="";
    $.ajax({
        type:'POST',
        url:'issueBook.php',
        data: $('#bookEntry').serialize(),
        dataType:'JSON',
        success:function(data){
            readReceipt();
        },
        error:function(data){
            alert("Failed");
        },
    });
}
/* Receipt Book */


/* Collection */
updateCollection = () =>{
    var pk = "";
    var i = 0;
    $.ajax({
        type:'POST',
        url:'updateCollection.php',
        data: {y:$('#collY').val()},
        dataType:'JSON',
        success:function(data){
            for(i = 0; i < data['res'].length; i++){
                pk += "<tr><td>"+months[data['res'][i].mth-1]+"</td><td>"+data['res'][i].amount+"</td></tr>";
            }
            $('#bodyColl').html(pk);
        },
        error:function(data){
            alert("Failed");
        },
    })
}
insertCollection = () =>{
    var residentId = $('#nc_resident').val();
    if("" === residentId){
        alert("Please select a Resident to continue");
        return;
    }
    var date = $("#nc_date").val();
    var receipt = $("#nc_receipt").val();
    var resident = $("#nc_resident").val();
    var amount = $("#nc_amount").val();
    var collBy = $('#nc_collector').val();
    $.ajax({
        type:'POST',
        url:'insertCollection.php',
        data: {date:date, receipt:receipt, resident:resident, amount:amount,col:collBy},
        dataType:'JSON',
        success:function(data){
            alert(data);
        },
        error:function(data){
            alert("Failed");
        },
    })
}

updateDonation = () =>{
    $.ajax({
        type:'POST',
        url:'donationEntry.php',
        data: $('#formDonation').serialize(),
        dataType:'JSON',
        success:function(data){
            (data['msg']==='success') ? $('#success-entry').removeClass('d-none').addClass('d-block'):'null';
            if(data['msg'] === 'success'){
                var myInterval = setInterval(function () {
                    $('#success-entry').removeClass('d-block').addClass('d-none');
                },2000);
                // clearInterval(myInterval);
            }
        },
        error:function(data){
            alert("Failed");
        },
    });
}