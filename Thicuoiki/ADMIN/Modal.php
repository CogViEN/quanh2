<div class="modal" tabindex="-1" role="dialog" id="mdlqs">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="xnSua">
        <div class="form-group">
            <textarea class="form-control" id="ex" rows="1" placeholder="Câu hỏi"></textarea>
        </div>
        <div class="form-group">           
            <textarea class="form-control" id="op_A" rows="1" placeholder="Đáp Án A"></textarea>
        </div>
        <div class="form-group">           
            <textarea class="form-control" id="op_B" rows="1" placeholder="Đáp Án B"></textarea>
        </div>
        <div class="form-group">           
            <textarea class="form-control" id="op_C" rows="1" placeholder="Đáp Án C"></textarea>
        </div>
        <div class="form-group">           
            <textarea class="form-control" id="op_D" rows="1" placeholder="Đáp Án D"></textarea>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3">
                        <label><input type="radio" id="rd_a" name="OP_rd" >Đáp án A</label>
                </div>
                <div class="col-sm-3">
                        <label><input type="radio" id="rd_b" name="OP_rd">Đáp án B</label>
                </div>
                <div class="col-sm-3">
                        <label><input type="radio" id="rd_c" name="OP_rd">Đáp án C</label>
                </div>
                <div class="col-sm-3">
                        <label><input type="radio" id="rd_d" name="OP_rd">Đáp án D</label>
                </div>
            </div>

        </div>
        

      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Xác Nhận" id="btn_xn"></input>
        <input type="submit" class="btn btn-secondary" data-dismiss="modal" value="Close"></input>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
     $('#btn_xn').click(function(){
        let question =$('#ex').val().trim(); // lấy giá trị của text ex gán cho biến question
        let option_a =$('#op_A').val().trim();
        let option_b =$('#op_B').val().trim();
        let option_c =$('#op_C').val().trim();
        let option_d =$('#op_D').val().trim();
        let answer = $('#rd_a').is(':checked')?'A':$('#rd_b').is(':checked')?'B':$
        ('#rd_c').is(':checked')?'C':$('#rd_d').is(':checked')?'D':'';// toán tử ba ngôi
        //console.log(question,option_a,option_b,option_c,option_d,answer);
        //Cho tất cả các ô phải có dữ liệu
        if(question.length ==0 || option_a==0 || option_b==0 || option_c==0 || option_d==0 ){
          alert('Vui lòng không để trống trường nào ');
          return ;
            }if(answer.length==0){
            alert(' Vui lòng chọn 1 đáp án ');
            return ;
        }
        let xnsua = $('#xnSua').val();// lấy giá trị của input xnSua gán cho nxsua
        if(xnsua.length==0){//thêm mới câu hỏi
        $.ajax({
          url : 'addquestion.php',type: "POST",
          data :{
            qs :question,//thuoc tinh: giatri phia tren
            op_a:option_a,
            op_b:option_b,
            op_c:option_c,
            op_d:option_d,
            answ:answer
          },
          success: function(data){
            alert(data);
            window.history.back();
            $('#ex').val('');
            $('#op_A').val('');
            $('#op_B').val('');
            $('#op_C').val('');
            $('#op_D').val('');
            //reset lại các radio mặc định bật lên ko chọn
            $('#rd_a').prop('checked',false);
            $('#rd_c').prop('checked',false);
            $('#rd_a').prop('checked',false);
            $('#rd_d').prop('checked',false);
            $('#btnTK').click();
          }
        });

     }else {// cập nhật câu hỏi
          $.ajax({
          url : 'update.php',type: "POST",
          data :{
            id:xnsua,
            qs :question,//thuoc tinh: giatri phia tren
            op_a:option_a,
            op_b:option_b,
            op_c:option_c,
            op_d:option_d,
            answ:answer
          },
          success: function(data){
            alert(data);
            window.history.back();
            $('mdlqs').modal('hide');//sau khi update aarn mdl
            $('#btnTK').click();
          }

        });

        }
     });
</script>
   