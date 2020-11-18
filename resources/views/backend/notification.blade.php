@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-3">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div>
                            <div class="card-title">
                                    <div class="col-9"><h5>通知 <span class="badge badge-pill badge-warning">{{ $user->notifications->count() }}</span></h5></div>
                                <div class="row">
                                </div>
                            </div>
                            <div>
                                <table id="notification-table" class="table table-hover">
                                    <tbody>
                                    @forelse($user->notifications as $notification)
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
                    <li class="list-group-item link-btn-full text-center mt-auto" onclick="notificationReadAll()">全部清除</li>
                </ul>
            </div>
        </div>    
        </div>

    </div>
</div>
<script>
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
