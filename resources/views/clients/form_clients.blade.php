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
         <link rel="stylesheet" href="{{ url('js/datepicker/datepicker3.css') }}">
         <script type="text/javascript" src="{{ url('js/datepicker/bootstrap-datepicker.js') }}"></script> 
        

        <title>Clients</title>
    </head>
    <body>
        <div class="container">
            <div class="row main">
                <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title">Add Clients</h1>
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
                     @if(isset($clients))
                     <form method="post" name="client_form" action="{{ url('clients/update') }}" >
                        <input type="hidden" id="{{$clients->id}}" name="id" value="{{$clients->id}}" />
                     @else
                     <form method="post" name="client_form" action="{{ url('clients') }}" >
                     @endif
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Name</label>
                            <?php $name= isset($clients->name) ? $clients->name : ''; ?>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" value="{{$name}}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="cols-sm-2 control-label">Gender</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-group fa" aria-hidden="true"></i></span>
                                    <select class="form-control" name="gender" id="gender" >
                                        <option value="" >Enter your Gender</option>
                                        <option value="male" <?php if(isset($clients->gender) && ($clients->gender == "male")) echo 'selected'; ?> >Male</option>
                                        <option value="female" <?php if(isset($clients->gender) && ($clients->gender == "female")) echo 'selected'; ?>>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="cols-sm-2 control-label">Phone</label>
                            <?php $phone= isset($clients->phone) ? $clients->phone : ''; ?>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="phone" id="phone"  placeholder="Enter your Phone" value="{{$phone}}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Email</label>
                            <?php $email= isset($clients->email) ? $clients->email : ''; ?>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" value="{{$email}}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="cols-sm-2 control-label">Address</label>
                            <?php $address= isset($clients->address) ? $clients->address : ''; ?>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-location-arrow fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="address" id="address"  placeholder="Enter your Address" value="{{$address}}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nationality" class="cols-sm-2 control-label">Nationality</label>
                            <?php $nationality= isset($clients->nationality) ? $clients->nationality : ''; ?>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-globe fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="nationality" id="nationality"  placeholder="Enter your Nationality" value="{{$nationality}}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dob" class="cols-sm-2 control-label">Date of Birth</label>
                            <?php $dob= isset($clients->dob) ? $clients->dob : ''; ?>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="dob" id="datepicker"  placeholder="Enter your Data of Birth" value="{{$dob}}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="education_background" class="cols-sm-2 control-label">Education Background</label>
                            <?php $edu= isset($clients->education_background) ? $clients->education_background : ''; ?>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="education_background" id="education_background"  placeholder="Enter your Education Background" value="{{$edu}}"/>
                                </div>
                            </div>
                        </div>
                     <div class="form-group">
                            <label for="contact_mode" class="cols-sm-2 control-label">Contact Mode</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-square-o fa" aria-hidden="true"c></i></span>
                                    <select class="form-control" name="contact_mode" id="contact_mode" >
                                        <option value="">Enter Contact Mode</option>
                                        <option value="email" <?php if(isset($clients->contact_mode) && ($clients->contact_mode == "email")) echo 'selected'; ?>>Email</option>
                                        <option value="phone" <?php if(isset($clients->contact_mode) && ($clients->contact_mode == "phone")) echo 'selected'; ?>>Phone</option>
                                        <option value="none" <?php if(isset($clients->contact_mode) && ($clients->contact_mode == "none")) echo 'selected'; ?>>None</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <button type="submit"  class="btn btn-primary btn-lg btn-block login-button">Save</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    <script type="text/javascript" > 
        $('#datepicker').datepicker({
             autoclose: true
        });
    </script>
    </body>
</html>
