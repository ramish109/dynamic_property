@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
 
            <div class="row">
                <div class="col-md-12">
                    <div class="act-title">
                    <h5>Chat with <strong>{{$username}}</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
   
                            <div id="chatting"  style="overflow-x:hidden;overflow-y:scroll; height:61vh" >
                                <div id="loader" class="text-center p-3">Messages are loading ..... </div>
                            </div>
                            <input type="hidden" name="sender_id" id="sender_id" value="{{$sender_id}}">
                            <input type="hidden" name="reciever_id" id="reciever_id" value="{{$reciever_id}}">
                            
                            <input type="text" name="message" placeholder="Reply to user" class="form-control mb-2"  id="message-input" required>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm" id="send-button">Reply Message</button>
                            <a href="{{route('chat.index')}}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')

    <script>
        // JavaScript code using jQuery
        $(document).ready(function() {
            $('#send-button').click(function() {

                var sender_id = $('input[name="sender_id"]').val();
                var reciever_id = $('input[name="reciever_id"]').val();
                var message = $('#message-input').val();
                var chattingurl = "{{ route('chat.create') }}";

                $.ajax({
                    method: 'POST',
                    url: chattingurl,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        message: message,
                        chat: sender_id,
                        reciever_id:reciever_id,
                    },
                    dataType: 'json',
                    complete: function() {
                        $('#message-input').val('');
                    },
                    success: function(response) {
                        $('#message-input').val('2323');
                        console.log(response);
                    }
                });
            });
        });
    </script>

    <script>
          // send message on enter key press
        $('#message-input').keypress(function(event) {

            var sender_id = $('input[name="sender_id"]').val();
            var reciever_id = $('input[name="reciever_id"]').val();
            var message = $('#message-input').val();

            var chattingurl = "{{ route('chat.create') }}";
            
            // check if enter key is pressed
            if (event.keyCode === 13 && message !== null && message !== undefined) {

                $.ajax({
                    method: 'POST',
                    url: chattingurl,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        message: message,
                        chat: sender_id,
                        reciever_id:reciever_id,
                    },
                    dataType: 'json',
                    complete: function() {
                        $('#message-input').val('');
                    },
                    success: function(response) {

                    }
                });

            }
        });
    </script>

    <script>
    $(document).ready(function() {

        var sender_id = $('input[name="sender_id"]').val();
        var reciever_id = $('input[name="reciever_id"]').val();
        var ajaxUrl = "{{ url('/get-chat') }}";
        $('#chatting').hide();
        var intervalId = setInterval(function() {
            
            $.ajax({
                type: 'GET',
                url: ajaxUrl,
                dataType: 'json',
                data: {
                    chat: sender_id,
                    reciever_id: reciever_id,
                },
                beforeSend: function() {
                    $('#loader').show();

                },
                success: function(response) {
                    console.log(response);
                    $('#chatting').empty();
                    $('#loader').hide();

                    $.each(response, function(index, item) {
                        var newItem =item;
                        $('#chatting').append(newItem);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }, 5000); // Refresh every 5 seconds 
        $('#chatting').show();
    });
    </script>
@endpush
@endsection
