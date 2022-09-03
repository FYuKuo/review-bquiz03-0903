<?php
$selectID = ($_GET['id'])??0;
?>
<div class="movie_order_list">

    <div class="ct rb mytitle">線上訂票</div>
    
    <table class="table_bg m-auto w-70 order_table">
        <tr>
            <td>電影:</td>
            <td>
                <select name="movie" id="movie" style="width: 95%;">
                </select>
    
            </td>
    
        </tr>
        <tr >
            <td>日期:</td>
            <td>
                <select name="date" id="date" style="width: 95%;">
    
                </select>
            </td>
        </tr>
        <tr>
            <td>場次:</td>
            <td>
                <select name="session" id="session" style="width: 95%;">
    
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="rb ct">
                    <input type="button" value="確定" onclick="book()">
                    <input type="button" value="重置" onclick="getMovie()">
            </td>
        </tr>
    </table>
</div>

<div class="book" style="display: none;">
    定位囉
</div>


<script>

    getMovie();

    function getMovie(){
        
        $.get('./api/get_movie.php',{id:<?=$selectID?>},(res)=>{
            // console.log(res);
            $('#movie').html(res);

            let movie = $('#movie').val();
            getDate(movie);

        })
    }

    function getDate(movie){

        $.get('./api/get_date.php',{movie},(res)=>{
            // console.log(res);
            $('#date').html(res)

            let date = $('#date').val();
            // console.log(movie,date);
            getSession(movie,date);

        })
    }

    function getSession(movie,date){

        $.get('./api/get_session.php',{movie,date},(res)=>{
            // console.log(res);
            // console.log(date);
            $('#session').html(res)

        })
    }


    $('#movie').on('change',function(){
        let movie = $('#movie').val();
        getDate(movie);
    })

    $('#date').on('change',function(){
        let movie = $('#movie').val();
        let date = $('#date').val();
        getSession(movie,date);
    })


    function book(){
        $('.movie_order_list').hide();
        $('.book').show();

        let movie = $('#movie').val();
        let date = $('#date').val();
        let session = $('#session').val();
        // console.log(movie);
        // console.log(date);
        // console.log(session);

        $.get('./api/book.php',{movie,date,session},(res)=>{
            $('.book').html(res);
            setEvents();
        })
        
    }

    let setArr = new Array();

    function setEvents(){
        
        
            $('.set').on('change',function() {
            
                if($(this).prop('checked') == true){
        
                    if(setArr.length < 4){
                        setArr.push($(this).val());
        
                        $(this).parent().addClass('emptySet');
                    }else{
                        alert('最多僅能訂購4張票');
                        $(this).prop('checked',false);
                    }
        
                }else{
        
                    setArr.splice(setArr.indexOf($(this).val()),1);
                    $(this).parent().removeClass('emptySet');
        
                }
        
            
                let num = setArr.length;
                $('.setnum').text(num);
                // console.log(setArr);
            })

    }

</script>