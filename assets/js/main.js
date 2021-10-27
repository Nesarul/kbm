jumaCollMonth = () =>{
    var da;
    $.ajax({
        type:'POST',
        url:'jumaByMonth.php',
        data:{y:$('#collYear').val(),m:$('#collMonth').val()},
        dataType:'JSON',
        success:function(data){
            for(i = 0; i < data.length; ++i){
               da+="<tr><td>"+data[i].juma_date+"</td><td>"+data[i].juma_amount+"</td></tr>";
            }
            $('#tb-collMonth').html(da);
        },
        error:function(data){
            alert("Failed");
        },
    });
}