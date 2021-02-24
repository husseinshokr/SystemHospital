<?php
    session_start();

?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
        <!--link rel="stylesheet" href="compn/bootstrap.min.css">
        <link rel="stylesheet" href="compn/jquery.dataTables.min.css"-->
    </head>
    <body>
        <?php
            if($_SESSION["utype"] == 1){
                include("header.php");
            }else if($_SESSION["utype"] == 2){
                include("header1.php");
            }else if($_SESSION["utype"] == 3){
                include("header2.php");
            }
        ?>
        <br>
        <div class="container-fluid">            
            <div class="row">

                <div align="left">
                    <input type="hidden" class="form-control" value="<?php echo $_SESSION['id']; ?>" id="logid" name="logid" size="30px" required >
                </div>

                <!--table-->
                <div class="col-sm-12">
                    <div class="panel-body">
                        <table id="tbl-pres" class="table table-responsive table bordered" cellpadding="0" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                        
                        </table>
                    </div>
                </div>
  
            </div>
        </div>  

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="compn/jquery.validate.min.js"></script>
        <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <!--script src="compn/jquery.min.js"></script>
        <script src="compn/bootstrap.min.js"></script>
        <script src="compn/jquery.dataTables.min.js"></script-->

        <script>
            getall();

            //for select data from data base
            function getall(){
                $('#tbl-pres').dataTable().fnDestroy();
                
                $.ajax({
                    url : "php/Pres/all_pres.php",
                    type : "GET",
                    dataType: "JSON",
                    success: function(data){
                        $('#tbl-pres').html(data);
                        $('#tbl-pres').dataTable({
                            "aaData" : data,
                            "scrollX" : true,
                            "aoColumns" : [
                                {"sTitle" : "Prescription No", "mData" : "pid"},
                                {"sTitle" : "Channel No", "mData" : "cno"},
                                {"sTitle" : "Desease Type", "mData" : "dtype"},
                                {"sTitle" : "Description", "mData" : "des"},
                                {"sTitle" : "Invoice", 
                                 "mData" : "pid",
                                 "render" : function(mData, type, row, meta){
                                    return '<button class="btn btn-success" onclick="getInvoice('+ mData +')">Invoice</button>';
                                    }                          
                               },
                            ]
                        });
                    }
                });
            }

            function getInvoice(id){
                window.location.href = "invoice.php?id=" +id ;
            }

        </script>

    </body>
    
</html>