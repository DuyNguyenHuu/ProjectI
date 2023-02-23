function displayGiaoVien() {
    var monHoc = document.getElementById("subjects");
    var num = Number(document.getElementById("soluonggv").innerText);
    for(var i = 1;i <= num-1;i++){
        var gv = document.getElementById("GV"+i);
        if (gv.className == monHoc.value) {
            gv.style.display = "block";
            document.getElementById("teachers").selectedIndex = 0;
        } else 
        {
            gv.style.display = "none";
            document.getElementById("teachers").selectedIndex = 0;
        }
    }
}

function displayChuong() {
    var monHoc = document.getElementById("subjects");
    var num = document.getElementById("soluongchuong").innerText;
    for(var i = 1;i <= num-1;i++){
        var gv = document.getElementById("CHUONG"+i);
        if (gv.className == monHoc.value) {
            gv.style.display = "block";
        } else 
        {
            gv.style.display = "none";
        }
    }
}

function displayChuongSelect() {
    var monHoc = document.getElementById("subjects");
    var num = Number(document.getElementById("soluongchuong").innerText);
    for(var i = 1;i <= num-1;i++){
        var gv = document.getElementById("CHUONG"+i);
        if (gv.className == monHoc.value) {
            gv.style.display = "block";
            document.getElementById("chapters").selectedIndex = 0;
        } else 
        {
            gv.style.display = "none";
            document.getElementById("chapters").selectedIndex = 0;
        }
    }
}





