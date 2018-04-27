@extends('layouts.app')

@section('content')
    {{--@include('flash::message')--}}
    <h1 class="text-center well">
        <small>{{ ucfirst(Auth()->user()->name) }} Birthdays' list...</small>
    </h1>

    @if ($birthday_list)
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="table-responsive">
                    <!-- CURRENT MONTH:{{ $month }} -->
                    {{--<table class="table table-striped table-hover table-condensed table-60">--}}
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Birthday</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @foreach($birthday_list as $one)--}}
                        @foreach($birthday_list as $index => $one)
                            @php
                                $moday = Carbon\Carbon::parse($one->date);
                                $mon = $moday->month;
                                $day = $moday->day;

                                //echo $birthday_list[$index]['date'];
                                if(array_key_exists($index + 1, $birthday_list)) {
                                    echo "<tr>";
                                    echo "<td>Next birthday = " . $birthday_list[$index + 1] . "</td>";
                                    echo "</tr>";
                                }
                            @endphp
                            <!-- Change background if current month is equal to the current birthday's month -->
                            <tr class={{ $month == Carbon\Carbon::parse($one->date)->format('m') ? "success" : "" }}>
                                <td>{{ $one->id }}</td>
                                <td>{{ $one->name }}</td>
                                <td>{{ $one->email }}</td>
                                <td>{{ $one->date_formatted }}</td>
                                <td class="td-right">
                                    <div class="btn-group pull-right" role="group">
                                        <a href="/birthday/{{$one->id}}/edit"
                                           class="btn btn-primary btn-sm">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm open-modal"
                                                data-toggle="modal"
                                                data-id="{{ $one->id }}"
                                                data-name="{{ $one->name }}"
                                                data-target="#confirmDelete">Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="confirmDelete" role="dialog">
            <div class="modal-dialog modal-dialog-delete">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Are you sure to delete birthday of "<span id="name"></span>" ?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE"/>
                            <button type="submit" class="btn btn-danger">Confirm</button>
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <hr>

    <div class="row text-center">
        <a href="{{ route('birthday.create') }}" class="btn btn-primary">Add a new Birthday?</a>
    </div>
@endsection

@section('script')
    <script>
        // $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        $('button.open-modal').on('click', function (e) {
            // Make sure the click of the button doesn't perform any action
            e.preventDefault();

            // Get the modal by ID
            var modal = $('#confirmDelete');

            // Set the value of the input fields
            // Note that $(this) is the button, since you perform the click event on that element.
            // modal.find('#name').val($(this).data('name'));
            $('.modal-body #name').html($(this).data('name'));

            // Update the action of the form
            modal.find('form').attr('action', 'birthday/' + $(this).data('id'));
        });
    </script>
@endsection
