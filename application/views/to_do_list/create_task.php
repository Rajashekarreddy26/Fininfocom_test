<?php
$title_val = (isset($paramas['title']) and !empty($paramas['title'])) ? $paramas['title'] : "";
$details_val = (isset($paramas['details']) and !empty($paramas['details'])) ? $paramas['details'] : "";
$date_val = (isset($paramas['date']) and !empty($paramas['date'])) ? date('d-m-Y H:i:s',strtotime($paramas['date'])) : "";
?>
<div class="card mt-3 form-outline">
	<form name="to_do_list_add_form" id="to_do_list_add_form" method="post" onsubmit="return false;">
		<div class="card-body">
			<div class="text-center">
				<div class="mb-3">
					<label class="form-label">Title<span>*</span></label>
					<input class="form-control" type="text" name="title" id="title" value="<?php print $title_val; ?>">
					<span class="text-danger"><?php print form_error('title'); ?></span>
				</div>
				<div class="mb-3">
					<label class="form-label">Details<span>*</span></label>
					<textarea class="form-control form_text" name="details" id="details"><?php print $details_val; ?></textarea>
					<span class="text-danger"><?php print form_error('details'); ?></span>
				</div>
				<div class="mb-3">
					<label class="form-label">Date<span>*</span></label>
					<input class="form-control" type="text" name="date" id="date" value="<?php print $date_val; ?>" >
					<span class="text-danger"><?php print form_error('date'); ?></span>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="d-flex justify-content-center">
				<button class="btn btn-success btn-sm " onclick="taskSubmit()"><i class="fa fa-check">&nbsp;</i>Submit</button>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	$('#date').datetimepicker({format: 'd-m-Y H:i:s', autoclose:true});
</script>