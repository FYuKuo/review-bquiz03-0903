function rank(id,chId,table){
    $.post('./api/rank.php',{id,chId,table},()=>{
        location.reload();
    })
}

function del(id,table){
    $.post('./api/del.php',{id,table},()=>{
        location.reload();
    })
}

function sh(id,table,sh){
    $.post('./api/sh.php',{id,table,sh},()=>{
        location.reload();
    })
}