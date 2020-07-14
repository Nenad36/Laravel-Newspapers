@extends('admin.layout.master')
@section('content')

    <script>
        jQuery(document).ready(function() {
            jQuery(".myselect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">{{ $page_name }}</strong>
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">

                            {{--<div class="card-title">--}}
                            {{--<h3 class="text-center">Permission Create Page</h3>--}}
                            {{--</div>--}}

                            @if(count($errors) > 0)
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li> {{ $error }} </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <hr>

                            {!! Form::model($author,['route' => ['author-update',$author->id],'method'=>'put']) !!}

                            <div class="form-group">
                                {{ Form::label('name', 'Name', ['class' => 'control-label mb-1']) }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('email', 'Email', ['class' => 'control-label mb-1']) }}
                                {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('password', 'Password', array('class' => 'control-label mb-1')) }}
                                {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('role', 'Roles', ['class' => 'control-label mb-1']) }}
                                {{ Form::select('roles[]',$roles,$selectedRoles,['class'=>'myselect','data-placeholder'=>'Select role(s)', 'multiple']) }}
                            </div>

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Update</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div> <!-- .card -->
        </div>
    </div>

@endsection