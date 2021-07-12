// ページをロードしたときに読み込む
window.addEventListener('load', last_name_event);

// 名字の配置選択を押した時の動作
function last_name_event(){
    let example_id = document.getElementsByName('example');
    let last_count_id = document.getElementById('last_name_count');
    let last_name_count_id = document.getElementById('last_name_count_id');
    let last_name_type_id = document.getElementById('last_name_type_id');
    let last_type_id = document.querySelectorAll('[data-last_type]');
    let radio_id = document.getElementsByName('last_name_posi');
    let i=0;
    let k=0;

    // 名字の無しにチェックがあるかないかで、表示非表示の切り替え
    if(radio_id[0].checked){
        last_count_id.setAttribute('disabled','');
        while(i < last_type_id.length){
            last_name_count_id.style.color = '#aaaaaa'
            last_name_type_id.style.color = '#aaaaaa'
            last_type_id[i].setAttribute('disabled','');
            i++;
        }
    } else if(radio_id[0].checked === false){
        last_count_id.removeAttribute('disabled');
        while(i < last_type_id.length){
            last_name_count_id.removeAttribute('style');
            last_name_type_id.removeAttribute('style');
            last_type_id[i].removeAttribute('disabled');
            i++;
        }
    }

    while(k < radio_id.length){
        // 元々表示されていた文字を非表示
        example_id[k].style.display = 'none';
        if(radio_id[k].checked){
            // ラジオボタンにチェックが入っている文字を表示
            example_id[k].style.display = 'block';
        }
        k++;
    }
} 

// 「はい」かキャンセルのメッセージ
function check(message){
    var check = confirm(message);
    if(check == true) {
        return true;
    } else {
        return false;
    }
}

