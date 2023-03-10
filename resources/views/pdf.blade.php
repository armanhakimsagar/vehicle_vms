<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gomx Tracker</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{asset('assets/css/optional/pdf.css')}}" rel="stylesheet" />

</head>

<body>
    <script type="text/php">
        if (isset($pdf)) {
        $x = 500;
        $y = 810;
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
        $font = null;
        $size = 10;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
    </script>
    <div class="header_bg">
        <div class="container">
            <div class="row headerSection">
                <div class="col-xs-6">
                    <h6>Date: {{$time}}</h6>
                </div>
                <div class="col-xs-6">
                    <div class="headerLogo">
                        <img src="{{asset('assets/media/logos/crm-logo-black-2.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">



        <div class="row page-break">
            <div class="col-xs-12">
                <table class=" table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($thanas as $thana)
                        <tr>
                            <td>{{$thana->id}}</td>
                            <td>{{$thana->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <div class="row custom_footer">
            <div class="col-xs-4 mb-4">
                From
                <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-xs-4 mb-4">
                To
                <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-xs-4 mb-4">
                <div>Report: 007612</div>
                <div>Order ID: 4F3S8J</div>
                <div>Payment Due: 2/22/2014</div>
                <div>Account: 968-34567</div>
            </div>
            <!-- /.col -->
        </div>
    </div>
</body>

</html>