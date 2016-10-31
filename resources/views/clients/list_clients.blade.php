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

        <title>Clients</title>
    </head>
    <body>
@if(isset($SERVER_MESSAGE))
<br/>
{!! $SERVER_MESSAGE !!}
@endif
<!-- Main content -->
        <div class="container">
            <div class="row main">
                <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title">List of Clients</h1>
                    <hr />
                 </div>
                </div>
                <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
                
                <!-- /.box-header -->
                <div class="main-login main-center" style="max-width: 100%;">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover documentGroup">
                        <thead>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Nationality</th>
                        <th>DOB</th>
                        <th>Education</th>
                        <th>Contact Mode</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{$client->name}}</td>
                                <td>{{$client->gender}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->address}}</td>
                                <td>{{$client->nationality}}</td>
                                <td>{{$client->dob}}</td>
                                <td>{{$client->education_background}}</td>
                                <td>{{$client->contact_mode}}</td>
                                <td>
                                    <a href="{{url('clients/'.$client->id.'/edit')}}" class="text-info"><i class="fa fa-pencil"></i> Edit</a> |
                                    <a href="{{url('clients/'.$client->id.'/delete')}}" class="text-danger" onclick="return confirm('Do you really want to delete the Client?')"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                
                <a href="{{url('clients/create')}}" style="color: #fff;"><button class="btn btn-primary">Add New</button></a>
                @if(count($clients)>0)
                <a href="{{url('all_clients/export')}}"><button type="button"  class="btn btn-primary" style="color: #fff;">Export</button></a>
                @endif
                </div>
                <!-- /.box-body --> 
            </div>
        </div>
    </body>
</html>
