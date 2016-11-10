<!DOCTYPE html>
<html lang="en">
   <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">

        <!-- Website CSS style -->
        <link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">

        <!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
         <script src="{{ url('js/jQuery-2.1.4.min.js') }}"></script>

        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="row main">
                <div class="panel-heading">
                <div class="panel-title text-center">
<!--                    <h1 class="title">Add Images</h1>-->
                    <hr />
                 </div>
                </div> 
                 
                <div class="main-login main-center">
                    <div class="flash-message">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <form method="post" name="image_form" action="{{ url('images123') }}" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label for="name" class="cols-sm-2 control-label">Select Images</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="file" class="form-control" name="upload_images" id="upload_images" />
                                </div>
                            </div>
                        <div class="form-group ">
                            <button type="submit"  class="btn btn-primary btn-lg login-button">Upload</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    <script type="text/javascript" > 
        
    </script>
    </body>
</html>
