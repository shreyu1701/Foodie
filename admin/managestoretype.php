<?php
require_once 'connection.php';

require_once 'adminsecure.php';

$er = 0;
if (isset($_REQUEST[send])) {
    $get = mysql_query("select * from storetype where typename like '$_REQUEST[storetype]'");
    $g = mysql_fetch_array($get);

    if ($g[0] == "") {
        $ins = mysql_query("insert into storetype values(0,'$_REQUEST[storetype]',0)");
    } else {
        $er = 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'head.php';
?>

    <body class="sticky-header" onload="display('storetype','display','1','10');recycle('storetype','display','1','10');">

        <section>

<?php
require_once 'menu.php';
?>

            <div class="main-content" >


<?php
require_once 'toppati.php';

require_once 'adminpati.php';
?>


                <div class="row" style="margin: 0;">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                                ADD STORE TYPE
                            </header>
                            <div class="panel-body">
                                <form action="" method="post" name="storetypeform" class="form-group">
                                    <div class="form-group">
                                        <div class="input-group">
                                            
                                            <input type="text" class="form-control" name="storetype" required="" pattern="^[a-z ]+$" placeholder="Enter storetype"/>                                            <div class="input-group-addon">
                                                <i  class="fa fa-globe"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="send" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>
<?php
if ($er == 1) 
{
    
    echo "<font color=red size=2> <i class='fa fa-times-circle'></i>  Already exist..!</font>";
}
?>
                                </form>

                            </div>
                        </section>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading custom-tab tab-right ">
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active">
                                        <a href="#home-3" data-toggle="tab">
                                            <i class="fa fa-laptop" ondblclick="del('storetype','delete','<?php echo $p; ?>','<?php echo $pp; ?>','all');recycle('storetype','display','1','10');"></i>
                                            DISPLAY
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#about-3" data-toggle="tab">
                                            <i class="fa fa-bitbucket" ondblclick="fdel('storetype','delete','<?php echo $p; ?>','<?php echo $pp; ?>','all');"></i>
                                            RECYCLE
                                        </a>
                                    </li>

                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-3">
                                        <form action="" method="post" name="searchstoretype">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <select style="border: none; background: none; outline: none;" onchange="display('storetype','display','1',this.value);">
                                                            
                                                            <option>10</option>
                                                            <option>15</option>
                                                            <option>20</option>
                                                        </select>
                                                    </div>
                                                    <input type="text" name="search" placeholder="Search here.." id="find" class="form-control" onkeyup="display('storetype','display','1','10');"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="storetype">

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="about-3">
                                        <div id="rstoretype">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                    </div>
                </div>

<?php
require_once 'footer.php';
?>

            </div>

        </section>

<?php
require_once 'javascript.php';
?>

    </body>


</html>
