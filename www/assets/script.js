let del_id = document.getElementById('del');

window.onclick = function(del) {
    if (del.target == del_id) {
        del_id.style.display = "none";
    }
}

function show_search() {
    document.getElementById('selection_more').style.display = 'block'
}

function hide_search() {
    document.getElementById('selection_more').style.display = 'none'
}
