<div class="row">
    <div class="col-lg-12">
        <h2>Send Email using CodeIgniter Email Library</h2>                 
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-12">
       <a href="<?php echo base_url();?>export/sendEmail" class="pull-right btn btn-primary btn-xs" style="margin: 2px;"><i class="fa fa-plus"></i> Send Email</a>
    </div>
</div>
<hr>
<?php foreach($result as $detail){ ?>
		<table border="0" width="80%" align="center">
			<tr>
				<td width="5%"><?php echo $detail['id']; ?></td>
				<td width="12%"><img src="<?php echo base_url(); ?>assets/images/Penguins.jpg" height="85" width="75"></td>
				<td width="10%"><b>Price:</b> <?php echo number_format($detail['price'], 2, '.', ''); ?></td>
				<td width="30%"><b>Name:</b> <?php echo $detail['name']; ?></td>
				<td width="43%"><b>Descriptipn:</b> <?php echo $detail['description']; ?></td>
			</tr>
		</table>
		<hr>
<?php } ?>