<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

<body>
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <!-- tombol kalo mau wkwkwk -->
        </div>

        <div class="input-group date">
            <input type="text" class="form-control" id="datepicker" placeholder="MM/DD/YYYY">
        </div>
    </div>
</body>
<script>
    var currentDate = new Date();
    $('#datepicker').datepicker("setDate", currentDate);
</script>