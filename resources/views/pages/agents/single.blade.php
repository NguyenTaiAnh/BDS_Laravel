@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col s12 m8">

                    <div class="card horizontal card-no-shadow m-b-60">
                        <div class="card-image agent-image">
                            <img src="{{Storage::url('users/'.$agent->image)}}" alt="{{ $agent->username }}" class="imgresponsive">
                        </div>
                        <div class="card-stacked p-l-15">
                            <div class="">
                                <h5 class="">{{ $agent->name }}</h5>
                                <strong>{{ $agent->email }}</strong>
                            </div>
                            <div class="">
                                <p>{{ $agent->about }}</p>
                            </div>
                        </div>
                    </div>

                    <h5 class="uppercase">Danh sách bất động sản của {{ $agent->name }}</h5>

                    {{-- AGENT PROPERTIES --}}
                    @foreach($properties as $property)

                        <div class="card horizontal card-no-shadow border1">
                            <div class="card-image horizontal-bg-image">
                                <span class="card-image-bg" style="background-image:url({{Storage::url('property/'.$property->image)}});"></span>
                            </div>
                            <div class="card-stacked">
                                <div class="p-20 property-content">
                                    <span class="card-title search-title" title="{{$property->title}}">
                                        <a href="{{ route('property.show',$property->slug) }}">{{ str_limit($property->title,25) }}</a>
                                    </span>
                                    <h5>
                                        {{ number_format($property->price) }}₫
                                        <small class="right p-r-10">{{ $property->type }} for {{ $property->purpose }}</small>
                                    </h5>
                                </div>

                                <div class="card-action property-action">
                                    <span class="btn-flat">
                                        <i class="material-icons">check_box</i>
                                        Phòng ngủ: <strong>{{ $property->bedroom}}</strong>
                                    </span>
                                    <span class="btn-flat">
                                        <i class="material-icons">check_box</i>
                                        Phòng tắm: <strong>{{ $property->bathroom}}</strong>
                                    </span>
                                    <span class="btn-flat">
                                        <i class="material-icons">check_box</i>
                                        Diện tích: <strong>{{ $property->area}}</strong> m <sup>2</sup>
                                    </span>
                                    
                                    @if($property->featured == 1)
                                        <span class="right featured-stars">
                                            <i class="material-icons">stars</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endforeach

                    <div class="m-t-30 m-b-60 center">
                        {{ $properties->links() }}
                    </div>

                </div>

                <div class="col s12 m4">
                    <div class="clearfix">

                        <div>
                            <ul class="collection with-header m-t-0">
                                <li class="collection-header grey lighten-4">
                                    <h5 class="m-0">Liên hệ với người quản lý</h5>
                                </li>
                                <li class="collection agent-message">
                                    <form class="agent-message-box" action="" method="POST">
                                        @csrf
                                        <input type="hidden" name="agent_id" value="{{ $agent->id }}">
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                            
                                        <div class="box">
                                            <input type="text" name="name" placeholder="Tên của bạn">
                                        </div>
                                        <div class="box">
                                            <input type="email" name="email" placeholder="Email của bạn">
                                        </div>
                                        <div class="box">
                                            <input type="number" name="phone" placeholder="Số điện thoại của bạn">
                                        </div>
                                        <div class="box">
                                            <textarea name="message" placeholder="Tin nhắn của bạn"></textarea>
                                        </div>
                                        <div class="box">
                                            <button id="msgsubmitbtn" class="btn waves-effect waves-light w100 indigo" type="submit">
                                                GỬI
                                                <i class="material-icons left">send</i>
                                            </button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('scripts')
    <script>
        $(function(){
            $(document).on('submit','.agent-message-box',function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = "{{ route('property.message') }}";
                var btn = $('#msgsubmitbtn');

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    beforeSend: function() {
                        $(btn).addClass('disabled');
                        $(btn).empty().append('LOADING...<i class="material-icons left">rotate_right</i>');
                    },
                    success: function(data) {
                        if (data.message) {
                            M.toast({html: data.message, classes:'green darken-4'})
                        }
                    },
                    error: function(xhr) {
                        M.toast({html: xhr.statusText, classes: 'red darken-4'})
                    },
                    complete: function() {
                        $('form.agent-message-box')[0].reset();
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('SEND<i class="material-icons left">send</i>');
                    },
                    dataType: 'json'
                });

            })
        })
    </script>
@endsection