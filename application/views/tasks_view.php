<div class="container">
    <div class="row">
        <div class="col-xs-12 .col-md-8-centered well">
            <?php echo $this->session->flashdata('login_msg'); ?>
            <table class="table">
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <?php echo form_open('Task_Controller/logout'); ?>
                        <input type="submit" class="btn btn-primary pull-right" id="btn_logout" name="btn_logout" value="LOGOUT"/>
                        <?php echo form_close(); ?>
                    </td>
                </tr>
            </table>
            
            <legend class="text-center">List All Users</legend>
            <table class="table table-striped">
                <thead class="thead">
                    <th style="text-align: left">#No</th>
                    <th style="text-align: left">User Name</th>
                    <th style="text-align: center">Email</th>
                    <th style="text-align: center">Address</th>
                </thead>
                <tbody class="tbody">
                    <?php 
                    if (empty($data)) {
                        echo "<tr><td colspan='7' style='text-align: center'> - Tidak ada data - </td></tr>";
                    } else {
                        $no = 1;
                        foreach($data as $d) {
                    ?>
                    <tr>
                        <td style="text-align: left"><?=$no?></td>
                        <td style="text-align: left"><?=$d->emp_name?></td>
                        <td style="text-align: center"><?=$d->email?></td>
                        <td style="text-align: center"><?=$d->address?></td>
                    </tr>   
                    <?php
                        $no++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>