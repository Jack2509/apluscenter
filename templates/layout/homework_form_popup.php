<section class="btn-show-homework-form quick-alo-green quick-alo-show btn btn-success" id="btn-show-homework-form">
    <a href="#">nộp bài tập</a>
</section>

<div id="exercise_modal" class="modal fadeIn display-none" style="display: block;">
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
                        <div class="col-sm-10"><input type="text" class="form-control" name="student_exercise_code" id="student_exercise_code" placeholder="Nhập mã bài tập"></div>
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

                <?php for ($i = 0; $i < 50; $i += 10) {?>
                <div class="modal-body">
                    <div class="row margin-left-50">
                        <div class="col-sm-6">
                            <? for ($j = $i + 1; $j <= $i + 5; $j++) {?>
                            <div class="row">
                                <span class="multiple-choice-label"><?php echo $j; ?>.</span>
                                <label class="radio-inline">A<input type="radio" name="multiple_choice_<?php echo $j; ?>" value="A"></label>
                                <label class="radio-inline">B<input type="radio" name="multiple_choice_<?php echo $j; ?>" value="B"></label>
                                <label class="radio-inline">C<input type="radio" name="multiple_choice_<?php echo $j; ?>" value="C"></label>
                                <label class="radio-inline">D<input type="radio" name="multiple_choice_<?php echo $j; ?>" value="D"></label>
                            </div>
                            <?php }?>
                        </div>
                        <div class="col-sm-6">
                            <? for ($j = $i + 6; $j <= $i + 10; $j++) {?>
                            <div class="row">
                                <span class="multiple-choice-label"><?php echo $j; ?>.</span>
                                <label class="radio-inline">A<input type="radio" name="multiple_choice_<?php echo $j; ?>" value="A"></label>
                                <label class="radio-inline">B<input type="radio" name="multiple_choice_<?php echo $j; ?>" value="B"></label>
                                <label class="radio-inline">C<input type="radio" name="multiple_choice_<?php echo $j; ?>" value="C"></label>
                                <label class="radio-inline">D<input type="radio" name="multiple_choice_<?php echo $j; ?>" value="D"></label>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <?php }?>

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
        height: 200px;
        width: 113px;
        height: 36px;
        cursor: pointer;
        z-index: 200000 !important;
        top: 66%;
        left: 55px !important;
    }
    .btn-show-homework-form a {
        color: #fff;
        text-decoration: none;
        text-transform: uppercase;
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
    .form-check-inline {
        display: inline-block;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        padding-left: 0;
        margin-right: .75rem;
    }
    .form-check {
        position: relative;
        display: block;
        padding-left: 1.25rem;
    }
    *, ::after, ::before {
        box-sizing: border-box;
    }
    .form-check-inline .form-check-input {
        position: static;
        margin-top: 0;
        margin-right: .3125rem;
        margin-left: 0;
    }
    input[type=checkbox], input[type=radio] {
        box-sizing: border-box;
        padding: 0;
    }
    .form-check-input {
        position: absolute;
        margin-top: .3rem;
        margin-left: -1.25rem;
    }
    .form-check-label {
        margin-bottom: 0;
    }
    label {
        display: inline-block;
        margin-bottom: .5rem;
    }

    .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
        position: absolute;
        margin-left: 4px !important;
        margin-top: 2px !important;
    }
    .multiple-choice-label {
        font-weight: bold;
    }
    .row.margin-left-50 {
        margin-left: 50px;
    }
    .row .radio-inline {
        margin-bottom: 10px !important;
    }
    .display-none {
        display: none !important;
    }
</style>
<script>
    $(document).ready(function () {
        var $btnShowHomeWork = $('#btn-show-homework-form'),
            $homeworkForm = $('form#exercise_form');

        $homeworkForm.on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);


            // Add studentFiles to formData
            if (typeof window.studentFiles !== 'undefined' && window.studentFiles.length) {
                var countFiles = window.studentFiles.length;
                for (var i = 0; i < countFiles; i++) {
                    formData.append('file_' + i, window.studentFiles[i]);
                }
                // Add number of file to uploaded
                    formData.append('number_uploaded_file', countFiles);
            }

            // Validate file extensions
            var isValidate = true,
                messageError = '';

            for (var pair of formData.entries()) {
                var key = pair[0],
                    value = pair[1];

                if (key.indexOf('file_') !== -1) {
                    // If file size is more than 50 MB
                    if (value['size'] > 50*1048576) {
                        messageError = 'File size is too large. Only accept file size less than 50MB';
                        isValidate = false;

                    }

                    if (!hasExtension(value['name'].split('.').pop(), ['jpg', 'png', 'gif', 'jpeg', 'docx', 'pdf', 'txt'])) {
                        messageError = '\nChỉ nộp file ảnh, file pdf, file văn bản';
                        isValidate = false;
                    }
                }
            }

            if (isValidate) {
                $.ajax({
                    url: 'ajax/send_student_homework.php',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success:function(data){
                        if (data[0] == 'sent') {
                            console.log('send ok');
                            // reset all input form
                            document.getElementById('exercise_form').reset();
                            // delete all displaying file tags
                            $('.container-list-files').html('');
                            // notification uploading file succesfully
                            alert('Đã gửi bài thành công');
                            $('#exercise_modal').toggleClass('display-none');
                        } else {
                            alert('Đã có lỗi gửi bài tập, vui lòng thử lại');
                        }
                    }
                });
            } else {
                alert(messageError);
            }
        });

        $btnShowHomeWork.on('click', function (event) {
            event.preventDefault();
            $('#exercise_modal').toggleClass('display-none');
        });

        $('button.close').on('click', function(event) {
            event.preventDefault();
            $('#exercise_modal').addClass('display-none');
        })


    });

    function showFiles($fileInput) {
        // Show file list to popup
        var $containerFiles = $('.container-list-files');

        // reset previous file tags;
        $containerFiles.html('');
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
    }

    function hasExtension(fileName, extensions) {
        return (new RegExp('(' + extensions.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
    }

</script>