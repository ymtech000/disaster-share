window.onload = function() {
    var options = document.getElementById("submit_area").options;
    var area = document.getElementById('area_name').value;
    console.log('area');
    for (var i=0; i < options.length; i++) {
        if (options[i].selected === area) {
            select.options[i].selected = true;
        }
    }
};


