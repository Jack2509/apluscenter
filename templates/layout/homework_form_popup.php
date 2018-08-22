<section class="btn-show-homework-form quick-alo-green quick-alo-show" id="btn-show-homework-form">
    <a href="#">nộp bài tập</a>
</section>

<div id="myModal" class="modal fadeIn" style="display: block;">
    <form action="/" method="post" id="exercise_form" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content homework-form-popup">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Nộp bài tập</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="student_name" class="col-sm-2">Họ và tên</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="student_name" id="student_name" placeholder="Nhập họ và tên"></div>
                    </div>
                    <div class="form-group">
                        <label for="student_email" class="col-sm-2">Email</label>
                        <div class="col-sm-10"><input type="email" class="form-control" name="student_email" id="student_email" placeholder="Nhập email"></div>
                    </div>
                    <div class="form-group">
                        <label for="student_exercise_code" class="col-sm-2">Mã bài tập</label>
                        <div class="col-sm-10"><input type="email" class="form-control" name="student_exercise_code" id="student_exercise_code" placeholder="Nhập mã bài tập"></div>
                    </div>
                    <!--                <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>-->
                </div>

                <div class="modal-header">
                    <h4 class="modal-title">Phần tự luận</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="container-list-files"></div>
                        <label class="btn btn-default btn-file">Nộp bài tự luận<input type="file" name="student_upload_file" multiple onchange="showFiles(this)" style="display: none;"></label>
                    </div>
                </div>

                <div class="modal-header">
                    <h4 class="modal-title">Phần trắc nghiệm</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="student_name" class="col-sm-2">Họ và tên</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="student_name" id="student_name" placeholder="Nhập họ và tên"></div>
                    </div>
                </div>



                <div class="modal-footer">
                    <button type="submit" id="submit_form" class="btn btn-primary">Gửi</button>
                </div>
            </div>
        </div>
    </form>
</div>

<style type="text/css" media="screen">
    .btn-show-homework-form.quick-alo-show {
        visibility: visible;
    }

    .container-list-files {
        padding: 10px 20px;
    }

    .btn-show-homework-form {
        position: fixed;
        visibility: hidden;
        background-color: transparent;
        height: 200px;
        width: 82px;
        height: 64px;
        cursor: pointer;
        z-index: 200000 !important;
        right: 100px;
        top: 50%;
        left: 10px !important;
    }

    .modal-body .form-group:after {
        content: "";
        display: table;
        clear: both;
    }

    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    .file-info {
        display: block;
        padding: .2em .6em .3em;
        font-size: 100%;
        font-weight: 700;
        line-height: 1;
        color: #2F7FDA;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em;
        margin: 12px 0;
        background-color: #c5c8cc;
        position: relative;
    }

    .file-info span {
        font-weight: 300;
        font-family: Arial, sans-serif;
        border: 1px solid #c5c8cc;
        border-radius: 10px;
        padding: 2px 5px;
        position: absolute;
        right: -10px;
        top: -10px;
        cursor: pointer;
        background-color: #fff;
    }
    .file-info span:hover {
        color: #fff;
        background-color: #c5c8cc;
    }
    .modal-content.homework-form-popup {
        overflow-y: scroll;
        max-height: 600px;
    }

</style>
<script>
    $(document).ready(function () {
        var $btnShowHomeWork = $('#btn-show-homework-form'),
            $homeworkForm = $('form#exercise_form');


        $homeworkForm.on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);


            $.ajax({
                url: 'ajax/send_student_homework.php',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success:function(data){
                    console.log(data);
                }
            });
        });

        $btnShowHomeWork.on('click', function (event) {
            event.preventDefault();
            alert('1234');
        });


    });

    
    function showFiles($fileInput) {
        // Show file list to popup
        var $containerFiles = $('.container-list-files');

        // make studentFiles array of data
        window.studentFiles = [];
        Array.prototype.push.apply(window.studentFiles, $fileInput.files);

        // show Files to list
        for (var i = 0; i < $fileInput.files.length; i++) {
            $containerFiles.append('<p class="file-info">'+ $fileInput.files[i].name+ '<span onclick="removeFile(this)" data-index-file="'+ i +'">x</span></p>');
        }
        // empty file input
        $($fileInput).val("");
    }

    function removeFile(removeBtn) {
        var $removeBtn = $(removeBtn),
            indexFile = $removeBtn.data('indexFile');

        // remove from frontend studentFiles
        $removeBtn.parent('p.file-info').remove();
        // remove file from studentFiles
        delete window.studentFiles.splice(indexFile, 1);

        // update index studentFiles
        $('p.file-info span').each(function (index, element) {
            $(element).data('indexFile', index);
        });


        console.log(window.studentFiles);
    }

</script>