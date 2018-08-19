<style type="text/css">
    
.formRight input{
        font-size: 12px;
    padding: 7px 6px;
    background: white;
    border: 1px solid #DDD;
    width: 100%;
    font-family: Arial, Helvetica, sans-serif;
    box-shadow: 0 0 0 2px #f4f4f4;
    -webkit-box-shadow: 0 0 0 2px #f4f4f4;
    -moz-box-shadow: 0 0 0 2px #f4f4f4;
    color: #656565;
}
.form input[type=text], .form input[type=password], .formRight textarea {
    font-size: 12px;
    padding: 7px 6px;
    background: white;
    border: 1px solid #DDD;
    width: 100%;
    font-family: Arial, Helvetica, sans-serif;
    box-shadow: 0 0 0 2px #f4f4f4;
    -webkit-box-shadow: 0 0 0 2px #f4f4f4;
    -moz-box-shadow: 0 0 0 2px #f4f4f4;
    color: #656565;
}

</style>

<?php
$mstt=get_stt('comment');
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <li><a href="index.php?com=product&act=add_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm Bình luận</span></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body">
                    <form name="frm" method="post" action="index.php?com=<?=$_GET['com']?>&act=save&type=<?=$type?>" enctype="multipart/form-data" class="form-horizontal">

                        <div class="formRow lang_hidden lang_vi active">
                            <label>Họ tên</label>
                            <div class="formRight">
                                <input type="text" name="" disabled="disabled" title="Nhập tên danh mục" class="tipS validate[required]" value="<?=@$item['hoten']?>"/>
                            </div>
                            <div class="clear"></div>
                        </div>


                        <div class="formRow lang_hidden lang_vi active">
                            <label>Email</label>
                            <div class="formRight">
                               <input type="text" name="" disabled="disabled" class="tipS validate[required]" value="<?=@$item['email']?>"/>
                            </div>
                            <div class="clear"></div>
                        </div>


                        <div class="formRow lang_hidden lang_vi active">
                            <label>Nội Dung</label>
                            <div class="formRight">
                                <textarea id="noidung_<?=$key?>" class="tipS" name="data[noidung_<?=$key?>]" class="form-control" id="ck<?=$i?>" rows="5"><?=@$item['noidung']?></textarea>

                            </div>
                            <div class="clear"></div>
                        </div>

            
                        <hr/>

                        <div class="control_frm" style="margin-top:25px;">
                            <div class="bc">
                                <ul id="breadcrumbs" class="breadcrumbs">
                                    <li><a href="index.php?com=product&act=add_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Trả lời</span></a></li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                        </div>

                        <div class="formRow lang_hidden lang_vi active">
                            <label>Họ tên</label>
                            <div class="formRight">
                                <input type="text" name="hoten" title="Nhập tên danh mục" class="tipS validate[required]" value="Admin"/>

                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow lang_hidden lang_vi active">
                            <label>Nội Dung</label>
                            <div class="ck_editor">
                                <textarea name="noidung" class="tipS" id="ckm<?=$i?>" rows="5"></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>


                
                        <div class="formRow lang_hidden lang_vi active">
                            <label>Hiển thị: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "></label>
                            <div class="formRight">
                                <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                        <input type="hidden" name="pid" id="pid" value="<?=@$item['id']?>" />
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <input type="submit" value="Cập nhật" class="btn btn-info" />
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</section>
