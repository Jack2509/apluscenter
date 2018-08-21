<section class="btn-show-homework-form quick-alo-green quick-alo-show" id="btn-show-homework-form">
    <a href="#">nộp bài tập</a>
</section>
<style type="text/css" media="screen">
    /*phone*/
    .btn-show-homework-form.quick-alo-show {
        visibility: visible;
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

</style>
<script>
    $(document).ready(function () {
        var $btnShowHomeWork = $('#btn-show-homework-form');
        $btnShowHomeWork.on('click', function (event) {
            event.preventDefault();
            alert(1234);
        });
    });
</script>