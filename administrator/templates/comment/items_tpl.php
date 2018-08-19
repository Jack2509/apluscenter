
        <div class="control_frm" style="margin-top:25px;">
          <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
             <li><a href="index.php?com=product&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Quản lý bình luận</span></a></li>
      
           </ul>
           <div class="clear"></div>
         </div>
       </div>

<div class="clear"></div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="min-width:150px;">Thông tin cá nhân</th>
                            <th style="min-width:150px;">Thông tin bình luận</th>
                            <th style="min-width:150px;">Thông tin khác</th>
                            <th style="width:30px; text-align:center;">Hiển thị</th>
                            <th style="width:30px;">Xóa</th>
                        </tr>
                        <?php for($i=0, $count=count($items); $i<$count; $i++){?>
                        <tr class="tt<?=$i%2?>">
                            <td>
                                <p>Họ tên: <strong><?=$items[$i]['hoten']?></strong></p>
                                <p>Email: <strong><?=$items[$i]['email']?></strong></p>
                            </td>
                            <td>
                                <?=$items[$i]['noidung']?>
                            </td>
                            <td>
                                <p>Trả lời (<?=count_comment($items[$i]['id'])?>)</p>
                                <p><a href="index.php?com=comment&act=edit&id=<?=$items[$i]['id']?>">Trả lời</a></p>
                                <p><a href="<?=$items[$i]['url']?>" target="_blank">Xem tin</a></p>
                            </td>
                            <td align="center">
                                 <a data-val2="table_<?=$_GET['com']?>" rel="<?=$items[$i]['hienthi']?>" data-val3="hienthi" class="diamondToggle <?=($items[$i]['hienthi']==1)?"diamondToggleOff":""?>" data-val0="<?=$items[$i]['id']?>" ></a>   
                            </td>
                            <td>
                                <a href="index.php?com=<?=$_GET['com']?>&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;">
                                    <img src="./images/icons/dark/close.png" alt="">
                                </a>
                            </td>
                        </tr>
                        <?php if(get_comment($items[$i]['id'])>0){ $re=get_comment($items[$i]['id']);?>
                        <?php for($j=0;$j<count($re); $j++){?>
                        <tr class="tt<?=$i%2?>">
                            <td>
                                <p>Họ tên: <strong><?=$re[$j]['hoten']?></strong></p>
                                <p>Email: <strong><?=$re[$j]['email']?></strong></p>
                            </td>
                            <td>
                                <p><?=$re[$j]['noidung']?></p>
                            </td>
                            <td>
                                
                            </td>
                            <td align="center">
                                 <a data-val2="table_<?=$_GET['com']?>" rel="<?=$re[$j]['hienthi']?>" data-val3="hienthi" class="diamondToggle <?=($re[$j]['hienthi']==1)?"diamondToggleOff":""?>" data-val0="<?=$re[$j]['id']?>" ></a>   
                            </td>
                            <td>
                                <a href="index.php?com=<?=$_GET['com']?>&act=delete&id=<?=$re[$j]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;">
                                   <img src="./images/icons/dark/close.png" alt="">
                                </a>
                            </td>
                        </tr>
                        <?php }?>
                        <?php }?>
                        <?php } ?>
                    </tbody>
                </table>
            </div><!-- /.box -->
            <div class="paging"><?=$paging['paging']?></div>
        </div>
    </div>
</section>

<style type="text/css">
    .tt0{}
    .tt1{}
</style>