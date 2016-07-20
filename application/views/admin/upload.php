<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="col-sm-12">
            	<?php
				 $attributes = array('name' => 'sheet','id'=>'sheet');
				 echo form_open_multipart('Admin/import_excel_file', $attributes);?>
                  <div class="col-sm-3">
                  	Date: <input type="date" name="date" class="form-control" required="required" placeholder="Date" />
                  </div>
                  <div class="col-sm-3">
                  	File : <input type="file" name="sheet" class="form-control" required="required" placeholder="Attendance File" />
                  </div>
                  <div class="col-sm-1">
                       &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Save" class="btn btn-green">
                  </div>
                <?php echo form_close();?>
            </div>
</body>
</html>