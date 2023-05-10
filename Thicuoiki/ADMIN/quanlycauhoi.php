<?php
include('Modal.php');
?>
<script type="text/JavaScript"> 
var page =1;
  // trong sự kiện đang load xong thì  gọi tới hàm load ds câu hỏi
     $(document).ready(function(){
      $('#btnTK').click();
      
    });
    $('#them').click(function(){
      //Khi thêm mới mặc định id câu hỏi là rỗng
      $('#xnSua').val('');
            $('#ex').val('');
           $('#op_A').val('');
           $('#op_B').val('');
           $('#op_C').val('');
           $('#op_D').val('');

           $('#rd_a').val('');
           $('#rd_b').val('');
           $('#rd_c').val('');
           $('#rd_d').val('');
        $('#mdlqs').modal();
        $('#ex').attr('readonly',false);
           $('#op_A').attr('readonly',false);
           $('#op_B').attr('readonly',false);
           $('#op_C').attr('readonly',false);
           $('#op_D').attr('readonly',false);

           $('#rd_a').attr('disabled',false);
           $('#rd_b').attr('disabled',false);
           $('#rd_c').attr('disabled',false);
           $('#rd_d').attr('disabled',false);
        $('#btn_xn').show();
    });
   // TimKiem
   $('#btnTK').click(function(){
  let tk = $('#txtSearch').val().trim();
  loadData(tk);
  phantrang(tk);
});
    //Xem
    $(document).on('click',"input[name='btnxem']",function(){  
      //var nutid=this.id;//gán giá trị của thuộc tính id của phần tử input đã được click
      var tr_id =$(this).closest('tr').attr('id');// gán giá trị của thuộc tính id của phần tử tr mà phần tử input đó nằm trong đó.   
      chitiet(tr_id);
      //set cho chỉ dc xem không thể sửa
       $('#ex').attr('readonly','readonly');
           $('#op_A').attr('readonly','readonly');//dùng readonly để chỉ định input kh thể sửa
           $('#op_B').attr('readonly','readonly');
           $('#op_C').attr('readonly','readonly');
           $('#op_D').attr('readonly','readonly');

           $('#rd_a').attr('disabled','readonly');//dùng disabled để vhh rd
           $('#rd_b').attr('disabled','readonly');
           $('#rd_c').attr('disabled','readonly');
           $('#rd_d').attr('disabled','readonly');

           $('#btn_xn').hide();
    });
     //Sửa
     $(document).on('click',"input[name='btnsua']",function(){  
      var tr_id =$(this).closest('tr').attr('id');//lấy id của dòng dc chọn trong table khi click vào button
      chitiet(tr_id);// lấy câu hỏi dựa vào id tìm dc ở trên và cho dữ liệu vào các input
          $('#ex').attr('readonly',false);
           $('#op_A').attr('readonly',false);
           $('#op_B').attr('readonly',false);
           $('#op_C').attr('readonly',false);
           $('#op_D').attr('readonly',false);

           $('#rd_a').attr('disabled',false);
           $('#rd_b').attr('disabled',false);
           $('#rd_c').attr('disabled',false);
           $('#rd_d').attr('disabled',false);
           
           $('#xnSua').val(tr_id);// set id chisnh bằng id dòng dc chon
           $('#btn_xn').show();

    });
     // Xóa
  $(document).on('click', "input[name='btnxoa']", function() {
  var tr_id = $(this).closest('tr').attr('id');
  if (confirm("Bạn có chắc chắn xóa câu hỏi này?")) {
    $.ajax({
      url: 'btnxoa.php',
      type: 'POST',
      data: {
        id: tr_id //id cauhoi duoc chon
      },
      success: function(data) {
        alert(data);
        loadData(); // cap nhat lai danh sach hien thi cau hoi
      }
    })
  }
});
    function chitiet(id){// đem này xuống dưới để dùng cho btn sửa  
      // lấy câu hỏi dựa trên id câu hỏi   
      $.ajax({//lấy dữ liệu
          url: 'btnxem.php', type:'get',// chỉ đường dẫn tới btnxem.php để lấy câu hỏi
          data:{
          id :id//giá trị truyền vào(truyền tham số có gtri truyền vào = id câu hỏi)
          },success:function(data){
           var a = jQuery.parseJSON(data) ;//ép kết quả trả về theo JSON
           //console.log(a);
           $('#ex').val(a['question']);//set giá trị cho id ex
            $('#op_A').val(a['option_a']);
            $('#op_B').val(a['option_b']);
            $('#op_C').val(a['option_c']);
            $('#op_D').val(a['option_d']);
           $('#mdlqs').modal();
           switch (a['answer']) {
            case 'A':
                $('#rd_a').prop('checked',true);//thiết lập thuộc tính 'checked' của nó là true bằng cách sử dụng phương thức .prop
              break;
              case 'B':
                $('#rd_b').prop('checked',true);
              break;  
              case 'C':
                $('#rd_c').prop('checked',true);
              break;  
              case 'D':
                $('#rd_d').prop('checked',true);
              break;  
           
            default:
            console.log('Invalid answer:', a['answer']);
              break;
           }
   
          }

      });
    }
  // Click lấy id của btn dc click--->truyền tới hàm
  // getbtnxem(trên)-->trong hàm getbtnxem(Dưới) sẽ lấy dc dữ liệu mình chọn
  function loadData(tk){
    $.ajax({
        url:'view.php',
        type:'get',
        data:{
          tk:tk,
          page : page
        },
        success:function(data){
          $('#questions').empty();// set tbody rong trc khi nap dulieu
            $('#questions').append(data);
           

        }
    })
  }
  // sự kiện enter cho nút tìm kiếm : key=13
  $('#txtSearch').on('keypress',function(e){
    if(e.which==13){
      $('#btnTK').click();
    }
  });
  $("#phantrang").on("click","li a",function(e){
    e.preventDefault();
    page=$(this).text();
    loadData($('#txtSearch').val());
  });

  //Phân trang
  function phantrang(tk){
    $.ajax({
        url: 'phantrang.php',
        type: 'get',
        data:{
            tk : tk
        },
        success:function(data){
            console.log(data);
            if(data<=1){
              $('#phantrang').hide();
              }else{
                $('#phantrang').show();
                $('#phantrang').empty();
                let pagi ='';
                for(let i=1;i<=data;i++){
                  pagi +='<li class="page-item" ><a class="page-link" href="#">'+i+'</a></li>';
                  
                }
                $('#phantrang').append(pagi);
              
            }
        }
      
    });
}
 
 </script>