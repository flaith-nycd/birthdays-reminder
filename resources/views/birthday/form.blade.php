<div class="col-md-6 col-md-offset-3">
    {{ csrf_field() }}

    <div class="form-group">
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}" autofocus>
    </div>

    <div class="form-group">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
    </div>

    <div class="row col-md-12">
        <div class="form-horizontal">
            <div class="form-group col-md-2">
                <input type="text" class="form-control" name="day" id="day" placeholder="DD" value="{{ old('day') }}">
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" name="month" id="month" placeholder="MM" value="{{ old('month') }}">
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="year" id="year" placeholder="YYYY" value="{{ old('year') }}">
            </div>

        </div>
    </div>
</div>

<div class="col-md-12">
    <hr>
</div>

<div class="col-md-6 col-md-offset-3 text-center">
    <div class="form-group">
        <a class="btn btn-default" href="/birthday">Cancel</a>
        <button class="btn btn-primary">Add</button>
    </div>
</div>
