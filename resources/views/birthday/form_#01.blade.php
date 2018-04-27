{{--<div class="row">--}}
    <div class="col-md-6 col-md-offset-3">
        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
        </div>

        <div class="col-md-12">
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-1 control-label" for="date">Date:</label>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="day" id="day" placeholder="DD">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="month" id="month" placeholder="MM">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" name="year" id="year" placeholder="YYYY">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 text-center">
        <hr>
        <div class="form-group">
{{--                <a class="btn btn-default" href="{{ route('birthday.index') }}">Cancel</a>--}}
            <a class="btn btn-default" href="/birthday">Cancel</a>
            <button class="btn btn-primary">Add Birthday</button>
        </div>
    </div>
{{--</div>--}}
