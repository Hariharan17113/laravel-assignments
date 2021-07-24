<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
    <style>
        td{
            text-align: center;
        }
    </style>
</head>
<body>
Hi Admin,
<p>Previous Day Post Lists Mail</p>
@if($yesterday->count()!=0)
    <table class="table table-dark table-striped  table-hover" >
        <tr>
            <th width="10%">Id</th>
            <th width="10%">Title</th>
            <th width="20%">Description</th>
        </tr>
        <?php $i=0; ?>
        @foreach ($yesterday as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->description }}</td>
            </tr>
        @endforeach
    </table>
@else
    <p>No one created post yesterday!!</p>
@endif
<p>Thank you</p>
<p>Regards,</p>
<p>Hariharan D</p>
<p>Intern - PHP team</p>
</body>
</html>
