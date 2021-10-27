jumaCollMonth = () =>{
    var y = $('#collYear').val();
    var m = $('#collMonth').val();
    $.ajax({
        type:'POST',
        url:'jumaByMonth.php',
        data:{y:y,m:m},
        dataType:'JSON',
        success:function(data){
            alert(data.msg);
        },
        error:function(data){
            alert("Failed");
        },
    });
}