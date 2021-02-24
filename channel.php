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

                <!--form for add channel-->    
                <div class="col-sm-4">
                    <form id="frmchannel" class="card">
                        <div align="left">
                            <h3>Channel</h3>
                        </div>
                        <div align="left">
                            <label for="" class="form-label">Channel No</label>
                            <input type="text" class="form-control" placeholder="Channel No" disabled id="cno" name="cno" size="30px" required>
                        </div>

                        <div align="left">
                            <label for="" class="form-label">Doctor Name</label>
                            <select name="dname" id="dname" class="form-control">
                                <option value="">Please Select</option>
                            </select>
                        </div>

                        <div align="left">
                            <label for="" class="form-label">Patient Name</label>
                            <select name="pname" id="pname" class="form-control">
                                <option value="">Please Select</option>
                            </select>
                        </div>

                        <div align="left">
                            <label for="" class="form-label">Room No</label>
                            <input type="text" class="form-control" placeholder="Room No" id="rno" name="rno" size="30px" required>
                        </div>

                        <div align="left">
                            <label for="" class="form-label">Channel Date</label>
                            <input type="date" class="form-control" placeholder="Channel Date" id="date" name="date" size="30px" required>
                        </div>

                        <br>
                        <div align="right" >
                            <button class="btn btn-info" id="save" type="button" onclick="addChannel()">Add</button>
                            <button class="btn btn-warning" id="clear" type="button" onclick="reset()">Reset</button>
                        </div>

                    </form>
                </div>

                <!--table-->
                <div class="col-sm-8">
                    <div class="panel-body">
                        <table id="tbl-channel" class="table table-responsive table bordered" cellpadding="0" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
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
            getDoctor();
            getPatient();

            var isNew = true;

            var patient_id = null;

            //for select doctor name and display in select
            function getDoctor(){
                $.ajax({
                    type : "GET",
                    url : "php/doctor/get_doctor.php",
                    dataType : 'JSON',
                    success: function(data){
                        for(var i = 0; i < data.length; i++){
                            $("#dname").append($("<option/>", 
                            {
                                value : data[i].doctorno,
                                text : data[i].dname
                            }));
                        }
                    }
                });
            }

            //for select patient name and display in select
            function getPatient(){
                $.ajax({
                    type : "GET",
                    url : "get_patient.php",
                    dataType : 'JSON',
                    success: function(data){
                        for(var i = 0; i < data.length; i++){
                            $("#pname").append($("<option/>", 
                            {
                                value : data[i].patientno,
                                text : data[i].name
                            }));
                        }
                    }
                });
            }

            //for add data in data base
            function addChannel(){
                if($("#frmchannel").valid()){
                    var url = '';
                    var data= '';
                    var method = '';
                    if(isNew == true){
                        url = 'php/channel/add_channel.php';
                        data = $('#frmchannel').serialize();
                        method = 'POST';
                    }else{
                        url = 'php/edit_channel.php';
                        data = $('#frmchannel').serialize() + "&patient_id = " + patient_id;
                        method = 'POST';
                    }
                    $.ajax({                        
                        type: method,
                        url : url,
                        dataType : 'JSON',
                        data: data,
                        success:function(data){                                
                            if(isNew == true){
                                alert("Channel Addedd");
                            }else{
                                alert("Channel Updatedd");
                            }
                            getall();
                            //getAutoid();
                            $('#frmchannel')[0].reset();
                            $('#cno').remouveAttr("disabled");
                        }
                    });
                }
            }

            //for select data from data base
            function getall(){
                $('#tbl-channel').dataTable().fnDestroy();
                $.ajax({
                    url : "php/channel/all_channel.php",
                    type : "GET",
                    dataType: "JSON",
                    success: function(data){
                        $('#tbl-channel').html(data);
                        $('#tbl-channel').dataTable({
                            "aaData" : data,
                            "scrollX" : true,
                            "aoColumns" : [
                                {"sTitle" : "Channel No", "mData" : "chno"},
                                {"sTitle" : "Doctor Name", "mData" : "dname"},
                                {"sTitle" : "Patient Name", "mData" : "pname"},
                                {"sTitle" : "Room", "mData" : "rno"},
                                {"sTitle" : "Date", "mData" : "date"},

                                //tow button Edit and Delete
                                {"sTitle" : "Edit", 
                                 "mData" : "chno",
                                 "render" : function(mData, type, row, meta){
                                     return '<button class="btn btn-success" onclick="getdetails('+ mData +')">Edit</button>';
                                    }                          
                                },
                                {"sTitle" : "Cancel", 
                                 "mData" : "chno",
                                 "render" : function(mData, type, row, meta){
                                     return '<button class="btn btn-danger" onclick="removedetails('+ mData +')">Cancel</button>';
                                    }                          
                                },
                            ]
                        });
                    }
                });
            }

            //function for Edit
            /*function getdetails(id){
                $.ajax({
                    type : 'POST',
                    url : 'php/patient_return.php',
                    dataType : 'JSON',
                    data : {patient_id : id},
                    success: function(data){
                        isNew = false                        
                        patient_id = data.patientno
                        $('#pno').val(data.patientno);
                        $('#pno').attr("disabled", "disabled");
                        $('#pname').val(data.name);
                        $('#phone').val(data.phone);
                        $('#address').val(data.address);
                    }
                });
            }*/

            //function for remouve items
            /*function removedetails(id){
                $.ajax({
                    type : 'POST',
                    url : 'php/patient_delete.php',
                    dataType : 'JSON',
                    data : {patient_id : id},
                    success: function(data){                        
                        getall();
                    }
                });
            }*/

        </script>        

    </body>
    
</html>