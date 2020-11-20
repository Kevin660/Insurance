@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-6 my-3">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div>
                            <h5 class="card-title">個人資料</h5>
                            <div class="card-text my-3">
                                <div>姓名</div>
                                <div>{{ $user->chinese_name }}</div>
                            </div>
                            <div class="card-text my-3">
                                <h5>信箱</h5>
                                <div>{{ $user->email }} 
                                @if($user->email_verified_at)
                                    <span class="badge badge-primary">已驗證</span>
                                @else
                                    <a href="/email/verify" class="badge badge-danger">驗證信箱</a>
                                @endif
                            </div>
                            <div class="card-text my-3">
                                <h5>地址</h5>
                                <div>{{ $user->address}}</div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item link-btn-full text-center mt-auto" onclick="location.href='/user'">查看更多</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div>
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-9"><h5>通知 <span class="badge badge-pill badge-warning">{{ $user->notifications->count() }}</span></h5></div>
                                    <div class="col-3"><button class="btn btn-primary" onclick="notificationReadAll()">全部清除</button></div>
                                </div>
                    
                            </div>
                            <div>
                                <table class="table table-hover">
                                    <tbody>
                                    @forelse($user->notifications->take(3) as $notification)
                                        <tr style="cursor: pointer;"
                                            onclick="notificationRead(this, {{ $notification->id }})">
                                            <th class="sortable-1" scope="row">
                                                <div style="position: relative">
                                                    <div class="d-flex bd-highlight mb-3">
                                                        <div class="pr-2">{{ Str::limit($notification->type, 20, "...") }}</div>
                                                        <div>{{ Str::limit($notification->content, 40, "...") }}</div>
                                                        <div class="ml-auto"><small >{{ $notification->created_at }}</small></div>
                                                    </div>
                                                </div>
                                            </th>
                                            <!-- <td title="{{ $notification->type }}">{{ Str::limit($notification->type, 20, "...") }}</td>
                                            <td title="{{ $notification->content }}">{{ Str::limit($notification->content, 40, "...") }}</td> -->
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">尚無資料</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item link-btn-full text-center mt-auto" onclick="location.href='/notifications/index'">查看更多</li>
                </ul>
            </div>
        </div>    
        <div class="col-md-6 my-3">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div>
                            <h5 class="card-title">最近媒合紀錄</h5>
                            <div class="card-text my-3 row" style="height: 300px">
                                @if($user->expertRecord)
                                <div class="col-6 text-center">
                                    <a href="/sales/{{ $user->expertRecord->sale->id }}">
                                        <img src="/storage/img/user/{{ $user->expertRecord->sale->img }}" style="max-height: 200px"/>
                                    </a>
                                    <div class="mt-2 mb-2">
                                        <div style='display:table; margin:auto; width: 120px; height: 30px;'>
                                            <span class="bg-dark text-light" style="display: table-cell; vertical-align: middle; font-size: 16px; border-right: 6px dashed #fff;">評分</span>
                                            <span class="bg-success text-light" style="display: table-cell; vertical-align: middle; font-size: 24px;">{{ $user->expertRecord->sale->score }}</span>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="row justify-content-center">
                                        @foreach($user->expertRecord->sale->certifications as $certification)
                                            <div>
                                                <img src="/storage/img/badge/badge{{ $certification->certificationType->type }}.png" alt="" title="{{ $certification->certificationType->name }}">
                                            </div>
                                        @endforeach
                                        </div>  
                                    </div>
                                </div>
                                <div class="col-6">
                                
                                    <div class="mt-1 mb-1">
                                        <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">公司</div>
                                        <div style="text-indent: 2em;">{{ $user->expertRecord->sale->company }}</div>
                                    </div>
                                    <div class="mt-1 mb-1">
                                        <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">姓名</div>
                                        <div style="text-indent: 2em;">{{ $user->expertRecord->sale->chinese_name }}</div>
                                    </div>
                                    <div class="mt-1 mb-1">
                                        <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">服務年資</div>
                                        <div style="text-indent: 2em; ">{{ $user->expertRecord->sale->serve_experience }}年</div>
                                    </div>
                                    <div class="mt-1 mb-1">
                                        <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">諮詢時間</div>
                                        <div style="text-indent: 2em; ">{{ $user->expertRecord->created_at }}</div>
                                    </div>
                                    <div style="position: absolute; bottom: 0; width: 85%;">
                                        <a class="btn btn-primary btn-block" href="/sales/{{ $user->expertRecord->sale->id }}">個人資料</a>
                                    </div>
                                </div>                                    
                                @endif
                            </div>
                            
                        </div>
                    </li>
                    <li class="list-group-item link-btn-full text-center mt-auto" onclick="location.href='/expertRecord'">查看更多</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><h5 class="card-title">快速前往</h5></li>
                    <li class="list-group-item link-btn-full" onclick="location.href='/'">首頁</li>
                    <li class="list-group-item link-btn-full" onclick="location.href='/'">討論區</li>
                    <li class="list-group-item link-btn-full" onclick="location.href='/'">風險分析</li>
                    <li class="list-group-item link-btn-full" onclick="location.href='/sales/1'">找業務員</li>
                    <li class="list-group-item link-btn-full" onclick="location.href='/sales/2'">車禍處理專區</li>
                </ul>
            </div>
        </div>
        <div class="col-md-12 my-3">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div>
                            <div class="row">
                                <div class="col-9 card-title"><h5>我的發問  <span class="badge badge-pill badge-warning">{{ $user->questions->count() }}</span></h5></div>
                                <div class="col-3 text-right">
                                    <select class="custom-select" onchange='sortTrigger(this);'>
                                        <option value="1">時間小到大</option>
                                        <option value="2" selected>時間大到小</option>
                                        <option value="3">觀看數小到大</option>
                                        <option value="4">觀看數大到小</option>
                                        <option value="5">回答數小到大</option>
                                        <option value="6">回答數大到小</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <table class="table table-hover" id="sortable-table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">發問時間</th>
                                            <th scope="col">標題</th>
                                            <th scope="col">內容</th>
                                            <th scope="col">觀看數</th>
                                            <th scope="col">回答數</th>
                                            <th scope="col">狀態</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->questions->take(5) as $question)
                                        <tr style="cursor: pointer;" class="{{ $question->answer ? 'table-success': ''}}" data-toggle="modal" data-target="#popupModal-{{ $question->id }}">
                                        <!-- onclick="location.href='/questions/{{ $question->id }}';" -->
                                            <th class="sortable-1" scope="row">{{ $question->created_at }}</th>
                                            <td title="{{ $question->title }}">{{ Str::limit($question->title, 20, "...") }}</td>
                                            <td title="{{ $question->content }}">{{ Str::limit($question->content, 40, "...") }}</td>
                                            <td class="sortable-2">{{ $question->viewCount }}</td>
                                            <td class="sortable-3">{{ $question->answers->count() }}</td>
                                            <td class="sortable-4">{{ $question->answer ? '已解決': '未解決'}}</td>
                                        </tr>
                                        <div class="modal fade" id="popupModal-{{ $question->id }}" tabindex="-1"  aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">{{ Str::limit($question->title, 60, "...") }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $question->content }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                                    <button type="button" class="btn btn-danger" onclick="questionDelete({{$question->id}})">刪除</button>
                                                    <button type="button" class="btn btn-primary" onclick="location.href='/questions/{{ $question->id }}/edit';">編輯</button>
                                                    <button type="button" class="btn btn-success" onclick="location.href='/questions/{{ $question->id }}';">前往</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </li>
                        <li class="list-group-item link-btn-full text-center mt-auto" onclick="location.href='/'">查看更多</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    function sort(table, selector, type, asc){
        var tr = $(table + " tr:gt(0)");
        tr.sort(function(a,b){
            var k = asc ? 1 : -1;
            var f = function(){return 0;};
            [a,b] = [$(a).find(selector).text(), $(b).find(selector).text()];
            switch(type){
                case "date":
                    f = function (a,b){
                        return (new Date(a).getTime() - new Date(b).getTime()) * k;
                    }
                    break;
                case "int":
                    f = function (a,b){
                        return (parseInt(a) - parseInt(b)) * k;
                    }
                    break;
            }
            return f(a,b);
        }).appendTo(tr.get(0).parentElement);
    }
    function sortTrigger(t){
        var table_selector = "#sortable-table";
        var sortable = 0;
        var type = "";
        var asc = true;
        switch(t.value){
            case "1":
                [sortable, type, asc] = ["1", "date", true];
                break;
            case "2":
                [sortable, type, asc] = ["1", "date", false];
                break;
            case "3":
                [sortable, type, asc] = ["2", "int", true];
                break;
            case "4":
                [sortable, type, asc] = ["2", "int", false];
                break;
            case "5":
                [sortable, type, asc] = ["3", "int", true];
                break;
            case "6":
                [sortable, type, asc] = ["3", "int", false];
                break;
        }
        sort(table_selector, ".sortable-" + sortable, type, asc);
    }

    function questionDelete(id){
        if (!confirm('確定刪除?')) return false;
        $.ajax({
            'url': '/questions/' + id,
            'method': 'post',
            'data':{
                '_method': 'delete',
            },
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function(){
                alert('刪除成功');
            },
            error: function(){
                alert('發生錯誤');
            },
            complete: function(){
                location.reload();
            }
            
        });
    }

    function notificationRead(t, id){
        const form = document.createElement('form');
        form.method = 'post';
        form.action = '/notifications/' + id;
        // csrf
        const hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = "_token";
        hiddenField.value = $('meta[name="csrf-token"]').attr('content');
        form.appendChild(hiddenField);
        //submit
        document.body.appendChild(form);
        form.submit();
        $(t).remove();
    }
    function notificationReadAll(){
        $.ajax({
            'url': '/notifications/readAll',
            'method': 'post',
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function(){
                alert('清除成功');
            },
            error: function(){
                alert('發生錯誤');
            },
            complete: function(){
                location.reload();
            }
            
        });
    }
</script>
@endsection
