<?php
include('modaldiem.php');
?>


<script>
    
    let tgconlai = 30 * 60; // Thời gian bài thi ban đầu là 30 phút

    let intervalId; // ID của setInterval

    let tgbatdau;

    function updateTime() {
        tgconlai--;
        if (tgconlai < 0) {
            clearInterval(intervalId);
            kiemtraketqua();
            return;
        }
        let minutes = Math.floor(tgconlai / 60);
        let seconds = tgconlai % 60;
        $('#thoigianconlai').html(minutes + ':' + (seconds < 10 ? '0' : '') + seconds);
    }

    let diem = 0;
    $(document).ready(function() {
        $('#btn-nopbai').hide();
        
    });

    // Nút bắt đầu
    $('#btn-batdau').click(function() {
        tgbatdau = new Date().getTime();
        laycauhoi();
        $('#btn-nopbai').show();
        $(this).hide();
        $('#thoigianconlai').show(); // Hiển thị thời gian đếm ngược
        intervalId = setInterval(updateTime, 1000); // Tính thời gian mỗi giây
    });

    // Nút nộp bài
    $('#btn-nopbai').click(function() {
        $(this).hide();
        
        //clearInterval(intervalId); // Dừng tính thời gian
        //$('#thoigianconlai').show(); 

        kiemtraketqua();
    });

    //laấy câu hỏi trang admin
    function laycauhoi() {
        $.ajax({
            url: 'cauhoi.php',
            type: 'GET',
            success: function(data) {
                cauhois = jQuery.parseJSON(data); //ép kết quả trả về theo chuỗi JSON
                let id = 1;
                let D = '';
                $.each(cauhois, function(key, value) {
                    D += '<div class="row" style="margin-left:10px" id="cauhoi_' + value['id'] + '">';
                    D += ' <h5 id="' + value['id'] + '"><b><span class="text-danger">Câu ' + id + ': </span>' + value['question'] + '</b></h5>';
                    D += '<fieldset>';
                    D += '<div class="col-sm-12">';
                    D += '<label class="A" ><input type="radio" class="A"name="' + value['id'] + '">' + value['option_a'] + '</label>';
                    D += '</div>';
                    D += '<div class="col-sm-12">';
                    D += '<label class="B"><input type="radio" class="B" name="' + value['id'] + '">' + value['option_b'] + '</label>';
                    D += '</div>';
                    D += '<div class="col-sm-12">';
                    D += '<label class="C"><input type="radio" class="C" name="' + value['id'] + '">' + value['option_c'] + '</label>';
                    D += '</div>';
                    D += '<div class="col-sm-12">';
                    D += '<label class="D"><input type="radio" class="D" name="' + value['id'] + '">' + value['option_d'] + '</label>';
                    D += '</div>';
                    D += '</fieldset>';
                    D += '</div>';
                    id++;
                })
                $('#cauhoi').html(D);
            }
        });
    }
    //kiểm tra kết quả
    function kiemtraketqua() {
        clearInterval(intervalId); // Dừng tính thời gian
        $('#btn-nopbai').hide();
        $('#btn-batdau').show();
        $('#thoigianconlai').hide();
        let tongCauHoi = cauhois.length;
        let diem = 0;
        $('#cauhoi div.row').each(function(key, value) { //ecach là vòng lặp foreach
            //1. Lấy đáp án đúng của câu hỏi
            let id = $(value).find('h5').attr('id');
            let cauhoi = cauhois.find(x => x.id == id); //tìm câu hỏi trong mảng cauhois
            let answer = cauhoi['answer'];
            //console.log(answer);

            //2. lấy đáp án của người dùng
            let dapan = $(value).find('fieldset input[type="radio"]:checked').attr('class');
            let luachon = ''
            //console.log(luachon);
            switch (dapan) {
                case 'A':
                    luachon = 'A'
                    break;
                case 'B':
                    luachon = 'B'
                    break;
                case 'C':
                    luachon = 'C'
                    break;
                case 'D':
                    luachon = 'D'
                    break;
            }
            if (luachon == answer) {
                diem += 1;
            } else {
                console.log('Câu có id: ' + id + 'Sai');
            }
            //3. Đánh dấu câu đúng
            $('#cauhoi_' + id + '> fieldset > div > label.' + answer).css("background-color", "yellow");
        });
        $.ajax({
        url: 'luudiem.php',
        type: 'POST',
        data: {
            diem: diem
        },
        success: function(data) {
        $('#diem').html(diem);
        },
  });
        let phutLamBai = Math.floor((30 * 60 - tgconlai) / 60);
        let giayLamBai = (30 * 60 - tgconlai) % 60;
        let thoiGianLamBai = phutLamBai + ' phút ' + giayLamBai + ' giây';
        $('#myModal .modal-body').html(`
        <p style="font-size: 18px; color: #333;">Chúc mừng bạn đã hoàn thành phần thi.</p>
        <p style="font-size: 16px; color: #666;">Tổng thời gian làm bài của bạn là :${thoiGianLamBai} .</p>
        <p style="font-size: 16px; color: #666;">Bạn đạt ${diem} điểm trên tổng số ${tongCauHoi} câu hỏi.</p>
         `);
         $('#btn-batdau').hide();
        $('#myModal').modal('show');

    }

</script>

