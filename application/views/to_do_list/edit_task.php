<?php
// print "<pre>"; print_r($to_do_list); print "</pre>";
$title_val = (isset($to_do_list['title']) and !empty($to_do_list['title'])) ?  $to_do_list['title'] : $params['title'];
$details_val = (isset($to_do_list['details']) and !empty($to_do_list['details'])) ?  $to_do_list['details'] : $params['details'];
$date_val = (isset($to_do_list['date']) and !empty($to_do_list['date'])) ?  $to_do_list['date'] : $params['date'];
$id_val = (isset($to_do_list['id']) and !empty($to_do_list['id'])) ?  $to_do_list['id'] : $params['id'];
?>
<div class="card mt-3 form-outline">
	<form name="to_do_list_edit_form" id="to_do_list_edit_form" method="post" onsubmit="return false;">
		<div class="card-body">
			<div class="text-center">
				<input type="hidden" name="id" id="id" value="<?php print $id_val; ?>">
				<div class="mb-3">
					<label class="form-label">Title<span>*</span></label>
					<input class="form-control" type="text" name="title" id="title" value="<?php print $title_val; ?>">
					<span class="text-danger"><?php print form_error('title'); ?></span>
				</div>
				<div class="mb-3">
					<label class="form-label">Details<span>*</span></label>
					<textarea class="form-control form_text" name="details" id="details"><?php print $details_val ?></textarea>
					<span class="text-danger"><?php print form_error('details'); ?></span>
				</div>
				<div class="mb-3">
					<label class="form-label">Date<span>*</span></label>
					<input class="form-control" type="text" name="date" id="date" value="<?php print date('d-m-Y H:i:s',strtotime($date_val)); ?>" >
					<span class="text-danger"><?php print form_error('date'); ?></span>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="d-flex justify-content-center">
				<button class="btn btn-success btn-sm" onclick="taskUpdate()"><i class="fa fa-check">&nbsp;</i>Update</button>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	$('#date').datetimepicker({format: 'd-m-Y H:i:s', autoclose:true});
</script>