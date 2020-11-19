@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('信箱驗證') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('已重新發送驗證信件') }}
                        </div>
                    @endif
                    {{ __('已發送一封驗證信件到您的信箱，請至您的信箱收信，在信件中點擊驗證。') }}
                    <form class="text-center" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn link-btn px-3 counter-cnt" disabled>{{ __('重新寄送') }} <span id="counter-number">10</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    class counter{
        constructor(s){
            this.o = $(s);
            this.c = parseInt(this.o.text());
            this.id = 0;
            this.stop = null;
        }
        interval(f, t){
            var self = this
            this.id = setInterval( function(){
                f();
                self.stopper();
            }, t);
        }
        decrease(n){
            this.c -= n;
            this.o.text(this.c);
            console.log("dec");
        }
        stopper(){
            if (this.c == this.stop){
                clearInterval(this.id);
                this.after();
            } 
        }
        after(){
            // after stop ths interval
        }
    }
    var c = new counter("#counter-number");
    c.stop = 0;
    c.after = function(){
        this.o.remove();
        $('.counter-cnt').prop("disabled", false);
    }
    c.interval(function(){c.decrease(1)}, 1000);
</script>
@endsection
