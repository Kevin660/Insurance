<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS only -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100&display=swap" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/storage/icofont/icofont.min.css">
    <script src="/js/main.js"></script>
    <script>
    function sendNotice(id){
        $("#sendNotice").modal('hide');
        $.ajax({
            'url': '/sales/sendNotice/' + id,
            'method': 'post',
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(e){
                if (e == true){
                    $("#msg #msg-text").text("信件已送出!");
                    $("#msg #msg-text").addClass('alert alert-success');
                }
            },
            error: function(){
                $("#msg #msg-text").text("發生錯誤!");
                $("#msg #msg-text").addClass('alert alert-danger');
            },
            complete: function(){
                $("#msg").modal('show');
            }
            
        });
    }
    </script>
</head>

<body>
    <header id="header" class="">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11 d-flex align-items-center">

                    <h1 class="logo mr-auto"><a href="/">保險媒合平台</a></h1>


                    <nav class="nav-menu d-none d-lg-block">
                        <ul>
                            <li class="active"><a href="index.html">風險分析</a></li>
                            <li><a href="#about">找業務員</a></li>
                            <li><a href="#services">車禍處理專區</a></li>
                            <li><a href="#portfolio">討論區</a></li>
                            <li><a href="#team">登入</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </header>

    <div class="modal fade" id="sendNotice" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">諮詢</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <small class="text-danger">請謹慎閱讀以下內容</small>
                <div>我們將會通知業務員，業務員將會主動向您聯繫，並且您的個人資料將會被寄送給該位業務員，這些資料包括您的地址、電話等等。</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-success" onclick="sendNotice({{ $sale->id }})">同意送出</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="msg" tabindex="-1"  aria-hidden="true" data-dismiss="modal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div id="msg-text"></div>
        </div>
    </div>
<div class="container">
<div class="row">
        
       <!-- 一張名片 -->
            <div class="col-md-4 p2 mt-2">
                <div class="box-content">
                    <div>
                        <img src="/storage/img/user/{{ $sale->img }}" alt="" class="img-fluid d-block m-auto w-50">
                    </div>
                    <div class="mt-2 mb-2 text-center">
                        <div style='display:table; margin:auto; width: 120px; height: 30px;'>
                            <span class="bg-dark text-light" style="display: table-cell; vertical-align: middle; font-size: 16px; border-right: 6px dashed #fff;">評分</span>
                            <span class="bg-success text-light" style="display: table-cell; vertical-align: middle; font-size: 24px;">{{ $sale->score }}</span>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                        @foreach($sale->certifications as $certification)
                            <div>
                                <img src="/storage/img/badge/badge{{ $certification->certificationType->type }}.png" alt="" title="{{ $certification->certificationType->name }}">
                            </div>
                        @endforeach
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col-md-6 p2 mt-2">
                <div class="mt-1 mb-1">
                    <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">公司</div>
                    <div style="text-indent: 2em;">{{ $sale->company }}</div>
                </div>
                <div class="mt-1 mb-1">
                    <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">姓名</div>
                    <div style="text-indent: 2em;">{{ $sale->chinese_name }}</div>
                </div>
                <div class="mt-1 mb-1">
                    <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">性別</div>
                    <div style="text-indent: 2em;">{{ $sale->gender == 1 ? '男' : '女' }}</div>
                </div>
                <div class="mt-1 mb-1">
                    <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">服務地區</div>
                    <div class="text-success" style="text-indent: 2em;">{{ $sale->serve_area }}</div>
                </div>
                <div class="mt-1 mb-1">
                    <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">服務年資</div>
                    <div style="text-indent: 2em; ">{{ $sale->serve_experience }}年</div>
                </div>
                <div class="mt-1 mb-1">
                    <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">個人介紹</div>
                    <div style="text-indent: 2em; ">{{ $sale->introduction }}年</div>
                </div>
                <div class="mt-3">
                    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#sendNotice">立即諮詢</button>
                </div>
            </div>
        </div>
    </div>
</div>

        

    <footer class="border-top pt-3 mt-3">

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-4">
                    <h3 class="logo">保險媒合平台</h3>
                </div>
                <div class="col-12 col-lg-3 col-md-4 my-3 my-md-0 footer-links d-flex align-items-center">
                    <ul>
                        <li><i class="ion-ios-arrow-right"></i> <a href="#">風險分析</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="#">找業務員</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="#">車禍處理專區</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="#">討論區</a></li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3 col-md-4 footer-contact ">
                    <p>
                        <strong>聯絡我們</strong>
                    </p>
                    <p>
                        0800-000-000 <br>
                        support@mail.com
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row d-flex justify-content-center copyright">
                <span>MIS department©2020</span>
            </div>
        </div>

    </footer>

    

</body>

</html>