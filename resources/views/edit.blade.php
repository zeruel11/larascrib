<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel CRUD - Update Passport</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/app.css')}}" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<body>
    <div class="container">
        <h2>Edit Form</h2><br>
        <form action="{{action('PassportController@update', $id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{$passport->name}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" value="{{$passport->email}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 form-group">
                    <label for="number">Phone Number:</label>
                    <input type="text" name="number" class="form-control" value="{{$passport->number}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <strong>Date :</strong>
                    <input type="text" name="date" id="datepicker" class="date form-control" value="{{gmdate('d-m-Y', $passport->date)}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <input type="file" name="filename" value="{{$passport->filename}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 form-group" style="margin-left:38px">
                    <label>Passport Office</label>
                    <select name="office">
                        <option value="Mumbai" @if($passport->office=="Mumbai") selected @endif>Mumbai</option>
                        <option value="Chennai" @if($passport->office=="Chennai") selected @endif>Chennai</option>
                        <option value="Delhi" @if($passport->office=="Delhi") selected @endif>Delhi</option>
                        <option value="Bangalore" @if($passport->office=="Bangalore") selected @endif>Bangalore</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 form-group" style="margin-top:60px">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        });
    </script>
</body>
</html>