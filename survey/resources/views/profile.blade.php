<!DOCTYPE html>
<html>
<head>

    <title>Survey Form</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-4-grid@3.4.0/css/grid.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style type="text/css">
        .date {
            text-align: right;
            padding-top: 25px;
            padding-right: 250px;
        }
        .box{
            margin-left: 180px;
            margin-right: 180px;
        }
        #h{
            font-family: red serif;
            background:  black ;
            height: 80px ;
            text-align: center;
            padding-top: 20px;
            color: white;"
        }
        .lsp{
            margin-left: 50px;
        }
        .center {
            text-align: center;
        }

        .leftsp{
            padding-left: 15px;
            padding-bottom: 5px;
        }

    </style>
</head>
<body onload=display_ct(); style="background-image: url('https://wallpapercave.com/wp/wp4088654.jpg'); ">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form action="user" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <p id="ct" class="date"></p>
        <div class="container">
            <div class="box" style="background-color: white; height: 550px">
                <h1 class="jumbotron "  id="h">Event Registration Form</h1>
                <div class="row">
                    <label  class="col-2 lsp" ><strong>Firstname:</strong></label>
                    <input type="text" class="form-control col-5" placeholder="Firstname" name="first_name" required>
                    <input type="text" class="form-control col-3" placeholder="Lastname"  id="name" required>
                </div><br>
                <div class="row">
                    <label  class="col-2 lsp"><strong>Company:</strong></label>
                    <input type="text" class="form-control col-8"  name="cmp" >
                </div><br>
                <div class="row">
                    <label  class="col-2 lsp"><strong>Age:</strong></label>
                    <input type="number" class="form-control form-number col-4" maxlength="3" name="age" ><wbr>
                </div><br>
                <div class="row"><label  class="col-2 lsp" ><strong>Email:</strong></label>
                    <input type="email" class="form-control col-5" name="email"  >
                </div><br>
                <div class="row"><label  class="col-2 lsp" ><strong>Role:</strong></label>
                    <input type="text" class="form-control col-5" name="role"  required></div>
                <br>
                <div class="row">
                    <label  class="col-2 lsp"><strong>Gender:</strong></label>
                    <div class="col-2"><input type="radio" class="btn-check" name="gender"><label class="leftsp">Male</label></div>
                    <div class="col-2"><input type="radio" class="btn-check" name="gender"><label class="leftsp">Female</label></div>
                    <div class="col-2"><input type="radio" class="btn-check" name="gender"><label class="leftsp">Other</label></div>
                </div><br>
                <div class="row">
                    <label class="col-2 lsp"><strong>Date of birth:</strong></label>
                    <input type="date" class="form-control col-3" name="dob">
                </div><br>
                <div class="center">
                    <input type="submit" class="btn btn-success" value="submit">
                </div>
            </div><br>
        </div>
    </div>

</form>
<script type="text/javascript">
    function disp(){
        var refresh=1000; // Refresh rate in milli seconds
        mytime=setTimeout('display_ct()',refresh)
    }
    function display_ct() {
        var x = new Date();
        document.getElementById('ct').innerHTML = x;
        disp();
    }
</script>
</body>
</html>
