<h1 class="ct">管理登入</h1>
<table class="m-auto">
    <tr>
        <td >帳號 : </td>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td >密碼 : </td>
        <td><input type="password" name="pw" id="pw"></td>
    </tr>
</table>
<div class="ct my-10">
    <button onclick="login()">登入</button>
    <button onclick="reset()">重置</button>
</div>

<script>
    function login(){
        let acc = $('#acc').val();
        let pw = $('#pw').val();

        $.get('./api/login.php',{acc,pw},(res)=>{
            if(parseInt(res) == 1){

            }else{
                
            }
        })
    }
</script>