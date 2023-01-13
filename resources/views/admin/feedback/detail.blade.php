@extends('admin.admin_layout')
@section('admin-content')
    <div style="margin-left: 50px;">
        <h2 style="text-transform: uppercase;">{{$content->contact_name}}</h2>
        <p><strong>{{$content->contact_phone}}</strong> {{'<'.$content->contact_mail.'>'}}</p>
        <p>{{$content->contact_message}}</p>
        <hr>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Reply
        </button>
        <input type="text" id="success" value="{{ (Session::has('success'))?(Session::get('success')):'false'}}" hidden>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{ url('/admin/feedback/reply') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="uname">Email:</label>
                                <input type="text" name="email" value="{{ $content->contact_mail }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Subject:</label>
                                <input type="text" value="Mail form Novatek" name="subject" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Message:</label>
                                <textarea name="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-section')
    <script>
        window.onload = function(){
            var a = document.getElementById('success').value;
            if(a != 'false'){
                alertify.success(a);
            }
        }
    </script>
@endsection